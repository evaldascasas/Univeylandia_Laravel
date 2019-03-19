@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Registrar Assignacions de Serveis Atraccio-Empleat</h2>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="col-md-12 px-4">
            <h5>Selecciona la Zona a assignar</h5>
        </div>
        <form method="post" action="{{ route('serveis.update' , $assign->id) }}">
            @method('PATCH')
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zones as $zona)
                    <tr>
                        <td>{{ $zona->id }}</td>
                        <td>{{ $zona->nom }}</td>
                        @if($zona->id == $assign->id_zona)
                        <td><input type="radio" class="form-check-input" name="seleccio_zona" value="{{ $zona->id }}"
                                checked="checked"></td>
                        @else
                        <td><input type="radio" class="form-check-input" name="seleccio_zona" value="{{ $zona->id }}">
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
            <h5>Selecciona la data d'inici</h5>
            <input class="form-control" type="date" name="data_inici_assign" value="{{ $assign->data_inici }}">
            <br />
            <h5>Selecciona la data límit</h5>
            <input class="form-control" type="date" name="data_fi_assign" value="{{ $assign->data_fi }}">
            <br />
            <br />
            <table class="table">
                <thead>
                    <h5>Selecciona el tipus de Servei</h5>
                    <tr>
                        <th>#</th>
                        <th>Nom Servei</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serveis as $servei)
                    <tr>
                        <td>{{ $servei->id }}</td>
                        <td>{{ $servei->nom }}</td>
                        @if($servei->id == $assign->id_servei)
                        <td><input type="radio" class="form-check-input" name="nom_servei" value="{{ $servei->id }}"
                                checked="checked"></td>
                        @else
                        <td><input type="radio" class="form-check-input" name="nom_servei" value="{{ $servei->id }}">
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    <div class="col-md-6">
        <div class="col-md-12 px-4">
            <h5>Selecciona l'Empleat a assignar</h5>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Cog 1</th>
                    <th>Cog 2</th>
                    <th>DNI</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($treballadors as $treballador)
                <tr>
                    <td>{{ $treballador->id }}</td>
                    <td>{{ $treballador->nom }}</td>
                    <td>{{ $treballador->cognom1 }}</td>
                    <td>{{ $treballador->cognom2 }}</td>
                    <td>{{ $treballador->numero_document }}</td>
                    @if($treballador->id == $assign->id_empleat)
                    <td><input type="checkbox" class="form-check-input" name="seleccio_empleat"
                            value="{{ $treballador->id }}" checked="checked"></td>
                    @else
                    <td><input type="checkbox" class="form-check-input" name="seleccio_empleat"
                            value="{{ $treballador->id }}"></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-outline-primary" type="submit" value="Modificar assignació">Modificar Assignació</button>
        <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Cancel·lar</a>
        </form>


        @endsection