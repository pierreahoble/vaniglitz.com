@extends('extranet.layouts.app')

@section('content')

    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Articles</h2>
                    <h3 class="section-subheading text-muted">Choisissez vos articles puis ajoutez les au panier </h3>
                </div>

            </div>

            <br><br>

            <div class="row">
                @foreach($cars as $car)
                    @php
                        if($car->carfiles){
                            foreach ($car->carfiles as $carfile){
                                $imageName = $carfile->name;
                                break;
                            }
                        }

                    @endphp
                    <div class="col-md-3 col-sm-6 portfolio-item" @if(!$car->available) style="opacity: 0.5; cursor: none" @endif>
                        <p style="text-align: right; font-family: Montserrat; font-size: 12px">
                            A partir de <b style="font-size: 20px">{{ $car->amount }} <sup>FCFA</sup></b>
                        </p>
                        <a class="portfolio-link"  @if(!$car->available) href="#car{{ $car->id }}" title="Cet article est temporairement indisponible. Veuillez choisir un autre svp" @else data-toggle="modal" href="#car{{ $car->id }}" @endif onclick="putSession()">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <div class="item-check" data-id="{{ $car->id }}" style="display: none">
                                <i class="fa fa-check"></i>
                            </div>
                            <img class="img-fluid" style="object-fit: cover; width: 400px;  height: 180px; border-radius: 10px" src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4 style="color: #ec6118">{{ $car->name }}</h4>
                            <p class="text-muted">{{ $car->category->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection