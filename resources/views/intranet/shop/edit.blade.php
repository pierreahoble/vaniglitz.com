@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paramètres de ma Boutique</h3>
                        @if($Success=Session::get('success'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                    </div>
                    <form role="form" action="{{ route('updateBoutique') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="row"><br>
                            <div class="col-md-6"> <div class="box-body">
                                    <br>
                                    <div class="form-group">
                                        <label>Nom Boutique</label>
                                        <input value="{{$boutique->nom}}" type="text" class="form-control" name="nom" placeholder="Entrez le nom de la Boutique">
                                    </div> <br>
                                    <div class="form-group">
                                        <input value="{{$boutique->logo}}" type="hidden" class="form-control" name="logo1">
                                        <label>Logo</label>
                                        <img src="{{asset($boutique->logo)}}" class="img-fluid" style="height: 120px">
                                        <input type="file" class="form-control" name="logo2" placeholder="Entrez votre taux de réduction">
                                    </div> <br>
                                    <div class="form-group">
                                        <label>Heure d'Ouverture ( Debut et Fermeture )</label>
                                        <input value="{{$boutique->heure}}" type="text" class="form-control" name="heure" placeholder="Entrez votre taux de caution">
                                    </div>
                                </div></div>
                            <div class="col-md-5">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Addresse</label>
                                        <textarea class="form-control" name="adresse" required>{{$boutique->adresse}}</textarea>
                                    </div><br>
                                    <div class="form-group">
                                        <label>Numero de Téléphone</label>
                                        <input value="{{$boutique->numero}}" type="text" class="form-control" name="numero" placeholder="Numéro de Téléphone">
                                    </div><br>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input value="{{$boutique->email}}" type="email" class="form-control" name="email" placeholder="E-mail">
                                    </div>
                                    <br>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div></div>
                                </div>
                            <div class="col-md-1"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection