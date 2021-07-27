@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier un article</h3>
                        @if($Success=Session::get('success'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                    </div>
                    <form role="form" action="{{ route('intranet.updateCar', $car->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="col-md-6">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}

                            <div class="form-group">
                                <label>Nom</label>
                                <input value="{{ $car->name }}" type="text" class="form-control" name="name" placeholder="Entrez le nom de l'article" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Catégorie</label>
                                <br>
                                <select name="category_id" id="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $car->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Etat</label>
                                <br>
                                <select name="carstate_id" id="">
                                    @foreach($carstates as $carstate)
                                        <option value="{{ $carstate->id }}" {{ $carstate->id == $car->carstate_id ? 'selected' : '' }}>{{ $carstate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Couleur</label>
                                <input type="text" value="{{ $car->color }}" class="form-control" name="color" placeholder="Entrez la couleur" required>
                            </div>
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" value="{{ $car->amount }}" class="form-control" name="amount" placeholder="Entrez le montant(FCFA)" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Disponible</label>
                                <br>
                                <input type="radio" name="available" value="1" {{ $car->available ? 'checked' : '' }}> Oui
                                <input type="radio" name="available" value="0" {{ !$car->available ? 'checked' : '' }}> Non
                            </div>
                            <div class="form-group">
                                <label>Quantité</label>
                                <input type="text" value="{{ $car->quantity }}" class="form-control" name="quantity" placeholder="Entrez la quantité en stock" required>
                            </div>


                        </div>

   <div class="col-md-6">
       <div class="form-group">
           <label >Images Actuel</label><br>
           <img src="{{asset($car->images)}}" class="img-flui" style="height: 100px;border-radius: 10px"><br>
           Changé L'Image de l'Article: <input type="file" name="images" class="form-control">
           <input type="hidden" value="{{$car->images}}" name="image" class="form-control">
       </div>

       <div class="form-group">
           <label>Description</label><br>
           <textarea name="description" id="" style="width: 100%; height: 100px">{{ $car->description }}</textarea>
       </div>
       <div class="form-group">
           <label>Dégâts existants</label><br>
           <textarea name="damage" id="" style="width: 100%; height: 100px">{{ $car->damage }}</textarea>
       </div>


       <div class="form-group">
           <label for="exampleInputPassword1">Actif</label>
           <br>
           <input type="radio" name="active" value="1" {{ $car->active ? 'checked' : '' }}> Oui
           <input type="radio" name="active" value="0" {{ !$car->active ? 'checked' : '' }}> Non
       </div>
       <div class="box-footer">
           <button type="submit" class="btn btn-primary">Enregistrer</button>
       </div>
   </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection