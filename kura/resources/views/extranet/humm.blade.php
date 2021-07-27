<div class="portfolio-modal modal fade" id="car{{ $car->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase" style="color: #ec6118">{{ $car->name }}</h2>
                            <h4><p class="item-intro text-muted" style="line-height: 1; color: gray">{{ $car->category->name }}</p></h4>
                            <div class="content">
                                <div class="img" style="border: 0px solid red; width: 500px; box-sizing: border-box;">
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
                                                    <img class="d-block w-100" class="img-fluid" src="{{ asset($carfile->image )}}" alt="1" style="border: 0px solid orange;height: 400px; object-fit: cover">
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
                                    </div>
                                </div>

                                {{--<div class="img">--}}
                                {{--<img class="img-fluid d-block mx-auto" src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" alt="" style="height: 100%; width: 100%; object-fit: cover">--}}
                                {{--</div>--}}
                                <div  class="para">
                                    <p style="font-size: 20px">
                                        Prix Unitaire <b style="font-size: 28px">{{number_format( $car->amount , 0, '', '.')}} <sup>FCFA</sup></b>
                                    </p>
                                    <p class="description" style="height: 90px">
                                        {{ $car->description }}
                                    </p>
                                    <table class="car-description">
                                        <tr>
                                            <td>Couleur</td>
                                            <td><b>{{ $car->color }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Etat</td>
                                            <td><b>{{ $car->carstate->name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Quantité en stock</td>
                                            <td><b>{{ $car->quantity }}</b></td>
                                        </tr>
                                    </table>
                                    <div style="width: 100%">
                                        <button class="btn modal-btn reserv" data-redirect="@if(!auth()->user())#contact-form @else @endif" data-id="{{ $car->id }}" data-amount="{{ $car->amount }}" type="button" style="margin-top: 20px; background: #ec6118" >
                                            <i class="fa fa-cart-plus"></i> &nbsp; Ajouter au panier
                                        </button>
                                        <button class="btn modal-btn cancel" data-id="{{ $car->id }}" data-amount="{{ $car->amount }}" data-toggle="tooltip" title="Annuler" type="button" style="margin-top: 20px; color: #ec6118; background: #ddd; display: none">
                                            <i class="fa fa-check"></i> &nbsp Ajouté au panier
                                        </button>
                                        <input type="hidden" class="session" value="">
                                    </div>

                                </div>
                            </div>

                            {{--<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>--}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>