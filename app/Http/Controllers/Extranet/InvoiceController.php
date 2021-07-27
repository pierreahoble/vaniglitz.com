<?php

namespace App\Http\Controllers\Extranet;
use App\Http\Controllers\PDFController;
use App\Mail\AlertInvoiceUser;
use App\Models\Car;
use App\Models\Invoice;
use App\Models\Leasing;
use App\Models\Rate;
use App\Models\Reservation;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class InvoiceController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $invoices = Invoice::orderBy('created_at', 'desc')->get();
        return view('extranet.invoice.list', compact('invoices'));
    }

    public function show($id){
        $invoice = Invoice::find($id);
//        return view('extranet.invoice.show', compact('invoice'));
    }

    public function create(){
        return view('extranet.invoice.create');
    }

    public function store(Request $request){
        $data = $request->all();

        $ids = $data['idsSelect'];
        $total = $data['totalBasket'];
        $delivery = $data['delivery'];
        $mode = $data['mode'];

        $items = [];
        $rate = Rate::find(1);
        $data['amount'] = $total;
        $ids = explode(',', $ids);

        foreach ($ids as $id){
            $items[] = Car::find($id);
        }

        $data['items'] = $items;

        if($delivery){
            $data['driver_amount'] = $rate->no_driver_rate;
        }else{
            $data['driver_amount'] = 0;
        }

        if($this->isWeekend(date('d/m/Y'))){
            $data['reduction_amount'] = ($data['amount'] * $rate->reduction_rate) / 100;
        }else{
            $data['reduction_amount'] = 0;
        }

        $data['tva_amount'] = (($data['amount'] + $data['driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
        $data['ttc_amount'] = $data['amount'] + $data['driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];

        $data['total_amount'] = $data['ttc_amount'] + $rate->charge;

        $data['charge'] = $rate->charge;

        $data['mode'] = $mode;
        $data['numfac'] = 'FAC-000'.date('YmdHis');
        $data['user_id'] = auth()->user()->id;
        $data['items'] = $data['idsSelect'];

        $last = Invoice::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;

        $insert = Invoice::create($data);

//        if($insert){
//            Mail::to($insert->reservation->user)->send(new AlertInvoiceUser($reservation));
//            Mail::to('factures@easycarrental.fr')->send(new AlertInvoiceUser($reservation));
//        }
        return $insert;
    }

    public function edit($id){
        $invoice = Invoice::find($id);
        return view('extranet.invoice.edit', compact('invoice'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);        }

        Invoice::find($id)->update($data);

        return Redirect::route('extranet.indexInvoice')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Invoice::find($id)->delete();
        return Redirect::route('extranet.indexInvoice')->with('success', 'Suppression effectuée avec succès');
    }

    /*public function preview($ids, $mode, $delivery, $total){
        $items = [];
        $rate = Rate::find(1);
        $data['amount'] = $total;
        $ids = explode(',', $ids);

        foreach ($ids as $id){
            $items[] = Car::find($id);
        }

        $data['items'] = $items;

        if($delivery){
            $data['no_driver_amount'] = $rate->no_driver_rate;
        }else{
            $data['no_driver_amount'] = 0;
        }

        if($this->isWeekend(date('d/m/Y'))){
            $data['reduction_amount'] = ($data['amount'] * $rate->reduction_rate) / 100;
        }else{
            $data['reduction_amount'] = 0;
        }

        $data['tva_amount'] = (($data['amount'] + $data['no_driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
        $data['ttc'] = $data['amount'] + $data['no_driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];

        $data['total'] = $data['ttc'] + $rate->charge;

        $data['charge'] = $rate->charge;

        $data['mode'] = $mode;

        $data = (object) $data;

        return view('preview-invoice', compact('data'));
    }*/


    public function preview($ids, $mode, $delivery, $total){
        $items = [];
        $rate = Rate::find(1);
        $data['amount'] = $total;
        $ids = explode(',', $ids);

        foreach ($ids as $id){
            $items[] = Car::find($id);
        }

        $data['items'] = $items;

        $data['tva_amount'] = ( $data['amount'] * ($rate->tva/100)) + $data['amount'];
        $data['ttc'] = $data['tva_amount'] + $rate['bail_rate'];

        $data['total'] = $data['ttc'] ;

        $data['charge'] = 0;

        $data['mode'] = $mode;

        $data = (object) $data;

        return view('preview-invoice', compact('data','rate'));
    }
    
    public function getJsonDatas($id, $mode, $type){
        $data = ($type == 'leasing') ? Leasing::find($id) : Reservation::find($id);
        $rate = Rate::find(1);

        if($data->driver){
            $data['bail'] = 0;
            $days = $data['date_start']->diffInDays($data['date_back']);
            if($days < 1) $data['no_driver_amount'] = $rate->no_driver_rate;
            else $data['no_driver_amount'] = $rate->no_driver_rate * $days;
        }else{
            $data['no_driver_amount'] = 0;
            $data['bail'] = $data->car->bail;
        }

        if($this->isWeekend(date('d/m/Y'))){
            $data['reduction_amount'] = ($data['amount'] * $rate->reduction_rate) / 100;
        }else{
            $data['reduction_amount'] = 0;

        }
        $data['tva_amount'] = (($data['amount'] + $data['no_driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
        $data['ttc'] = $data['amount'] + $data['no_driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];


        $data['total'] = $data['ttc'] + $data['bail'] + $rate->charge;

        $data['charge'] = $rate->charge;

        $data['mode'] = $mode;

        $data['type'] = $type;
//        $data['data'] = $this->paygate($data, $type);

        return $data;
    }

    public function download($id){
        $pdf = new PDFController();
        $download = $pdf->invoice($id);
        return $download->download('Facture_'.$id.'_'.auth()->user()->name.'_'.date('dmYHis').'_Spark|Shop');
    }

}