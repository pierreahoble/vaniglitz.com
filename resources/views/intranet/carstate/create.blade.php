@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un état</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.storeCarstate') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label >Etat</label>
                                <input type="text" class="form-control" name="name" placeholder="Entrez un état de véhicule">
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