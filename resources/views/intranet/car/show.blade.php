@extends('intranet.layouts.app')

@section('content')
    <div class="col-md-12" style="padding: 30px">
        <!-- Widget: car widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ url(env('STORAGE_PATH').'white_back.jpg') }}'); height: 200px">
                <div style="display: flex; justify-content: space-between">
                    <div style="display: inline-block">
                        <h3 class="widget-user-username">{{ $car->name }}</h3>
                        <h5 class="widget-car-desc">{{ $car->category->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="widget-user-image" style="left: 43% !important">
                @php
                    foreach ($car->carfiles as $carfile){
                        $imageName = $carfile->name;
                        break;
                    }
                @endphp
                <a href="{{ asset($car->images) }}" target="_blank">
                    <img style="border: none; width: 200px; height: 200px; margin-top: 38px; object-fit: cover; border-radius: 50em" src="{{ asset($car->images) }}" alt="User Avatar">
                </a>
            </div>
            <div class="box-footer">
                <div class="row" style="margin-top: 50px">
                    <div class="col-sm-5" style="display: flex; justify-content: space-between">
                        <div><br><br>
                            <table class="description-table" style="font-size: 18px">
                                <tr>
                                    <td colspan="2"><h3>Détails de l'Article: <b>{{$car->name}}</b></h3></td>
                                </tr>
                                <tr>
                                    <td>Catégorie</td>
                                    <td><b>{{ $car->category->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Quantité</td>
                                    <td><b>{{ $car->quantity }}</b></td>
                                </tr>
                                <tr>
                                    <td>Etat</td>
                                    <td><b>{{ $car->carstate->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Couleur</td>
                                    <td><b>{{ $car->color }}</b></td>
                                </tr>
                                <tr>
                                    <td>Disponible</td>
                                    <td><i class="fa fa-circle {{ $car->available ? 'green' : 'red' }}"></i></td>
                                </tr>
                                <tr>
                                    <td>Actif</td>
                                    <td><i class="fa fa-circle {{ $car->active ? 'green' : 'red' }}"></i></td>
                                </tr>
                            </table>

                            <div><br>
                                <a href="{{ route('intranet.indexCar') }}">
                                    <button class="btn btn-success"><i class="fa fa-caret-left"></i> &nbsp; Retourner à la liste</button>
                                </a>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Plus d'Image(s) de {{$car->name}}</a>
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header" style="background-color: #1b4b72;color:white;">
                                                <h4 class="modal-title">Formulaire d'Ajout d'Une Image du Produit {{ $car->name }}</h4>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="post" action="{{route('intranet.AjouterImage+',$car->id)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="image" class="form-control" required><br>
                                                    <input type="submit" value="Ajouter" class="btn btn-warning">
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                    <br>
                    <div class="col-sm-7">
                        <h3 style="margin-left: 10px; fon-weight: bold"><u>Image(s) de l'Article {{ $car->name }}</u></h3>
                        <br>
                        @foreach($photo as $p)
                            <div class="col-sm-3">
                                <a href="{{ asset($p->image) }}" target="_blank">
                                    <img src="{{asset($p->image)  }}" style="padding:15px;height: 150px; border-radius: 10px; object-fit: cover;" />
                                </a><br><br>
                             <a href="{{route('intranet.EnleverImage',$p->id)}}" style="margin-left: 70px"><small class="btn btn-primary">Enlever</small></a>
                            </div>
                            @if($loop->iteration == 4)
                                <br><br><br>
                            @endif
                        @endforeach
                    </div>

                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-car -->
    </div>
@endsection