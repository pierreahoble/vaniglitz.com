<!-- Header -->
<style>
    .search-intro{
        font-family: Montserrat;
    }
    .search-intro input, select{
        height: 70px;
        width: 280px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        margin: 10px;
    }
    .search-intro .input-bloc{
        position: relative;
        display: inline-block;
        /*width: 300px*/
    }
    .search-intro .input-bloc i{
        color: #999;
        position: absolute;
        left: 20px;
        top: 20px
    }
    .intro-lead-in{
        font-family: Roboto !important;
        font-style: normal !important;
    }
</style>
<header class="masthead"
        style="
        background-image: url('{{asset('storage/shopping.jpg')}}')!important;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-position: center center;
        background-size: cover;
        "
><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    {{--<div class="container">--}}
        {{--<div class="intro-text">--}}
            {{--<div class="intro-lead-in">A partir de <b>{{ $minAmount }} FCFA</b> seulement</div>--}}
            {{--<div class="intro-heading text-uppercase" style="color: #2caadd;">LE PARTENAIRE DE VOTRE MOBILITÉ</div>--}}
            {{--<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">En savoir plus</a>--}}
        {{--</div>--}}
        {{--<div>--}}

        {{--</div>--}}
    {{--</div>--}}

    @php
        $categories = \App\Models\Category::OrderBy('name','asc')->get();
    @endphp

    <div style="background: rgb(0, 0, 0, 0.4)">

            <div class="intro-text">
                  @if($Success=Session::get('cool'))
                   <center> <div class="alert alert-success" style="color: black;width: 590px"><b>{{$Success}}</b></div></center>
                  @endif
                <div class="intro-lead-in" style="color: #fff">Shopping à partir de <b style="font-weight: bolder; font-size: 1.3em">{{number_format($minAmount, 0, '', '.')}} <sup> FCFA</sup></b> seulement</div>
                <i class="fas fa-search" style="font-size: 4em;"></i>
                <br><br>
                {{--<form action="searchcar#portfolio" method="post" class="search-intro">--}}
                    <form action="{{route('searchProduit')}}#portfolio" method="post" class="search-intro">
                    @csrf
                    <div class="input-bloc">
                        <input type="text" placeholder="Nom de l'article" name="name">
                    </div>

                    <div class="input-bloc">
                        <i style="font-style: normal; font-weight: bold"><sup style="color: #1b4b72;">Catégorie des Articles</sup></i>
                        <select name="category_id" id="">
                            <option value="">Cliquez pour Choisir</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-bloc">
                        <i style="font-style: normal; font-weight: bold"><sup style="color: #1b4b72;">Montant mininum en FCFA</sup></i>
                        <input type="number" min="{{$minAmount}}" max="0" value="{{$minAmount}}" name="amount_min">
                    </div>

                    <div class="input-bloc">
                        <i style="font-style: normal; font-weight: bold"><sup style="color: #bd2130;">Montant Maximum en FCFA</sup></i>
                        <input type="number" min="{{$minAmount}}" max="0" value="0" name="amount_max">
                    </div>

                    <br><br><br>

                    <button class="btn btn-warning btn-xl text-uppercase " type="submit">RECHERCHER</button>
                </form>
            </div>
            <div>

            </div>
        </div>


</header>