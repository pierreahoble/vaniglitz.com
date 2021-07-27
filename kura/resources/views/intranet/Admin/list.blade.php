@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-sm-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Admin</h3>
                        @if($Success=Session::get('info'))
                            <div class="alert alert-success">{{$Success}}</div>
                        @endif
                        <div style="padding: 15px; float: right">
                            <a href="{{ route('AjouterAdmin') }}"><button class="btn btn-primary">Ajouter un Admin</button></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Profil</th>
                                <th>Nom</th>
                                <th>E-mail</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Opérations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin as $a)
                                @if($a->email!="admin@spark.org")
                                     <tr>
                                         <td><img src="{{asset($a->photo)}}" class="img-fluid" style="height: 60px;border-radius:20px"></td>
                                         <td>{{$a->name}}</td>
                                         <td>{{$a->email}}</td>
                                         <td>{{$a->telephone}}</td>
                                         <td>{{$a->address}}</td>
                                         <td>
                                             <a data-toggle="modal" data-target="#exampleModal{{$a->id}}" title="Modification de l'admin"><img src="{{asset('public/storage/update.png')}}" style="height: 30px"></a>
                                             <a href="{{route('SupprimerAdmin',Crypt::encrypt($a->id))}}" title="Supprimer {{$a->name}}"><img src="{{asset('public/storage/delete.png')}}" style="height: 30px"></a>
                                         </td>
                                     </tr>
                                     <div class="modal fade" id="exampleModal{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Modification de l'Admin</h5>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form role="form" action="{{route('ModifAdmin',Crypt::encrypt($a->id))}}" method="POST" enctype="multipart/form-data">
                                                         {{ csrf_field() }}
                                                         <div class="box-body">
                                                             <div class="row">
                                                                 <div class="col-md-6">

                                                                     <div class="form-group">
                                                                         <label>Nom & Prénoms</label>
                                                                         <input value="{{$a->name}}" type="text" class="form-control" name="name" placeholder="Entrez votre nom et prénoms" required>
                                                                     </div>
                                                                     <div class="form-group">
                                                                         <label>Téléphone</label>
                                                                         <input value="{{$a->telephone}}" type="text" class="form-control" name="telephone" placeholder="Entrez votre numero de téléphone" required>
                                                                     </div>
                                                                     <div class="form-group">
                                                                         <label>Numero CNI</label>
                                                                         <input value="{{$a->cni}}" type="text" class="form-control" name="cni" placeholder="Entrez votre numero de CNI" required>
                                                                     </div>
                                                                     <div class="form-group">
                                                                         <label>Email</label>
                                                                         <input value="{{$a->email}}" type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
                                                                     </div></div>
                                                                 <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label >Photo</label>
                                                                         <img src="{{asset($a->photo)}}" class="img-fluid" style="height: 60px;border-radius:20px">
                                                                         <input type="text" value="{{$a->photo}}" hidden name="photoO">
                                                                         <input type="file" name="photo">
                                                                     </div>
                                                                     <div class="form-group">
                                                                         <label>Adresse</label>
                                                                         <br>
                                                                         <textarea name="address" required>{{$a->address}}</textarea>
                                                                     </div>
                                                                     <div class="form-group">
                                                                         <label>Actif</label>
                                                                         <br>
                                                                         @if($a->active==1)
                                                                             <input type="radio" name="active" value="1" checked> Oui
                                                                             <input type="radio" name="active" value="0"> Non
                                                                         @else
                                                                             <input type="radio" name="active" value="1"> Oui
                                                                             <input type="radio" name="active" value="0" checked> Non
                                                                         @endif
                                                                     </div>
                                                                     <div class="box-footer">
                                                                         <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                     </div></div>
                                                             </div>


                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 @endif
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