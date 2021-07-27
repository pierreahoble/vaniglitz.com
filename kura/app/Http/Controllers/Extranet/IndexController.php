<?php


namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Invoice;
use App\Models\Leasing;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use App\Panier;
use foo\bar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function __construct()
    {

    }

    public function RechercheParCateggorie(Request $request){
             $id=$request->input('name');
              /*  $cars =DB::table('cars')
                ->where('category_id','=',$id)
                 ->get();*/

        $user = Auth::user();
        $cars = Car::where('category_id','=',$id)
            ->where('active','=',1)
            ->where('available','=',1)
            ->orderBy('amount')
            ->paginate(8);
        $leasings = null;
        $reservations = null;
        $minAmount = $this->minAmount();
        $invoices = [];

        if($user){
            $invoices = Invoice::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            foreach($invoices as $invoice){
                $itemsObj = [];
                $invoice->items = explode(',', $invoice->items);
                foreach ($invoice->items as $item){
                    $itemsObj[] = Car::find($item);
                }
                $invoice->itemsObj = (object) $itemsObj;
            }
        }

        foreach($cars as $car){
            $car->setAvailable();
        }
        $MontantMin=Car::MontantMin();
        $MontantMax=Car::MontantMax();
        return view('extranet.index', compact('cars', 'reservations', 'user', 'invoices', 'minAmount','MontantMin','MontantMax'));

    }


    public function searchProduit(Request $request){
        //récupération des variables
        $article=$request->input('name');
        $category_id=$request->input('category_id');
        $amount_min=$request->input('amount_min');
        $amount_max=$request->input('amount_max');
        if($request->input('category_id')==0){
            $cars=Car::orderBy('amount')
                ->where('active','=',1)
                ->where('available','=',1)
                ->paginate(8);
        }else{
            $cars=Car::orWhere('name','like','%'.$article.'%')
                ->Where('amount','>=',$amount_min)
                ->Where('amount','<=',$amount_max)
                ->Where('category_id','=',$category_id)
                ->where('active','=',1)
                ->where('available','=',1)
                ->orderBy('amount')->paginate(8);
        }
        //préparation de la requete

      // dd($car);

        $user = Auth::user();
       // $cars = Car::whereActive(1)->orderBy('amount')->paginate(8);
        $leasings = null;
        $reservations = null;
        $minAmount = $this->minAmount();
        $invoices = [];

        if($user){
            $invoices = Invoice::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            foreach($invoices as $invoice){
                $itemsObj = [];
                $invoice->items = explode(',', $invoice->items);
                foreach ($invoice->items as $item){
                    $itemsObj[] = Car::find($item);
                }
                $invoice->itemsObj = (object) $itemsObj;
            }
        }

        foreach($cars as $car){
            $car->setAvailable();
        }
        $MontantMin=Car::MontantMin();
        $MontantMax=Car::MontantMax();
       return view('extranet.index', compact('cars', 'reservations', 'user', 'invoices', 'minAmount','MontantMax','MontantMin'));
    }


    public function index(){
        $user = Auth::user();
        $cars =Car::dispo();
        $leasings = null;
        $reservations = null;
        $minAmount = $this->minAmount();
        $invoices = [];

        if($user){
            $invoices = Invoice::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            foreach($invoices as $invoice){
                $itemsObj = [];
                $invoice->items = explode(',', $invoice->items);
                foreach ($invoice->items as $item){
                    $itemsObj[] = Car::find($item);
                }
                $invoice->itemsObj = (object) $itemsObj;
            }
        }

        foreach($cars as $car){
            $car->setAvailable();
        }

        $MontantMin=Car::MontantMin();
        $MontantMax=Car::MontantMax();
      return view('extranet.index', compact('cars', 'reservations', 'user', 'invoices', 'minAmount','MontantMin','MontantMax'));
    }

    public function searchCar(Request $request){

    }

    public function createSubscription(){
        return view('extranet.subscription.create');
    }

    public function achatimmediat(Request $request,$id){
       $id=decrypt($id);
       $qte=$request->input('quantite');
        $produit=\App\Models\Car::find($id);
        $user = Auth::user();
        $cars =Car::dispo();
        $leasings = null;
        $reservations = null;
        $minAmount = $this->minAmount();
        $invoices = [];

        if($user){
            $invoices = Invoice::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            foreach($invoices as $invoice){
                $itemsObj = [];
                $invoice->items = explode(',', $invoice->items);
                foreach ($invoice->items as $item){
                    $itemsObj[] = Car::find($item);
                }
                $invoice->itemsObj = (object) $itemsObj;
            }
        }

        foreach($cars as $car){
            $car->setAvailable();
        }

        $MontantMin=Car::MontantMin();
        $MontantMax=Car::MontantMax();
        $taux=Rate::find(1);
        return view('extranet.achat', compact('taux','produit','qte','id','cars', 'reservations', 'user', 'invoices', 'minAmount','MontantMin','MontantMax'));

    }

    public function AjoutPanier(Request $request,$id){
        $id=decrypt($id);
        $produit=Car::find($id);
        $add=new Panier();
        $add->nom=$produit->name;
        $add->quantite=$request->input('quantite');
        $add->idProduit=$id;
        $add->etat=0;
        $add->idClient=Auth::user()->getAuthIdentifier();
        $add->matricule=0;
        $add->prix=$produit->amount;
        $add->total=$produit->amount*$add->quantite;
        //dd($add);
        if($add->save()){
            return redirect('/')->with("cool","Produit $add->nom ajouté au Panier avec Succès...");
        }
        else{
            return redirect('/')->with("cool","Produit $add->nom n'a pas été ajouté au Panier...");
        }
    }

    public function recapPanier(){
        if(Auth::user()){
            $Panier=Panier::where('idClient','=',Auth::user()->getAuthIdentifier())
                ->where('etat','=',0)
                ->get();
            $taux=Rate::find(1);
            $produit=0;
            foreach ($Panier as $p){
                $produit+=$p->total;
            }
            // dd($produit);
            return view('extranet.recap',compact('Panier','taux','produit'));
        }else{
            return redirect('/');
        }

    }

    public function SupprimerPanier($id){
        if(Auth::user()){
            $id=decrypt($id);
            Panier::destroy($id);
            return back()->with("cool","L'article a été supprimé avec succès dans le panier");
        }else{
            return redirect('/');
        }
    }

    public function modifierPanier(Request $request,$id){
        if(Auth::user()){
            $id=decrypt($id);
            $add=Panier::find($id);
            $produit=Car::where('id','=',$add->idProduit)->first();
            $add->quantite=$request->input('quantite');
            $qte=$add->quantite;
            $add->total=$qte*$produit->amount;
            $add->save();
            return back()->with("cool","L'article a été modifié avec succès dans le panier");
        }else{
            return redirect('/');
        }

    }

    public function achatimmediatConnexion(Request $request,$id){
         $qte=$request->input('quantite');
         $id=decrypt($id);
        $produit=Car::find($id);
        $taux=Rate::find(1);

       // $mac=substr(shell_exec('getmac'), 159,20);
        return view('extranet.achat2', compact('taux','produit','qte'));
    }

    public function Admin(){
        $admin=User::where('role','=','admin')->OrderBy('id','desc')->get();
        return view('intranet.Admin.list',compact('admin'));
    }

    public function AjouterAdmin(){
        return view('intranet.Admin.add');
    }

    public function EnregistrementAdmin(Request $request){
        $pass1=$request->input('password');
        $pass2=$request->input('password2');
        if($pass1==$pass2){
            $add=new User();
            $add->email=$request->input('email');
            $add->name=$request->input('name');
            $doublon=User::where('email','=',$add->email)->get();
            if(count($doublon)){
                return redirect('Admin')->with("info","L'Admin $add->name existe déjà dans la base...");
            }else{
                $path="public/storage/uploads/avatars/";
                $file=$request->file('photo');
                $extension=$request->file('photo')->getClientOriginalExtension();
                $nomFichier=rand(1111,9999).'.'.$extension;
                $file->move($path,$nomFichier);
                $add->photo="$path/$nomFichier";
                $add->telephone=$request->input('telephone');
                $add->cni=$request->input('cni');
                $add->password=Hash::make($request->input('password'));
                $add->address=$request->input('address');
                $add->active=$request->input('active');
                $add->role="admin";
                $add->save();
                return redirect('Admin')->with("info","L'Admin $add->name a été créer avec succès...");
            }

        }else{
            return back()->with("info","Les deux mots de passe ne sont pas conforment...");
        }

    }

    public function SupprimerAdmin($id){
        User::destroy(decrypt($id));
        return redirect('Admin')->with("info","L'Admin a été supprimé avec succès...");
    }

    public function ModifAdmin($id,Request $request){
        $ph=$request->input('photo0');
        $add=User::find(decrypt($id));
        $add->email=$request->input('email');
        $add->name=$request->input('name');
        $path="public/storage/uploads/avatars/";
        $file=$request->file('photo');
        if($file==""){
            $add->photo=$ph;
        }else{
            $extension=$request->file('photo')->getClientOriginalExtension();
            $nomFichier=rand(1111,9999).'.'.$extension;
            $file->move($path,$nomFichier);
            $add->photo="$path/$nomFichier";
        }

        $add->telephone=$request->input('telephone');
        $add->cni=$request->input('cni');
        $add->address=$request->input('address');
        $add->active=$request->input('active');
        $add->save();
        return redirect('Admin')->with("info","L'Admin a été modifié avec succès...");
    }
}