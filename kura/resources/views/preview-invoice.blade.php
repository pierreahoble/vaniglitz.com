<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<style>
    .invoice{
        padding: 20px;
        font-family: "Montserrat";
        background: #fff;
        font-size: 12px
    }
    .invoice i{
        color: #ccc;
        font-size: 30px
    }
    .invoice .fa-car{
        color: #ec6118
    }

    .invoice table{
        width: 100%;
        font-size: 12px;
        margin: auto;
    }
    .invoice table td{
        width: 78%;
        font-size: 12px
    }
    .invoice .header{
        display: flex;
        justify-content: space-between;
    }
    .invoice .body{

    }
    .invoice .body .top{
        display: flex;
        justify-content: space-between;
    }
    .invoice .body .middle{

    }
    .invoice .footer{

    }
</style>

<div class="invoice">
    @php
        $b=\App\Boutique::find(1);
    @endphp
    <div class="header">
        <div class="left">
{{--            {{ date('d/m/y') }}--}}
            @if($data->mode == 'paypal')
                <i class="fab fa-paypal"></i>
            @elseif($data->mode == 'flooz')
                <img src="{{ url(env('STORAGE_PATH').'flooz.jpg') }}" style="width: 100px" alt="flooz">
            @elseif($data->mode == 'tmoney')
                <img src="{{ url(env('STORAGE_PATH').'tmoney.png') }}" style="width: 100px" alt="tmoney">
            @elseif($data->mode == 'local')
                <i class="fa fa-address-card"></i>
            @else
                <i class="fab fa-visa"></i>
            @endif
        </div>
        <div class="right">
            <img src="{{asset($b->logo) }}" style="width: 50px; margin-right: 8%"/><br>
        </div>
    </div>
    <div class="body">
        <div class="top">
            <div >
               <h3>{{ auth()->user()->name }}</h3>
                {{ auth()->user()->email }}<br>
                {{ auth()->user()->telephone }}<br>
                {{ auth()->user()->address }}
            </div>
            <div>
                <br>
                <i>
{{--                    {{ $data->numfac }}--}}
                </i>
            </div>

            <div >
                <h3>{{$b->nom}} | Shop</h3>
                {{--spark@spark.org<br>--}}
                {{$b->numero}}<br>
                {{$b->adresse}}
            </div>
        </div>
        <div class="middle">
            <h3>Articles</h3>
            <table>
                @foreach($data->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td><b>{{number_format($item->amount, 0, '', '.')}} <sup>FCFA</sup></b></td>
                </tr>
                @endforeach
            </table>

            <h3>Paiement</h3>
            <table>
                <tr>
                    <td>Tarif Livraison HT</td>
                    <td><b>{{number_format($rate->bail_rate, 0, '', '.')}} <sup>FCFA</sup></b></td>
                </tr>


                <tr>
                    <td>Montant total TTC</td>
                    <td><b>{{number_format($data->ttc, 0, '', '.')}} <sup>FCFA</sup></b></td>
                </tr>
                <tr>
                    <td><br><h3 style="color: #ec6118">Total à payer</h3></td>
                    <td><br><h3 style="color: #ec6118">{{number_format($data->total, 0, '', '.')}} <sup>FCFA</sup></h3></td>
                </tr>
            </table>

        </div>

    </div>
</div>