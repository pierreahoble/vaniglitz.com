@extends('extranet.layouts.app')

@section('content')



    @php
        session_start();
        if(!isset($_SESSION['page_redirect'])) $_SESSION['page_redirect'] = '';

        //\App\Models\Mark::create(['name' => 'Toyota']);
        //\App\Models\Mark::create(['name' => 'KIA']);
        //\App\Models\Mark::create(['name' => 'Nissan']);
        //\App\Models\Mark::create(['name' => 'Renault']);
        //\App\Models\Mark::create(['name' => 'Citroën']);
        //\App\Models\Mark::create(['name' => 'Peugeot']);
        //\App\Models\Mark::create(['name' => 'Hyundai']);
        //\App\Models\Mark::create(['name' => 'BMW']);
        //\App\Models\Mark::create(['name' => 'Range Rover']);

    @endphp

    <style>
        .password-bloc{
            position: relative;
        }
        .password-bloc i{
            position: absolute;
            right: 10px;
            top: 10px;
            color: #777
        }
        #contact, #contact-form, #register-form{
            /*font-family: Montserrat, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji' !important;*/
        }
        .btn-cart{
            position: fixed;
            right: 0;
            top: 50%;
            color: #fff;
            z-index: 100 !important;
            background: #ec6118;
            padding: 10px;
            font-size: 12px;
            font-family: Montserrat;
        }
        .btn-cart div{
            display: inline-block;
            vertical-align: middle;
            padding: 2px;
        }
        .btn-cart i{
            font-size: 1.5em
        }
        #portfolio *{
            z-index: 0 !important;
        }
    </style>


    <!-- Cars Grid -->
    <div id="total-bloc" style="display: none">
        <a href="#" data-toggle="modal" id="btn-cart" data-target="#preview-modal" class="btn-cart">
            <div><i class="fas fa-cart-plus"></i></div>
            <div>
                Passer à la caisse
                <br>
                <b class="total-basket"> </b> <b><sup>FCFA</sup></b>
            </div>

        </a>
    </div>
    <section class="bg-light" id="portfolio" style="margin-top:-10%">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="margin-top:-10%">
                    <h2 class="section-heading text-uppercase">Articles </h2>
                    <h4 class="section-subheading text-muted">Choisissez vos articles puis ajoutez les au panier </h4>
                    @php
                        $cate=\App\Models\Category::OrderBy('name','asc')->get();
                    @endphp
                    <form class="inline-form" method="post" action="{{route('RechercheParCateggorie')}}#portfolio">
                        @csrf
                        <b style="font-size:17px">Recherche par Catégorie</b>
                        <center> <select class="form-control" name="name" required style="width:290px">
                                <option value="">Choississez la Catégorie</option>
                                @foreach($cate as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select></center>
                        <input type="submit" value="OK" class="btn btn-primary btn-sm">
                    </form>
                    <hr><br>
                </div>

            </div>

            <br>
            <div class="row">
                @foreach($cars as $car)
                    <div class="col-md-3 col-sm-6 portfolio-item" @if(!$car->available) style="opacity: 0.5; cursor: none" @endif>
                        <p style="text-align: right; font-family: Montserrat; font-size: 12px">
                            Prix Unitaire: <b style="font-size: 20px">{{number_format($car->amount , 0, '', '.')}} <sup>FCFA</sup></b>
                        </p>
                        <a class="portfolio-link"  @if(!$car->available) href="#car{{ $car->id }}" title="Cet article est temporairement indisponible. Veuillez choisir un autre svp" @else title="Cliquez pour payer {{$car->name}}" data-toggle="modal" href="#car{{ $car->id }}" @endif onclick="putSession()">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <div class="item-check" data-id="{{ $car->id }}" style="display: none">
                                <i class="fa fa-check"></i>
                            </div>
                            <img class="img-fluid" style="object-fit: cover; width: 400px;  height: 180px; border-radius: 10px" src="{{ $car->images}}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4 style="color: #ec6118">{{ $car->name }}</h4>
                            <p class="text-muted">{{ $car->category->name }}</p>
                        </div><br>
                        <center> <a class="btn btn-success btn-sm" data-toggle="collapse" href="#collapseExample{{$car->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Acheter
                            </a>
                            <div class="collapse" id="collapseExample{{$car->id}}">
                                <div class="card card-body">
                                    <form action="{{route('achatimmediatConnexion',Crypt::encrypt($car->id))}}"  method="post">
                                        @csrf
                                        <div class="form-row">


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
                                            </div>

                                        </div>
                                        <br>
                                        <input type="submit" value="Acheter" class="btn btn-success btn-sm">
                                    </form>
                                </div>
                            </div></center>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <br>
                {{ $cars->links() }}
            </div>
        </div>
    </section>

    @if(\Illuminate\Support\Facades\Auth::user())

    @else
        @include('extranet.login')
    @endif

    {{--@php--}}
    {{--\Illuminate\Support\Facades\DB::table('cars')->update([--}}
    {{--'lome_accra' => 20000,--}}
    {{--'lome_cotonou' => 15000,--}}
    {{--]);--}}
    {{--@endphp--}}

    @if($user)
        @include('extranet.reservation.list')
        {{--@include('extranet.leasing.list')--}}
    @endif

    <!-- Services -->
    {{--<section id="services">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12 text-center">--}}
    {{--<h2 class="section-heading text-uppercase">Nos Offres</h2>--}}
    {{--<h3 class="section-subheading text-muted">Nous offrons : </h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<br><br>--}}
    {{--<div class="row text-center">--}}

    {{--<a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">--}}
    {{--<div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">--}}
    {{--<span class="fa-stack fa-4x">--}}
    {{--<i class="fas fa-circle fa-stack-2x text-primary"></i>--}}
    {{--<i class="fab fa-etsy fa-stack-1x fa-inverse"></i>--}}
    {{--</span>--}}
    {{--<h4 class="service-heading">EXPRESS</h4></a>--}}
    {{--<p class="text-muted">Solde spéciale du 24 au 30 Octobre!!</p>--}}
    {{--</div>--}}

    {{--<div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">--}}
    {{--<span class="fa-stack fa-4x">--}}
    {{--<i class="fas fa-circle fa-stack-2x text-primary"></i>--}}
    {{--<i class="fab fa-etsy fa-stack-1x fa-inverse"></i>--}}
    {{--</span>--}}
    {{--<h4 class="service-heading">EXPRESS</h4></a>--}}
    {{--<p class="text-muted">Solde spéciale du 24 au 30 Octobre!!</p>--}}
    {{--</div>--}}

    {{--<div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">--}}
    {{--<span class="fa-stack fa-4x">--}}
    {{--<i class="fas fa-circle fa-stack-2x text-primary"></i>--}}
    {{--<i class="fab fa-etsy fa-stack-1x fa-inverse"></i>--}}
    {{--</span>--}}
    {{--<h4 class="service-heading">EXPRESS</h4></a>--}}
    {{--<p class="text-muted">Solde spéciale du 24 au 30 Octobre!!</p>--}}
    {{--</div>--}}

    {{--<div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">--}}
    {{--<span class="fa-stack fa-4x">--}}
    {{--<i class="fas fa-circle fa-stack-2x text-primary"></i>--}}
    {{--<i class="fab fa-etsy fa-stack-1x fa-inverse"></i>--}}
    {{--</span>--}}
    {{--<h4 class="service-heading">EXPRESS</h4></a>--}}
    {{--<p class="text-muted">Solde spéciale du 24 au 30 Octobre!!</p>--}}
    {{--</div>--}}

    {{--<div class="col-md-3"><a href="#contact" class="js-scroll-trigger" style="color: #000 !important;">--}}
    {{--<span class="fa-stack fa-4x">--}}
    {{--<i class="fas fa-circle fa-stack-2x text-primary"></i>--}}
    {{--<i class="fas fa-calendar fa-stack-1x fa-inverse"></i>--}}
    {{--</span>--}}
    {{--<h4 class="service-heading">ABONNEMENT MENSUEL</h4></a>--}}
    {{--<p class="text-muted">Contactez l'agence pour discuter de votre formule mensuelle.</p>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}



    {{--<!-- Team -->--}}
    {{--<section class="bg-light" id="team">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12 text-center">--}}
    {{--<h2 class="section-heading text-uppercase">Notre extraordinaire équipe</h2>--}}
    {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-4">--}}
    {{--<div class="team-member">--}}
    {{--<img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">--}}
    {{--<h4>Kay Garland</h4>--}}
    {{--<p class="text-muted">Lead Designer</p>--}}
    {{--<ul class="list-inline social-buttons">--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-twitter"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-facebook-f"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-linkedin-in"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-4">--}}
    {{--<div class="team-member">--}}
    {{--<img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">--}}
    {{--<h4>Larry Parker</h4>--}}
    {{--<p class="text-muted">Lead Marketer</p>--}}
    {{--<ul class="list-inline social-buttons">--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-twitter"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-facebook-f"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-linkedin-in"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-4">--}}
    {{--<div class="team-member">--}}
    {{--<img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">--}}
    {{--<h4>Diana Pertersen</h4>--}}
    {{--<p class="text-muted">Lead Developer</p>--}}
    {{--<ul class="list-inline social-buttons">--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-twitter"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-facebook-f"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="list-inline-item">--}}
    {{--<a href="#">--}}
    {{--<i class="fab fa-linkedin-in"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-8 mx-auto text-center">--}}
    {{--<p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

    {{--<!-- Clients -->--}}
    {{--<section class="py-5">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<a href="#">--}}
    {{--<img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<a href="#">--}}
    {{--<img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<a href="#">--}}
    {{--<img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<a href="#">--}}
    {{--<img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

    <!-- Contact -->
    @if($user)
        <section id="contact" style="background: #444 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Contactez Nous</h2>
                        <h3 class="section-subheading text-muted">Nous sommes aptes à répondre à vos bésoins.</h3>
                        @if($Success=Session::get('info'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                       <form id="contactForm" name="sentMessage" novalidate="novalidate">
                       {{-- <form method="post" action="{{route('Envoimail')}}#contact">--}}
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" class="form-control" name="name" id="name" type="text" placeholder="Votre nom *" required="required" data-validation-required-message="Entrez votre nom SVP.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input readonly value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" class="form-control" name="email" id="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Entrez votre adresse mail SVP.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input readonly value="{{ \Illuminate\Support\Facades\Auth::user()->telephone }}" class="form-control" name="phone" id="phone" type="tel" placeholder="Votre Téléphone *" required="required" data-validation-required-message="Entrez votre numero de téléphone SVP.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" placeholder="Votre Message *" required data-validation-required-message="Ecrivez un message SVP."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                                <input type="hidden" id="photo" value="{{ \Illuminate\Support\Facades\Auth::user()->photo }}">
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyez votre Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    @endif
    <!-- About -->
    {{--<section id="about">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12 text-center">--}}
    {{--<h2 class="section-heading text-uppercase">A propos</h2>--}}
    {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<ul class="timeline">--}}
    {{--<li>--}}
    {{--<div class="timeline-image">--}}
    {{--<img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">--}}
    {{--</div>--}}
    {{--<div class="timeline-panel">--}}
    {{--<div class="timeline-heading">--}}
    {{--<h4>2009-2011</h4>--}}
    {{--<h4 class="subheading">Our Humble Beginnings</h4>--}}
    {{--</div>--}}
    {{--<div class="timeline-body">--}}
    {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<li class="timeline-inverted">--}}
    {{--<div class="timeline-image">--}}
    {{--<img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">--}}
    {{--</div>--}}
    {{--<div class="timeline-panel">--}}
    {{--<div class="timeline-heading">--}}
    {{--<h4>March 2011</h4>--}}
    {{--<h4 class="subheading">An Agency is Born</h4>--}}
    {{--</div>--}}
    {{--<div class="timeline-body">--}}
    {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<div class="timeline-image">--}}
    {{--<img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">--}}
    {{--</div>--}}
    {{--<div class="timeline-panel">--}}
    {{--<div class="timeline-heading">--}}
    {{--<h4>December 2012</h4>--}}
    {{--<h4 class="subheading">Transition to Full Service</h4>--}}
    {{--</div>--}}
    {{--<div class="timeline-body">--}}
    {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<li class="timeline-inverted">--}}
    {{--<div class="timeline-image">--}}
    {{--<img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">--}}
    {{--</div>--}}
    {{--<div class="timeline-panel">--}}
    {{--<div class="timeline-heading">--}}
    {{--<h4>July 2014</h4>--}}
    {{--<h4 class="subheading">Phase Two Expansion</h4>--}}
    {{--</div>--}}
    {{--<div class="timeline-body">--}}
    {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<li class="timeline-inverted">--}}
    {{--<div class="timeline-image">--}}
    {{--<h4>Be Part--}}
    {{--<br>Of Our--}}
    {{--<br>Story!</h4>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}



@endsection

@push('scripts')

<script>

    var checkPass = false;
    var idsSelect = []
    var totalBasket = 0

    var typePage =  window.location.href.split('#')

    if(typePage[1] === 'register'){
        window.location.href = '#contact-form'
        setTimeout(function () {
            $('#contact-form').hide()
            $('#register-form').hide()
            $('#register-form').show()
        }, 200)
    }

    $('#create').click(function(){
        $('#show-register').trigger('click')
    })

    {{--$('.reserv').click(function() {--}}
        {{--@php--}}
            {{--if(!\Illuminate\Support\Facades\Auth::user() == null){--}}
                {{--$_SESSION['page_redirect'] = route('extranet.createReservation', [0, 24]).'#reservation';--}}
            {{--}--}}
        {{--@endphp--}}
    {{--})--}}

    $('.fa-eye').click(function(){
        if(checkPass === false){
            $('.password').attr('type', 'text')
            checkPass = true;
        }else{
            $('.password').attr('type', 'password')
            checkPass = false;
        }
    })

    $('.reserv').click(function () {
        var self = $(this)
        if(self.attr('data-redirect') == '#contact-form '){
            self.attr('data-dismiss', 'modal')
            setTimeout(function(){
                window.location = '#contact-form'
            }, 1000)

        }else{
            self.hide().parent().find('.cancel').show()
            totalBasket += parseInt(self.attr('data-amount'))
            idsSelect.push(self.attr('data-id'))
            $('.total-basket').text(totalBasket)
            $('.item-check').each(function(){
                if($(this).attr('data-id') == self.attr('data-id')){
                    $(this).show()
                }
            })
            $('#total-bloc').show()
        }

    })
    $('.cancel').click(function () {
        var self = $(this)
        self.hide().parent().find('.reserv').show()
        totalBasket -= parseInt(self.attr('data-amount'))
        idsSelect.splice(idsSelect.indexOf(self.attr('data-id')), 1 );
        $('.total-basket').text(totalBasket)
        $('.item-check').each(function(){
            if($(this).attr('data-id') == self.attr('data-id')){
                $(this).hide()
            }
        })
        if(totalBasket <= 0) $('#total-bloc').hide()
    })

    $('#continue').click(function(){
        var mode = "tmoney"
        var delivery = $('#delivery').val()
        $('#invoice-frame').attr('src', 'extranet/invoice/preview/'+idsSelect+'/'+mode+'/'+delivery+'/'+totalBasket)
        setFormUrl()
    })

    function setFormUrl(){
        var baseUrl = 'https://paygateglobal.com/v1/page';
        var token = "a81d1e51-bf4c-4fa1-ad94-ef30eb442c58"
        var amount = totalBasket*1.18
        var description = 'test'
        var identifier = Date.now()
        var mode = "{{ auth()->user() ? auth()->user()->account_type : '' }}"
        var delivery =  $('#delivery').val()
        var url = encodeURIComponent('{{ env('URL', 'http://localhost:8000') }}?status=success&mode='+mode+'&delivery='+delivery+'&idsSelect='+idsSelect+'&totalBasket='+totalBasket)
        var urlString = baseUrl+'?token='+token+'&amount='+amount+'&description='+description+'&identifier='+identifier+'&url='+url
        $('#form-paid').attr('href', urlString).removeAttr('data-mode').removeAttr('data-toggle').removeAttr('data-target').removeAttr('data-dismiss')
    }

    var done = false

    var currentPage = window.location.href.split('&')

    if (currentPage[1] && !done){
        saveInvoice()
    }

    function saveInvoice(){

        var mode = "{{ isset($_GET['mode']) ? $_GET['mode'] : '' }}"
        var delivery = "{{ isset($_GET['delivery']) ? $_GET['delivery'] : '' }}"
        var idsselect = "{{ isset($_GET['idsSelect']) ? $_GET['idsSelect'] : '' }}"
        var totalbasket =  "{{ isset($_GET['totalBasket']) ? $_GET['totalBasket'] : '' }}"

        $.post('{{ route('extranet.storeInvoice') }}',
            {
                _token : '{{ csrf_token() }}',
                idsSelect : idsselect,
                mode : mode,
                delivery : delivery,
                totalBasket : totalbasket
            }, function (rsp){
                done = true
                window.location.href = '{{ env('URL', 'http://localhost:8000') }}/#reservation'
            })
    }

</script>
@endpush


