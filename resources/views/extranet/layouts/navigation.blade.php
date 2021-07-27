@php
    use Illuminate\Support\Facades\Auth;
 $boutique=\App\Boutique::find(1);
@endphp

<!-- Navigation -->
<style>
    .band{
        background: #333;
        width: 100%;
        height: 40px;
        margin: auto;
        padding: 10px;
        font-family: Montserrat;
        font-size: 12px;
        z-index: 2000;
        top: 0;
        position: absolute;
    }
    .band div{
        display: inline-block;
        color: #fff;
        width: 22%;
        float: right
    }
    .band div i{
        color: #ec6118;
        font-size: 14px
    }
    .fixed-top{
        position: absolute !important;
    }
    #mainNav{
        background: transparent !important;
    }
    #mainNav li{
        font-size: 13px !important;
    }
    @media (max-width: 500px) {
        .band{
            height: 95px;
            position: inherit;
        }
        .band div{
            display:block;
            float: none;
            width: 100% !important;
            margin: auto;
            text-align: center;
        }
        .fixed-top{
            top: 95px !important;
            position: fixed;
        }
        .nav-link{
            color: #444 !important;
        }
        .container{
            margin-top: 0 !important;
        }
        .fixed-top{
            position: inherit !important;
        }
        #mainNav{
            background: transparent !important;
        }
    }


</style>
<div class="band">
    <div>
        <i class="fas fa-envelope"></i>
        &nbsp;
        <a href="mailto:{{$boutique->email}}">{{$boutique->email}}</a>
    </div>
    <div>
        <i class="fas fa-phone"></i>
        &nbsp;
        <a href="tel:+22893540220">{{$boutique->numero}}</a>
    </div>
    <div>
        <i class="fas fa-map-marker-alt"></i>
        &nbsp;
        {{$boutique->adresse}}
    </div>
    <div>
        <i class="fas fa-clock"></i>
        &nbsp;
        {{$boutique->heure}}
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container" style="margin-top: 10px">
        <br><br>
        <a class="navbar-brand js-scroll-trigger" href="{{ route('index') }}#page-top">
            <img src="{{ asset($boutique->logo) }}" style="width: 115px;border-radius:45px;margin-top:5px"/>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto" style="font-weight: bold !important;">
                @if(auth()->user() AND auth()->user()->isAdmin())
                    <li class="nav-item">
                        @php
                          $panier=\App\Panier::where('etat','=',0)->count();
                        @endphp
                        <a title="Panier" href="{{route('recapPanier')}}" style="padding: 14px;">
                            <img src="{{asset('Icono-Ecommerce.jpg')}}" class="img-fluid" style="margin-top:7px;border-radius:25px;height:37px"><sup style="font-size:12px;color:#ffd600"> {{ $panier}}</sup>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('intranet.indexCar') }}#portfolio">Tableau de bord</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#portfolio">Articles</a>
                </li>

                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link js-scroll-trigger" href="#contact">Contact</a>--}}
                {{--</li>--}}
                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#reservation">Shopping</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link js-scroll-trigger" href="{{ route('createSubscription') }}#subscription">Abonnement</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#contact">Contact</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link js-scroll-trigger" href="{{ route('index') }}#services">Offres</a>--}}
                    {{--</li>--}}
                @else
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link js-scroll-trigger" href="{{ route('index') }}#services">Offres</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="#register-form" id="create">Créer un compte</a>
                    </li>
                @endif
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link js-scroll-trigger" href="#team">L'équipe</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link js-scroll-trigger" href="#about">A Propos</a>--}}
                {{--</li>--}}

            </ul>
            <ul class="user-ul">
                @if(Auth::user())
                    @php
                        $user = Auth::user();
                        $photo = $user->photo;
                    @endphp
                    <li>
                        <a class="" href="#" id="sort-down">
                            <img src="{{asset(\Illuminate\Support\Facades\Auth::user()->photo)}}" style="width: 40px; height: 40px; border-radius: 50px; object-fit: cover;" alt="">
                            &nbsp;
                            {{ Auth::user()->name }}
                            &nbsp;
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </li>
                    <ul id="user-options" visible="false">
                        @if(\Illuminate\Support\Facades\Auth::user()->role!="admin")
                        <li><a href="{{ route('extranet.editCustomer', [$user->id, $user->type]) }}#contact"><i class="fa fa-user" style="margin-top: -2px !important;"></i> Mon profil </a></li>
                        @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                <li class="header"><a href="{{ route('intranet.editUser', $user->id) }}"><i class="fa fa-user-circle"></i>Mon profil</a></li>
                            @endif
                        <li><a href="{{ route('logoutExtranet') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off" style="margin-top: -2px !important;"></i> Déconnexion </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                @else
                    <li>
                        <a class="" href="{{ route('index') }}#contact-form" id="login">Connexion</a>
                    </li>
                @endif
            </ul>

        </div>
    </div>

</nav>

@push('scripts')
    <script>
        $('#sort-down').click(function(){
            var option = $('#user-options')
            if(option.attr('visible') === 'false'){
                option.show()
                option.attr('visible', 'true')
            }else{
                option.hide()
                option.attr('visible', 'false')
            }
        })
    </script>
@endpush