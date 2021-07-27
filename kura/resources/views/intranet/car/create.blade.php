@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <form role="form" action="{{ route('intranet.storeCar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border"><br>
                        <h3 class="box-title">Ajouter un article</h3>
                        @if($Success=Session::get('success'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                    </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="name" placeholder="Entrez le nom de l'article" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Catégorie</label>
                                <br>
                                <select name="category_id" id="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Etat</label>
                                <br>
                                <select name="carstate_id" id="">
                                    @foreach($carstates as $carstate)
                                        <option value="{{ $carstate->id }}">{{ $carstate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Couleur</label>
                                <input type="text" class="form-control" name="color" >
                            </div>
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="amount" placeholder="Entrez le montant" required>
                            </div>
                            <div class="form-group">
                                <label>Quantité</label>
                                <input type="number" min="1" value="1" class="form-control" name="quantity" placeholder="Entrez la quantité en stock" required>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Description</label><br>
                    <textarea name="description" id="" style="width: 100%; height: 200px"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Disponible</label>
                    <br>
                    <input type="radio" name="available" value="1" checked> Oui
                    <input type="radio" name="available" value="0"> Non
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Actif</label>
                    <br>
                    <input type="radio"  name="active" value="1" checked> Oui
                    <input type="radio"  name="active" value="0"> Non
                </div>
                <div class="form-group">
                    <label >Images</label>
                    <input type="file" name="images" required>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="reset" class="btn btn-success">Annuler</button>
                </div>
            </div>
        </div>
        </form>
    </section>
@endsection