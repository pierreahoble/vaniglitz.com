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
                                        <img src="{{asset('public/storage/tmoney.png') }}"  alt="tmoney" style="height: 50px" class="img-fluid">
                                        <h3>{{ auth()->user()->name }}</h3>
                                        {{ auth()->user()->email }}<br>
                                        {{ auth()->user()->telephone }}<br>
                                        {{ auth()->user()->address }}
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
                        <h3>Articles <a title="Ajouter un Article au Panier" href="{{route('index')}}#portfolio"><img  src="{{asset('public/storage/add.png')}}" class="img-fluid" style="height: 30px;"></a></h3>

                        @if($Success=Session::get('cool'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                        <table class="table table-bordered" style="font-size: 12px">
                            <thead>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité(s)</th>
                            <th>Total HT Produit</th>
                            <th>Action(s)</th>
                            </thead>
                            <tbody>
                            @foreach($Panier as $i=>$P)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$P->nom}}</td>
                                <td>{{number_format($P->prix , 0, '', '.')}} <sup>FCFA</sup></td>
                                <td>{{$P->quantite}}</td>
                                <td>{{number_format($P->total, 0, '', '.')}} <sup>FCFA</sup></td>
                                <td>
                                    <a  data-toggle="modal" data-target="#exampleModal{{$i}}" title="Modifier"><img src="{{asset('public/storage/update.png')}}" class="img-fluid" style="height: 30px;"></a>
                                    <a title="Supprimer" href="{{route('SupprimerPanier',Crypt::encrypt($P->id))}}"><img  src="{{asset('public/storage/delete.png')}}" class="img-fluid" style="height: 41px;"></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1b4b72;color:white">
                                            <h5 class="modal-title" id="exampleModalLabel">Formulaire de Modification du Panier</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('modifierPanier',Crypt::encrypt($P->id))}}">
                                                @csrf
                                                <label>Article</label>
                                                <input type="text" class="form-control" value="{{$P->nom}}" readonly><br>
                                                @php
                                                  $produi=\App\Models\Car::find($P->idProduit)->first();
                                                @endphp
                                                <label>Quantité de {{$P->nom}}</label>
                                                <input type="number" max="{{$produi->quantity}}" class="form-control" name="quantite" min="1" value="{{$P->quantite}}" required><br>
                                                <input type="submit" class="bt btn-primary btn-sm" value="Modifier">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fermer</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <tr>
                                <td colspan="4">TOTAL</td>
                                <td><center>{{number_format($produit , 0, '', '.')}} FCFA</center></td>
                               
                            </tr>
                            </tbody>
                        </table>

                        <h3>Paiement</h3>
                        <table class="table table-bordered" style="font-size: 12px">
                            <tr>
                                <td>Tarif de Livraison HT</td>
                                <td align="right"><b>{{number_format($taux->bail_rate , 0, '', '.')}} <sup>FCFA</sup></b></td>
                            </tr>
                           {{-- <tr>
                                <td>Montant de réduction</td>
                                <td align="right"><b>{{number_format($taux->reduction_rate , 0, '', '.')}} <sup>FCFA</sup></b></td>
                            </tr>--}}
                            <tr>
                                <td>Montant total HT</td>
                                <td align="right"><b>{{number_format($produit, 0, '', '.')}} <sup>FCFA</sup></b></td>
                            </tr>
                            <tr>
                                <td>Montant total Tva</td>
                                <td align="right"><b>{{number_format(($produit*($taux->tva/100))+$produit , 0, '', '.')}} <sup>FCFA</sup></b></td>
                                @php
                                   $mtva=($produit*($taux->tva/100))+$produit;
                                @endphp
                            </tr>
                            <tr>
                                <td><h3>Total à payer TTC</h3></td>
                                <td align="right"><br><h4>{{number_format(($mtva+$taux->bail_rate), 0, '', '.')}} <sup>FCFA</sup></h4></td>
                            </tr>
                               @php
                                  $Total=$mtva+$taux->bail_rate;
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
                            <h5 class="modal-title" id="exampleModalLabel">Formulaire d'Adresse de Livraison</h5>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="{{route('PanierPaiement')}}">
                                @csrf
                                <b>Merci pour votre Achat<br> Veillez renseigner les Informations de Livraison.</b>
                                <br><br>
                                <input value="{{$Total}}" hidden name="Total">
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