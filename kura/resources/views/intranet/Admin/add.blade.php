@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un Admin</h3>
                        @if($Success=Session::get('info'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                    </div>
                    <form role="form" action="{{route('EnregistrementAdmin')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label >Photo</label>
                                             <input type="file" name="photo">
                                         </div>
                                         <div class="form-group">
                                             <label>Nom & Prénoms</label>
                                             <input type="text" class="form-control" name="name" placeholder="Entrez votre nom et prénoms" required>
                                         </div>
                                         <div class="form-group">
                                             <label>Téléphone</label>
                                             <input type="text" class="form-control" name="telephone" placeholder="Entrez votre numero de téléphone" required>
                                         </div>
                                         <div class="form-group">
                                             <label>Numero CNI</label>
                                             <input type="text" class="form-control" name="cni" placeholder="Entrez votre numero de CNI" required>
                                         </div>
                                         <div class="form-group">
                                             <label>Email</label>
                                             <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
                                         </div></div>
                                     <div class="col-md-6">   <div class="form-group">
                                             <label>Mot de passe</label>
                                             <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
                                         </div>
                                         <div class="form-group">
                                             <label>Confirmation de Mot de passe</label>
                                             <input type="text" class="form-control" name="password2" id="confirm" placeholder="Confirmez votre mot de passe" required>
                                             <br>
                                         </div>
                                         <div class="form-group">
                                             <label>Adresse</label>
                                             <br>
                                             <textarea name="address" required></textarea>
                                         </div>
                                         <div class="form-group">
                                             <label>Actif</label>
                                             <br>
                                             <input type="radio" name="active" value="1" checked> Oui
                                             <input type="radio" name="active" value="0"> Non
                                         </div>
                                         <div class="box-footer">
                                             <button type="submit" class="btn btn-primary">Enregistrer</button>
                                         </div></div>
                                 </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection