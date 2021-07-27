{{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">--}}
<html>
<head>
    {{--<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">--}}
    <link rel="stylesheet" href="invoice.css">
    <link href="{{asset('css/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('css/css/style.css')}}" rel="stylesheet">
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


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"><br>
            <a href="{{route('index')}}" class="btn btn-success btn-sm">Boutique</a>
        </div>
        <div class="col-md-6"><br>
            <div class="invoice" >

                <div class="body">
                    <div class="top">
                        <table class="table table-bordered" style="font-size: 12px">
                            <tr>
                                <td>
                                    <div >
                                        <img src="{{asset('public/storage/tmoney.png') }}"  alt="tmoney" style="height: 90px" class="img-fluid"><br>

                                    </div>
                                </td>

                                <td align="right">
                                    <div >
                                        @php
                                            $b=\App\Boutique::find(1);
                                        @endphp
                                        <img src="{{asset($b->logo) }}"  alt="tmoney" style="height: 50px" class="img-fluid">
                                        <h3>{{$b->nom}} | Shop</h3>
                                        {{--spark@spark.org<br>--}}
                                        {{$b->numero}}<br>
                                        {{$b->adresse}}
                                    </div>
                                </td>
                            </tr>
                        </table>



                    </div>
                    <div class="middle">
                        <h3>Articles</h3>
                        <table class="table table-bordered" style="font-size: 12px">
                            <thead>
                            <th>Nom</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité(s)</th>
                            </thead>
                            <thead>
                            <th>{{ $produit->name }}</th>
                            <th><b>{{number_format($produit->amount  , 0, '', '.')}} <sup>FCFA</sup></b></th>
                            <th><b> {{ $qte }}</b></th>
                            </thead>
                        </table>

                        <h3>Paiement</h3>
                        <table class="table table-bordered" style="font-size: 12px">
                            @php
                                $mht=$produit->amount*$qte;
                                $mtva=($mht*($taux->tva/100))+$mht;
                            @endphp
                            <tr>
                                <td>Tarif de Livraison HT</td>
                                <td align="right"><b>{{number_format($taux->bail_rate  , 0, '', '.')}} <sup>FCFA</sup></b></td>
                            </tr>
                            {{--<tr>
                                <td>Montant de réduction</td>
                                <td align="right"><b>{{number_format($taux->reduction_rate , 0, '', '.')}} <sup>FCFA</sup></b></td>
                            </tr>--}}
                            <tr>
                                <td>Montant total HT</td>
                                <td align="right"><b>{{number_format( $mht, 0, '', '.')}} <sup>FCFA</sup></b></td>
                            </tr>
                            <tr>
                                <td>Montant total avec Tva</td>
                                <td align="right"><b>{{number_format( $mtva, 0, '', '.')}} <sup>FCFA</sup></b></td>
                            </tr>
                            <tr>
                                <td><h3>Total à payer TTC</h3></td>
                                <td align="right"><br><h4>{{number_format(($mtva+$taux->bail_rate), 0, '', '.')}} <sup>FCFA</sup></h4></td>
                            </tr>
                            @php
                            $Total=($mtva+$taux->bail_rate);
                            @endphp
                        </table>
                    </div>

                </div>
            </div>
            <button type="button" class="bt btn-primary" data-toggle="modal" data-target="#exampleModal">
                Payer
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #1b4b72;color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Information de Livraison</h5>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="{{route('PanierPaiement')}}">
                                @csrf
                                <input type="text" value="{{$Total}}" class="form-control" name="Total" hidden>
                                 <label>Nom Complet</label>
                                <input type="text" class="form-control" placeholder="Nom et Prenom" name="nom" required><br>
                                <label>Numero de Téléphone</label>
                                <input type="cel" class="form-control" placeholder="(code pays) numero" name="numero" required><br>
                                <label>Adresse de Livraison</label>
                                <textarea type="text" placeholder="Pays, Ville, Rue, Quartier" class="form-control" style="height: 120px;" required></textarea>
                                <small style="color:red">Soyez d'autant plus précis pour les coordonnées de Livraison</small>
                                <br><br>
                                <input type="submit" class="bt btn-primary btn-sm" value="Valider Paiement">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fermer</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-1"></div>

    </div>
</div>
<center><p><font color="gray">&copy; copyright Spark | Shop 2019</font></p></center>

</body>
<script type="text/javascript" src="{{asset('css/js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('css/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('css/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('css/js/mdb.min.js')}}"></script>
<!-- DatePicker JS -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js.map"></script>--}}


</html>