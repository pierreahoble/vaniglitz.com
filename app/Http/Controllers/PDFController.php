<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Carback;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Leasing;
use App\Models\Reservation;
use App\Models\Rate;
use PDF;

class PDFController extends Controller
{
    public function invoice($id){
        $data = Invoice::find($id);
        $items = [];

        $data['items'] = explode(',', $data['items']);
        foreach ($data['items'] as $id){
            $items[] = Car::find($id);
        }

        $data->items = $items;

        return PDF::loadView('download-invoice', array('data' => $data));
    }

    public function supInvoice($id, $type){
        $invoice = ($type == 'leasing') ? Invoice::where('leasing_id', $id)->where('mode', 'sup')->first() :  Invoice::where('reservation_id', $id)->where('mode', 'sup')->first();
        $rate = Rate::find(1);
        if($invoice){

        }else{
            $insert = [];
            $insert['mode'] = "sup";
            $insert['amount'] = $rate->sup_amount;
            $insert['total_amount'] = $rate->sup_amount;
            if($type == 'leasing') $insert['leasing_id'] = $id;
            else $insert['reservation_id'] = $id;

            $last = Invoice::orderBy('created_at', 'desc')->first();
            if($last) $insert['id'] = $last->id + 1;
            else $insert['id'] = 1;

            $invoice = Invoice::create($insert);
        }

        $invoice['type'] = $type;
        $invoice['car'] = ($type == 'reservation') ? $invoice->reservation->car : $invoice->leasing->car;
        $invoice['back'] = ($type == 'reservation') ? Carback::where('reservation_id', $id)->first() : Carback::where('leasing_id', $id)->first();
        $invoice['rate'] = $rate;
        $invoice['reservation'] = $invoice->reservation;
        $invoice['leasing'] = $invoice->leasing;

//        dd($data);

        return PDF::loadView('sup-invoice', array('data' => $invoice));
    }
}
