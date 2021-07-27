<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class RateController extends Controller
{
    public function __construct(){

    }

    public function edit(){
        $rate = Rate::find(1);
        return view('intranet.rate.edit', compact('rate'));
    }

    public function update(Request $request){
            $modifier=Rate::find(1);
            $modifier->tva=$request->input('tva');
           // $modifier->reduction_rate=$request->input('reduction_rate');
            $modifier->bail_rate=$request->input('bail_rate');
            $modifier->save();
        return Redirect::route('intranet.editRate')->with('success', 'Modification effectuée avec succès');
    }

}