{{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">--}}
<html>
<head>
    {{--<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">--}}
    <link rel="stylesheet" href="invoice.css">
</head>
<body>




{{--<style>--}}
    {{--.invoice{--}}
        {{--padding: 20px;--}}
        {{--font-family: "Montserrat";--}}
        {{--background: #fff;--}}
        {{--font-size: 12px--}}
    {{--}--}}
    {{--.invoice i{--}}
        {{--color: #ccc;--}}
        {{--font-size: 30px--}}
    {{--}--}}
    {{--.invoice .fa-car{--}}
        {{--color: #ec6118--}}
    {{--}--}}

    {{--.invoice table{--}}
        {{--width: 100%;--}}
        {{--font-size: 12px;--}}
        {{--margin: auto;--}}
    {{--}--}}
    {{--.invoice table td{--}}
        {{--width: 78%;--}}
        {{--font-size: 12px--}}
    {{--}--}}
    {{--.invoice .header{--}}
        {{--display: flex;--}}
        {{--justify-content: space-between;--}}
    {{--}--}}
    {{--.invoice .body{--}}

    {{--}--}}
    {{--.invoice .body .top{--}}
        {{--display: flex;--}}
        {{--justify-content: space-between;--}}
    {{--}--}}
    {{--.invoice .body .middle{--}}

    {{--}--}}
    {{--.invoice .footer{--}}

    {{--}--}}
{{--</style>--}}

<div class="invoice">
    <div class="header">
        <table>
            <tr>
                <td>
                    <div class="left">
                        <font color="gray">{{ $data->numfac }}</font>
                        <br>
                        @if(auth()->user()->account_type == 'paypal')
                        <i class="fab fa-paypal"></i>
                        @elseif(auth()->user()->account_type == 'flooz')
                        <img src="{{ url(env('STORAGE_PATH').'flooz.jpg') }}"  alt="flooz">
                        @elseif(auth()->user()->account_type== 'tmoney')
                        <img src="{{ url(env('STORAGE_PATH').'tmoney.png') }}"  alt="tmoney">
                        @elseif(auth()->user()->account_type == 'local')
                        <i class="fa fa-address-card"></i>
                        @else
                        <i class="fab fa-visa"></i>
                        @endif
                    </div>
                </td>
                <td align="right">
                    <div class="right">
                        <font color="gray">{{ $data->created_at->format('d-m-Y H:i') }}</font>
{{--                                    <img src="{{ url(env('STORAGE_PATH').'logo_easy.png') }}"/><br>--}}
                    </div>
                </td>
            </tr>
        </table>


    </div>
    <div class="body">
        <div class="top">
            <table>
                <tr>
                    <td>
                        <div >
                            <h3>{{ auth()->user()->name }}</h3>
                            {{ auth()->user()->email }}<br>
                            {{ auth()->user()->telephone }}<br>
                            {{ auth()->user()->address }}
                        </div>
                    </td>

                    <td align="right">
                        <div >
                            <h3>Spark | Shop</h3>
                            {{--spark@spark.org<br>--}}
                            +22890154505<br>
                            367 Rue Avedji, Lomé
                        </div>
                    </td>
                </tr>
            </table>



        </div>
        <div class="middle">
            <h3>Articles</h3>
            <table>
                @foreach($data->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td align="right"><b>{{ $item->amount }} <sup>FCFA</sup></b></td>
                    </tr>
                @endforeach
            </table>

            <h3>Paiement</h3>
            <table>
                <tr>
                    <td>Tarif Livraison HT</td>
                    <td align="right"><b>{{ $data->driver_amount }} <sup>FCFA</sup></b></td>
                </tr>
                <tr>
                    <td>Montant de réduction</td>
                    <td align="right"><b>{{ $data->reduction_amount }} <sup>FCFA</sup></b></td>
                </tr>
                <tr>
                    <td>Montant total HT</td>
                    <td align="right"><b>{{ $data->amount + $data->no_driver_amount }} <sup>FCFA</sup></b></td>
                </tr>
                <tr>
                    <td>Montant total TTC</td>
                    <td align="right"><b>{{ $data->ttc_amount }} <sup>FCFA</sup></b></td>
                </tr>
                <tr>
                    <td><br><h3>Total à payer</h3></td>
                    <td align="right"><br><h3>{{ $data->total_amount }} <sup>FCFA</sup></h3></td>
                </tr>

            </table>

        </div>

    </div>
</div>

<center><p><font color="gray" size="12px">&copy; copyright Spark | Shop 2019</font></p></center>

</body>
</html>