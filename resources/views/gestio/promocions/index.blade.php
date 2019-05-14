@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestionar Promocions</h1>
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
                <td>Imatge</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @forelse($promocions as $promocio)
            <tr>
                <td>{{$promocio->id}}</td>
                <td>{{$promocio->titol}}</td>
                <td>{!!html_entity_decode(str_limit($promocio->descripcio, $limit=20, $end = "..."))!!}</td>
                <td>{{$promocio->nom}} {{$promocio->cognom1}} {{$promocio->cognom2}}</td>
                <td>{{$promocio->numero_document}}</td>
                <td>
                    <i data-feather="image" data-toggle="modal" data-target="#exampleModal{{$promocio->id}}"></i>
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                        <a href="{{ route('promocions.edit',$promocio->id)}}"
                            class="btn btn-outline-primary btn-sm">Modificar</a>
                        <form action="{{ route('promocions.destroy',$promocio->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button id="confirm_delete" class="btn btn-outline-danger btn-sm"
                                type="submit">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @if (! is_null($promocio->path_img))
            <!-- MODAL FOTO -->
            <div class="modal fade" id="exampleModal{{$promocio->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body align-self-center">
                            <img src="{{ asset($promocio->path_img) }}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FI MODAL FOTO -->
            @else
            @endif

            @empty
            <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi ha promocions a
                llistar
            </p>
            @endforelse
        </tbody>
    </table>
</div>
<div style="display: table;margin: 0 auto;"> {{ $promocions->links() }} </div>
</div>

@endsection
