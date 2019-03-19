@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<style>
    .uper {
        margin-top: 40px;
    }
</style>
@if(session()->get('success'))
<div class="uper">
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestionar notícies</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary" value="Exportar">
                <span data-feather="save"></span>
                Exportar PDF
            </button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
        id="results_table" role="grid">
        <thead class="thead-light">
            <tr>
                <td>#</td>
                <td>Titol</td>
                <td>Descripcio</td>
                <td>Usuari</td>
                <td>Document usuari</td>
                <td>Categoría</td>
                <td>Imatge</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @forelse($noticies as $noticia)
            <tr>
                <td>{{$noticia->id}}</td>
                <td>{{$noticia->titol}}</td>
                <td>{!!html_entity_decode(str_limit($noticia->descripcio, $limit=20, $end = "..."))!!}</td>
                <td>{{$noticia->nom}} {{$noticia->cognom1}} {{$noticia->cognom2}}</td>
                <td>{{$noticia->numero_document}}</td>
                <td>{{$noticia->categoria}}</td>
                <td>
                    <i data-feather="image" data-toggle="modal" data-target="#exampleModal{{$noticia->id}}"></i>
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                        <a href="{{ route('noticies.edit',$noticia->id)}}"
                            class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ route('noticies.destroy',$noticia->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button id="confirm_delete" class="btn btn-outline-danger btn-sm"
                                type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @if (! is_null($noticia->path_img))
            <!-- MODAL FOTO -->
            <div class="modal fade" id="exampleModal{{$noticia->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body align-self-center">
                            <img src="{{ asset($noticia->path_img) }}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FI MODAL FOTO -->
            @else
            @endif

            @empty
            <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi ha noticies a
                llistar
            </p>
            @endforelse
        </tbody>
    </table>
</div>
<div style="display: table;margin: 0 auto;"> {{ $noticies->links() }} </div>
</div>

@endsection