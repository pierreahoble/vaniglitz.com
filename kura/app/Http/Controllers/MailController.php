<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactMail(Request $request){
        $data = $request->all();
        Mail::to('easycarrentalafrique@gmail.com')->send(new Contact($data));
        return 'true';
    }

    public function send(Request $request){

          $add=new Message();
          $add->message=$request->input('message');
          $add->idUser=Auth::user()->getAuthIdentifier();
          $add->etat=0;
          $add->save();
          return redirect('/')->with("info","Votre Message a été avec succès");
    }

}
