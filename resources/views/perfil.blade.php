@extends("layouts.plantilla")

@section("content")

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if(session()->get('error'))
<div class="alert alert-danger alert-important">
    {{ session()->get('error') }}
</div>
@endif

<div style="width: 70%;margin: 0 auto;margin-top: 20px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Tickets</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                aria-selected="false">Fotos</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <!-- PERFIL -->
            <div class="container px-5 py-5">
                <div class="row justify-content-center align-items-center">
                    <div class="card" style="width: 22rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nom: </strong>{{ Auth::user()->nom }}</li>
                            <li class="list-group-item"><strong>Cognoms: </strong>{{ Auth::user()->cognom1 }}
                                {{ Auth::user()->cognom2 }}</li>
                            <li class="list-group-item"><strong>Data naixement:
                                </strong>{{ Auth::user()->data_naixement }}</li>
                            <li class="list-group-item"><strong>Adreça: </strong>{{ Auth::user()->adreca }}</li>
                            <li class="list-group-item"><strong>Ciutat: </strong>{{ Auth::user()->ciutat }}</li>
                            <li class="list-group-item"><strong>Telèfon: </strong>{{ Auth::user()->telefon }}</li>
                        </ul>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn btn-primary btn-block" href="{{ route('perfil.edit') }}">Modificar</a>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{ route('perfil.destroy') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="confirm_delete" class="btn btn-secondary btn-block" type="submit"
                                            value="Esborrar compte">Esborrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PERFIL -->
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <!-- TICKETS -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tipus d'entrada</th>
                        <th scope="col">Número de viatges</th>
                        <th scope="col">Entrada</th>
                        <th scope="col">Data de compra</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $ticket)
                    <tr>
                        <th scope="row">{{$ticket->tipus_producte}}</th>
                        @if($ticket->viatges == 100)
                        <td>Indefinits</td>
                        @else
                        <td>{{$ticket->viatges}}</td>
                        @endif
                        <td style="width:20%;"><a href="#" data-toggle="modal"
                                data-target="#exampleModal{{$ticket->id}}"><img src="{{ asset($ticket->codi_qr) }}"
                                    style="width:20%"></a></td>
                        <!-- MODAL QR -->
                        <div class="modal fade" id="exampleModal{{$ticket->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{ asset($ticket->codi_qr) }}" style="display:block;margin:auto;">
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ action('PerfilController@imgDownload',$ticket->id)}}"
                                            class="btn btn-primary">Descarregar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FI MODAL QR -->
                        <td>{{$ticket->data_compra}}</td>
                    </tr>
                    @empty
                    <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No tens cap ticket actiu
                    </p>
                    @endforelse
                </tbody>
            </table>
            <!-- END TICKETS -->
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <!-- FOTOS -->
            <div class="row">
                @forelse($fotos as $image)
                <div class="col-lg-2 col-md-4 col-6 p-4">
                    <a href="#" data-toggle="modal" data-target="#modalFoto{{$image->id}}">
                        <img src="{{ asset($image->thumbnail) }}" class="img-fluid img-thumbnail">
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalFoto{{$image->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="modalFoto" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $image->nom_atraccio }} - {{ $image->created_at }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset($image->foto_path_aigua) }}" class="card-img">
                            </div>
                            <div class="modal-footer">
                                <a href="{{ action('PerfilController@imgDownload',$image->id)}}"
                                    class="btn btn-primary">Descarregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                No hi ha imatges.
                @endforelse
            </div>
            <!-- END FOTOS -->
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
$(document).on('click','#confirm_delete', function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    Swal.fire({
        title: 'Estàs segur?',
        text: "Aquesta acció no es pot revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
});
</script>
@endsection