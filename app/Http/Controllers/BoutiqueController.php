<?php

namespace App\Http\Controllers;

use App\Boutique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BoutiqueController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        $boutique=Boutique::find(1);
         return view('intranet.shop.edit',compact('boutique'));
    }

    public function updateBoutique(Request $request){
        $add=Boutique::find(1);
        $add->nom=$request->input('nom');
        if( $file=$request->file('logo2')=="")
        {
            $add->logo=$request->input('logo1');
        }else{
            $path="public/storage/";
            $file=$request->file('logo2');
            $extension=$request->file('logo2')->getClientOriginalExtension();
            $nomFichier=rand(1111,9999).'.'.$extension;
            $file->move($path,$nomFichier);
            $add->logo="$path/$nomFichier";
        }
        $add->heure=$request->input('heure');
        $add->adresse=$request->input('adresse');
        $add->numero=$request->input('numero');
        $add->email=$request->input('email');
        $add->save();
        //dd($add);
        return back();
    }

    public function PanierPaiement(Request $request){
        $montant=$request->input('Total');
        $token = "293946db-c4e4-44ed-a032-d5f4227dd28c";
        $identifier = Date('d-m-Y H:m');
        $urlString="https://paygateglobal.com/v1/page?token=$token&amount=$montant&description=Paiement&identifier=$identifier";
        return Redirect::to($urlString);
    }


}
