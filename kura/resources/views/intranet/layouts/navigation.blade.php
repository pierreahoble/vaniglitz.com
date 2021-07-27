
@php
    $customersP = \App\Models\User::where('type', 'physical')->count();
    $customersM = \App\Models\User::where('type', 'moral')->count();
    $produitActif=\App\Models\Car::where('active','=',1)->where('available','=',1)->count();
    $produitNonActif=\App\Models\Car::where('active','=',0)->where('available','=',0)->count();
    $invoices=DB::table('invoices')->join('users','invoices.user_id','=','users.id')->count();
    $categorys = \App\Models\Category::all()->count();
    $carstates = \App\Models\Carstate::all()->count();
    $payement=\Illuminate\Support\Facades\DB::table('payments')
                 ->join('users','payments.id','=','users.id')
                 ->join('leasings','payments.leasing_id','=','leasings.id')->count();
    $Message=\App\Message::where('etat','=',0)->count();
@endphp
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">STATISTIQUES</li>
    <li>
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tableau de Bord</span>
        </a>
    </li>
    <li class="header">MENU</li>

    <li>
        <a href="{{ route('Admin') }}">
            <i class="fa fa-dollar"></i> <span>Admin</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-male"></i>
            <span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('intranet.indexCustomer', 'physical') }}">Client Physique <span class="badge badge-light">{{$customersP}}</span></a></li>
            <li><a href="{{ route('intranet.indexCustomer', 'moral') }}">Client Moral <span class="badge badge-light">{{$customersM}}</span></a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fab fa-product-hunt"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('intranet.createCar') }}">Ajouter un Article</a></li>
            <li><a href="{{ route('intranet.indexCar') }}">Articles Actifs <span class="badge badge-light">{{$produitActif}}</span></a></li>
            <li><a href="{{ route('intranet.indexCar2') }}">Articles Désactivés <span class="badge badge-light">{{$produitNonActif}}</span></a></li>
        </ul>
    </li>
    {{--<li>--}}
        {{--<a href="{{ route('intranet.indexLeasing') }}">--}}
            {{--<i class="fa fa-retweet"></i> <span>Locations</span>--}}
        {{--</a>--}}
    {{--</li>--}}

    {{--<li>--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-credit-card"></i> <span>Paiements</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li>
        <a href="{{ route('intranet.indexInvoice') }}">
            <i class="fa fa-dollar"></i> <span>Factures <span class="badge badge-light">{{$invoices}}</span></span>
        </a>
    </li>

    {{--<li>--}}
        {{--<a href="{{ route('intranet.indexUser') }}">--}}
            {{--<i class="fa fa-user"></i> <span>Utilisateurs</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cog "></i>
            <span>Configurations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('editShop') }}">Ma Boutique</a></li>
            <li><a href="{{ route('intranet.indexCategory') }}">Catégories <span class="badge badge-light">{{$categorys}}</span></a></li>
            <li><a href="{{ route('intranet.indexCarstate') }}">Etats <span class="badge badge-light">{{$carstates}}</span></a></li>
            <li><a href="{{ route('intranet.editRate') }}">Taux <span class="badge badge-light">1</span></a></li>
        </ul>
    </li>


    <li class="header">JOURNAL</li>
    <li><a href="{{route('intranet.FinalPayement')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Historique <span class="badge badge-light">{{$payement}}</span></span></a></li>
</ul>