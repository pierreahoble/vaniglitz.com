@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-sm-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Articles Désactivés</h3>
                        <div style="padding: 15px; float: right">
                            <a href="{{ route('intranet.createCar') }}"><button class="btn btn-primary">Ajouter un article</button></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Image</th>
                                <th>Catégorie</th>
                                <th>Etat</th>
                                <th>Montant</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{$car->name}}</td>
                                    <td align="center" width="15%"><a href="{{ asset($car->images) }}" target="_blank"><img src="{{asset($car->images)}}" alt="" style="width: 80px; border-radius: 10px"></a></td>
                                    <td>{{ $car->category ? $car->category->name : '' }}</td>
                                    <td>{{ $car->carstate->name }}</td>
                                    <td>{{number_format( $car->amount , 0, '', '.')}}<sup> FCFA</sup></td>
                                    <td>
                                        {{--                                        <a href="{{ route('intranet.createReservation', [$car->id, 'car'])  }}" onclick="return @if(!$car->available OR !$car->active) false @endif" class="toggle @if(!$car->available OR !$car->active)  disabled @endif"><i class="fa fa-bookmark" title="Reserver"></i></a>--}}
                                        <a href="{{ route('intranet.showCar', $car->id)  }}"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('intranet.editCar', $car->id) }}"><i class="fa fa-edit"></i></a>
                                        {{--                                        @if(!$car->busy()) <a href="{{ route('intranet.deleteCar', $car->id) }}" ><i class="fa fa-trash"></i></a> @endif--}}

                                        @if($car->active==1 || $car->available==1)
                                            <a  title="Désactiver le Produit" href="{{ route('intranet.deleteCar', $car->id)}}" ><img src="{{asset('public/storage/off.png')}}" style="height: 25px;"></a>
                                        @else
                                            <a  title="Activer le Produit"href="{{ route('intranet.deleteCar', $car->id) }}" ><img src="{{asset('public/storage/on.png')}}" style="height: 25px;"></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleActive(id, el){
        $.post('{{ route('intranet.toggleActiveCar') }}',{id: id, _token: "{{ csrf_token() }}"}, function(rsp){
            if(el.hasClass('green')) el.removeClass('green').addClass('red')
            else el.removeClass('red').addClass('green')
            var btn = el.parent().parent().children().eq(8).children('.toggle')
            if (btn.hasClass('disabled')) {
                btn.removeClass('disabled')
                btn.attr('onclick', 'return true')
            }
            else{
                btn.addClass('disabled')
            }
        })
    }
    function toggleAvailable(id, el){
        $.post('{{ route('intranet.toggleAvailableCar') }}',{id: id, _token: "{{ csrf_token() }}"}, function(rsp){
            if(el.hasClass('green')) el.removeClass('green').addClass('red')
            else el.removeClass('red').addClass('green')
            var btn = el.parent().parent().children().eq(8).children('.toggle')
            if (btn.hasClass('disabled')) {
                btn.removeClass('disabled')
                btn.attr('onclick', 'return true')
            }
            else{
                btn.addClass('disabled')
            }
        })
    }
</script>
@endpush