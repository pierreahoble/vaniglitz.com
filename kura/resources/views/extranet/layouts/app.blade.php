<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     @php
       $titre=\App\Boutique::find(1);
     @endphp
    <title>Shop | {{$titre->nom}}</title>

    <!-- Bootstrap core CSS -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <link href="{{ asset('site/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->

    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />


    <!-- Custom fonts for this template -->
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">--}}

    {{--    <link href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">--}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('site/css/agency.min.css') }}" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet" />
    <link href="/css/smart_wizard_theme_circles.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ url(env('STORAGE_PATH').'logo_easy.png') }}" rel="shortcut icon" type="image/x-icon" />

    <!-- DatePicker CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css.map" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:100&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4695030ed8.js" crossorigin="anonymous"></script>

    <style>
        #map {
            height: 100%;
        }
        .car-description{
            padding: 10px;
            font-family: Montserrat;
            font-size: 13px;
            display: inline-block;
        }
        .car-description td{
            padding: 5px 10px;
            text-align: left;
        }
        .modal-btn{
            color: #fff;
            margin: 10px;
            width: 249px
        }
        .modal-btn:hover{
            opacity: 0.8;
            color: #fff
        }
        .user-ul li{
            font-family: Montserrat;
            list-style-type: none;
            margin-top: 16px;
        }
        .user-ul li a:hover{
            text-decoration: none;
        }
        .user-ul li i{
            margin-top: -10px;
            vertical-align: middle;
        }
        #contact form{

        }
        #contact form label{
            color: #ddd;
            font-family: Roboto;
        }
        #user-options{
            margin-bottom: -81px;
            margin-left: -44px;
            display: none;
        }
        #user-options li a{
            color: #fff
        }
        #user-options li a:hover{
            color: #ec6118
        }
        #show-register{
            margin-left: 18px
        }
        #show-register:hover{
            text-decoration: none;
        }
        #datatable{
            font-family: Montserrat;
            font-size: 14px
        }
        .box-primary{
            font-family: Montserrat;
        }
        table td .fa-cc-paypal{
            color: blue;
            font-size: 30px
        }
        table td .fa-arrow-circle-down{
            color: green;
            font-size: 30px
        }
        table td .fa-cc-visa{
            color:  black;
            font-size: 30px
        }
        table td .fa-file-invoice{
            color:  #bbb;
            font-size: 30px
        }
        footer{
            font-size: 12px !important;
            color: #aaa
        }
        form label{
            color: #ddd !important;
            font-weight: bold
        }
        #condition{
            font-family: Roboto !important;
            font-weight: bold;
        }
        #services .text-muted{
            font-weight: bold;
        }
        .portfolio-link{
            position: relative;
        }
        .item-check{
            position: absolute;
            width: 30px;
            height: 30px;
            background: #ec6118;
            color: #fff;
            align-content: center;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px 0 5px;
        }
        input[type="checkbox"], .custom-checkbox, .custom-control-input, .custom-control-label{
            cursor: pointer !important;
        }
        .carousel-indicators{
            bottom: 0px;
        }
        .carousel-indicators li{
            background: #ddd !important;
            border-top: 0;
            border-bottom: 0;
            opacity: 1;
        }
        .carousel-indicators .active{
            background: #ec6118 !important;
        }

    </style>

</head>

<body id="page-top">
    @php
        $cars = \App\Models\Car::all();
        $minAmount = 0;
        $i = 0;
        foreach ($cars as $car){
            if($i == 0){
                $minAmount = $car->amount;
            }
            if($car->amount < $minAmount){
                $minAmount = $car->amount;
            }
            $i++;
        }
    @endphp

    @include('extranet.layouts.navigation')

    @include('extranet.layouts.header')

    @include('modals')

    @yield('content')

    @include('extranet.layouts.footer')

    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_-49BCuIO4mIwGzoj_cF30D-9i8hZzjI&callback=initMap" async defer></script>

<!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('site/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DatePicker JS -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js.map"></script>--}}

<script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('site/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Contact form JavaScript -->
<script src="{{ asset('site/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('site/js/contact_me.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('site/js/agency.min.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        language: 'fr',
        time: true,
        minDate : new Date(),
        days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
        months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        today: "Aujourd'hui",
        monthsTitle: "Mois",
        clear: "Effacer",
        weekStart: 1
    });

    $('.picker').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY à HH:mm',
        time: true,
        minDate : new Date(),
        lang: "fr",
        days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
        months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        today: "Aujourd'hui",
        monthsTitle: "Mois",
        clear: "Effacer",
        weekStart: 1
    });


    $('#confirm2').keyup(function () {
        var password = $('#password2')
        var confirm = $(this)
        var message = $('#message2')
        var submit = $('.btn-primary')
        if(confirm.val() !== password.val()){
            message.html('La confirmation ne correspond pas au mot de passe').css("color", "pink")
            submit.attr('disabled', 'disabled')
        }else{
            message.html('Confirmation correcte').css("color", "#6bf442")
            submit.removeAttr('disabled')
        }
    })


    $('#delivery').prop('indeterminate', true)

    $('#delivery').change(function () {
        if($(this).prop('checked') == true){
            $('#map-bloc').show()
        }else{
            $('#map-bloc').hide()
        }
    })

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

    @include('extranet.modals')

@stack('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $('.count').prop('disabled', true);
            $(document).on('click','.plus',function(){
                $('.count').val(parseInt($('.count').val()) + 1 );
            });
            $(document).on('click','.minus',function(){
                $('.count').val(parseInt($('.count').val()) - 1 );
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
    </script>

    <script src="{{asset('js/jquery.input-counter.min.js')}}"></script>
    <script>
        var options = {
            selectors: {
                addButtonSelector: '.btn-add',
                subtractButtonSelector: '.btn-subtract',
                inputSelector: '.counter',
            },
            settings: {
                checkValue: true,
                isReadOnly: true,
            },
        };

        $(".input-counter").inputCounter(options);
    </script>
</body>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>

</html>
