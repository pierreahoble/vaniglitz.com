@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paramètres des Factures</h3>
                        @if($Success=Session::get('success'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                    </div>
                    <form role="form" action="{{ route('intranet.updateRate') }}" method="POST">
                        {{ csrf_field() }}
                        {!! method_field('PUT') !!}
                        <div class="box-body">
                           <br>
                            <div class="form-group">
                                <label>TVA</label>
                                <input step="any" value="{{ $rate->tva }}" type="number" class="form-control" name="tva" placeholder="Entrez votre TVA" style="width: 200px">
                            </div> <br>
                           {{-- <div class="form-group">
                                <label>Montant de Réduction</label>
                                <input value="{{ $rate->reduction_rate }}" type="number" class="form-control" name="reduction_rate" placeholder="Entrez votre taux de réduction">
                            </div> <br>--}}
                            <div class="form-group">
                                <label>Tarif de Livraison</label>
                                <input value="{{ $rate->bail_rate }}" type="text" class="form-control" name="bail_rate" placeholder="Entrez votre taux de caution">
                            </div>
                            <br>
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