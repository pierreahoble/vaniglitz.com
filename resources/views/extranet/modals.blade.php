
<style>
.content{
display: flex;
justify-content: space-around;
height: 464px;
font-family: Montserrat
}
.content .img{
width: 50%; padding: 10px
}
.content .para{
width: 50%;
text-align: left;
padding-left: 10px
}
.content .para .description{
color: #555;
text-align: justify;
font-size: 12px;
height: 171px
}
@media screen and (max-width: 500px) {
.modal-content{
height: 1500px
}
.content{
display: block
}
.content .img{
width: 100%;
}
.content .para{
width: 100%;
padding: 10px
}
.content .para .description{
height: auto
}
}
</style>

@php
$cars = \App\Models\Car::all();
$user = \Illuminate\Support\Facades\Auth::user();
@endphp

<!-- Modals -->

@foreach($cars as $car)
    @php
        $photo=\Illuminate\Support\Facades\DB::table('photos')->where('card_id','=',$car->id)->get();
        $i = 0; $j = 0;
    @endphp

    <div class="portfolio-modal modal fade" id="car{{ $car->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal" >
                    <div class="lr" style="background-color: #f7b740">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Project Details Go Here -->
                                        <h3 class="text-uppercase">{{ $car->name }}</h3>
                                        <p class="item-intro text-muted">Catégorie: {{ $car->category->name }}<br>
                                        <center>Image(s) de l'article {{ $car->name }}</center></p>
                                        <div id="carouselExampleIndicators{{ $car->id }}" class="carousel slide" data-ride="carousel" style="border: 0px solid blue">
                                            <ol class="carousel-indicators">
                                                @foreach ($photo as $carfile)
                                                    <li data-target="#carouselExampleIndicators{{ $car->id }}" @if($i == 0) class="active" @endif data-slide-to="{{ $i }}" style="cursor: pointer"></li>
                                                    @php $i++ @endphp
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner" style="width: 100%;  border: 0px solid green">
                                                @foreach ($photo as $carfile)
                                                    <div class="carousel-item @if($j == 0) active @endif" style="border: 0px solid yellow; width: 100%">
                                                        <img class="d-block w-100" class="img-fluid" src="{{ asset($carfile->image )}}" alt="1" style="border-radius: 10px;height: 320px; object-fit: cover">
                                                    </div>
                                                    @php $j++ @endphp
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $car->id }}" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Précédent</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators{{ $car->id }}" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Suivant</span>
                                            </a>
                                        </div><br>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="card">
                                            <div class="card-header" style="font-size: 16px; color:#1b4b72;">Détails de l'article {{ $car->name }}</div>
                                            <div class="card-body">
                                                <div  class="para">
                                                    <p style="font-size: 20px">
                                                        Prix Unitaire: <b style="font-size: 28px">{{number_format( $car->amount , 0, '', '.')}} <sup>FCFA</sup></b>
                                                    </p>
                                                    Description du Produit<br><br>
                                                    <p class="description" style="height: 110px;overflow: auto">
                                                        <br>{{ $car->description }}
                                                    </p>
                                                    <table class="car-description">
                                                        <tr>
                                                            <td>Couleur: </td>
                                                            <td><b>{{ $car->color }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Etat:</td>
                                                            <td><b>{{ $car->carstate->name }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quantité en stock: </td>
                                                            <td><b>{{ $car->quantity }}</b></td>
                                                        </tr>
                                                    </table>

                                                    <div style="width: 100%">

                                                        <button class="btn modal-btn reserv" data-redirect="@if(!auth()->user())#contact-form @else  @endif" data-id="{{ $car->id }}" data-amount="{{ $car->amount }}" type="button" style="background: #ec6118" >
                                                            <i class="fa fa-cart-plus"></i> &nbsp; Ajouter au panier
                                                        </button>
                                                        <button class="btn modal-btn cancel" data-id="{{ $car->id }}" data-amount="{{ $car->amount }}" data-toggle="tooltip" title="Annuler" type="button" style="color: #ec6118; background: #ddd; display: none">
                                                            <i class="fa fa-check"></i> &nbsp Annuler l'Ajout au panier
                                                        </button>
                                                        <input type="hidden" class="session" value=""><br><br>
                                                        <p>
                                                            <a style="width:250px" class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                Achat Immédiat
                                                            </a>
                                                        </p>
                                                        <div class="collapse" id="collapseExample">
                                                            <div class="card card-body">
                                                                <form @if(auth()->user()) action="{{route('achatimmediat',Crypt::encrypt($car->id))}}"  method="post" @else onclick="alert('Veillez-vous connecté a votre compte svp.') @endif">
                                                                    @csrf
                                                                    <div class="form-row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="form-group col-sm-8">
                                                                            <label for="input2"><b style="color:#1a1a1a">Quantité</b></label>
                                                                            <div class="input-counter input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" class="btn-subtract btn btn-primary">
                                                                                        <i class="fa fa-minus"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input style="width: 80px" type="text" name="quantite" class="form-control counter" data-min="1" data-max="{{$car->quantity}}" data-default="1" readonly required>
                                                                                <div class="input-group-append">
                                                                                    <button type="button" class="btn-add btn btn-primary">
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div><br>
                                                                            <input type="submit" value="Acheter" class="btn btn-success">
                                                                        </div>
                                                                        <div class="col-sm-2"></div>
                                                                    </div>
                                                                </form>
                                                            </div><br>
                                                        </div>

                                                        <p>
                                                            <a style="width:250px" class="btn btn-dark" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                               Acheter au Panier
                                                            </a>
                                                        </p>
                                                        <div class="collapse" id="collapseExample2">
                                                            <div class="card card-body">
                                                                <form @if(auth()->user()) action="{{route('AjoutPanier',Crypt::encrypt($car->id))}}"  method="post" @else onclick="alert('Veillez-vous connecté a votre compte svp.') @endif">
                                                                    @csrf
                                                                    <div class="form-row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="form-group col-sm-8">
                                                                            <label for="input2"><b style="color:#1a1a1a">Acheter avec Le Panier<br>Quantité</b></label>
                                                                            <div class="input-counter input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" class="btn-subtract btn btn-primary">
                                                                                        <i class="fa fa-minus"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input style="width: 20px" type="text" name="quantite" class="form-control counter" data-min="1" data-max="{{$car->quantity}}" data-default="1" readonly required>
                                                                                <div class="input-group-append">
                                                                                    <button type="button" class="btn-add btn btn-primary">
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2"></div>
                                                                    </div>
                                                                    <input type="submit" value="Ajouter" class="btn btn-success">
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                     </div><br>
                                        <button class="btn btn-danger" data-dismiss="modal" type="button">
                                            <i class="fas fa-times"></i>
                                            Fermer la Page</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endforeach

@push('scripts')
    <script>

    </script>
@endpush

