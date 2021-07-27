<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Car;
use App\Models\Carfile;
use App\Models\Carmodel;
use App\Models\Carstate;
use App\Models\Cartype;
use App\Models\Category;
use App\Models\Mark;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class CarController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $cars = Car::orderBy('name', 'asc')
            ->where('available','=',1)
            ->where('active','=',1)
            ->get();
        return view('intranet.car.list', compact('cars'));

    }

    public function index2(){
        $cars = Car::orderBy('name', 'asc')
            ->where('available','=',0)
            ->where('active','=',0)
            ->get();
        //$cars = Car::all();
        /* $cars=DB::table('cars')
             ->join('carfiles','cars.id','=','carfiles.car_id')
             ->join('carstates','cars.carstate_id','=','carstates.id')
             ->join('categorys','cars.category_id','=','categorys.id')
             ->OrderBy('created_at','desc')
             ->select('cars.id as id','cars.color as color','cars.name as name','cars.available as available','cars.active as active','cars.amount as amount','cars.description as description','cars.quantity as quantity','carfiles.name as photo','cars.created_at as created_at','carstates.name as etat','categorys.name as categorie')
             ->get();
         //dd($cars);*/
        return view('intranet.car.nonListe', compact('cars'));
    }

    public function show($id){
        $car = Car::find($id);
        $photo=DB::table('photos')->where('card_id','=',$id)->get();
       // dd($photo);
       return view('intranet.car.show', compact('car','photo'));
    }

    public function create(){
        $cartypes = Cartype::all();
        $carmodels = Carmodel::all();
        $carstates = Carstate::all();
        $categories = Category::all();
        $marks = Mark::all();
        return view('intranet.car.create', compact('cartypes', 'carmodels', 'carstates', 'categories', 'marks'));
    }

    public function store(Request $request){
     /*  $data = $request->all();
        $last = Car::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;
        $insert = Car::create($data);
        $this->storeImages($request->file('images'), $insert->id);
        if($insert) return Redirect::route('intranet.indexCar')->with('success', 'Création effectuée avec succès.');
        return;*/

        //enregistrement dans la table cars
          $add= new Car();
          $add->name=$request->input('name');
          $add->category_id=$request->input('category_id');
          $add->carstate_id=$request->input('carstate_id');
          $add->color=$request->input('color');
          $add->amount=$request->input('amount');
          $add->description=$request->input('description');
          $add->quantity=$request->input('quantity');
          $add->available=$request->input('available');
          $add->active=$request->input('active');

        //enregistrement dans la table carfiles pour les photos
          $addd=new Photo();
          $path="storage/uploads/cars";
          $file=$request->file('images');
          $extension=$request->file('images')->getClientOriginalExtension();
          $nomFichier=rand(1111,9999).'.'.$extension;
          $file->move($path,$nomFichier);
          $addd->image="$path/$nomFichier";
          //enregistrement dans card
            $add->images="$path/$nomFichier";
            $add->save();
          //
          //recupération du id du dernier produit
          $Id_Dernier = Car::orderBy('id', 'desc')->first();
          $addd->card_id=$Id_Dernier->id;
         //echo ("$addd->car_id");
          $addd->save();

          return Redirect::route('intranet.indexCar')->with('success', 'Création effectuée avec succès.');
    }

    public function edit($id){
        $car = Car::find($id);
        $cartypes = Cartype::all();
        $carmodels = Carmodel::all();
        $carstates = Carstate::all();
        $categories = Category::all();
        $marks = Mark::all();
        return view('intranet.car.edit', compact('car', 'cartypes', 'carmodels', 'carstates', 'categories', 'marks'));
    }

    public function update($id, Request $request){
      /* $data = $request->all();
        Car::find($id)->update($data);
        $this->updateImages($request->file('images'), $id);
        return Redirect::route('intranet.indexCar')->with('success', 'Modification effectuée avec succès');*/
         $id=$id;
         $article=Car::find($id);
        $oldfile=$article->images;
        $add= Car::find($id);
        $add->name=$request->input('name');
        $add->category_id=$request->input('category_id');
        $add->carstate_id=$request->input('carstate_id');
        $add->color=$request->input('color');
        $add->amount=$request->input('amount');
        $add->description=$request->input('description');
        $add->quantity=$request->input('quantity');
        $add->available=$request->input('available');
        $add->active=$request->input('active');
        $file=$request->file('images');
        if($file){
            //enregistrement dans la table carfiles pour les photos
            $path="storage/uploads/cars";
            $file=$request->file('images');
            $extension=$request->file('images')->getClientOriginalExtension();
            $nomFichier=rand(1111,9999).'.'.$extension;
            $file->move($path,$nomFichier);
            $add->images="$path/$nomFichier";
            //modification dans carfiles
            $id=$id;
            $cardfiles=Photo::all();
            foreach ($cardfiles as $c){
                if($c->image==$oldfile){
                    $modifier=Photo::find($c->id);
                    $modifier->image="$path/$nomFichier";
                    $modifier->save();
                }
            }

            $add->save();
        }else{
            //enregistrement dans la table carfiles pour les photos
            $add->images=$request->input('image');
            $add->save();
        }

        return Redirect::route('intranet.indexCar')->with('success', 'Modification effectuée avec succès');

        //modification dans carfiles
    }

    public function delete($id){
       // Car::find($id)->delete();
        $modifier=Car::find($id);
        if($modifier->active==0 || $modifier->available==0){
            $modifier->active=1;
            $modifier->available=1;
            $modifier->save();
            return Redirect::route('intranet.indexCar')->with('success', 'Suppression effectuée avec succès');
        }else{
            $modifier->active=0;
            $modifier->available=0;
            $modifier->save();
            return Redirect::route('intranet.indexCar')->with('success', 'Suppression effectuée avec succès');
        }

    }

    public function storeImages($images, $car_id){
        foreach ($images as $image){
            $name = $image->hashName();
            $image->move(public_path('storage/uploads/cars'), $name);
            $last = Carfile::whereRaw('id = (select max(`id`) from carfiles)')->first();
            if($last) $id = $last->id + 1;
            else $id = 1;
            Carfile::create([
                'id' => $id,
                'name' => $name,
                'car_id' => $car_id,
                'path' => $image->path()
            ]);
        }
    }

    public function updateImages($images, $id){
        if(!is_null($images)){
            Carfile::where('car_id', $id)->delete();
            $this->storeImages($images, $id);
        }
    }

    public function toggleActive(Request $request){
        $car = Car::find($request->get('id'));
        $data['active'] = !$car['active'];
        $car->update($data);
        return $car;
    }

    public function toggleAvailable(Request $request){
        $car = Car::find($request->get('id'));
        $data['available'] = !$car['available'];
        $car->update($data);
        return $car;
    }

    public function AjouterImage(Request $request,$id){
        $add=new Photo();
        $path="storage/uploads/cars";
        $file=$request->file('image');
        $extension=$request->file('image')->getClientOriginalExtension();
        $nomFichier=rand(1111,9999).'.'.$extension;
        $file->move($path,$nomFichier);
        $add->image="$path/$nomFichier";
        $add->card_id=$id;
        $add->save();
       // dd($add);
        return back();
    }

    public function EnleverImage($id){
        Photo::destroy($id);
        return back();
    }
}