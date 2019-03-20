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
        <form class="needs-validation" method="post" action="{{ route('serveis.store') }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zones as $zona)
                    <tr>
                        <td>{{ $zona->id }}</td>
                        <td>{{ $zona->nom }}</td>
                        <td><input type="radio" class="form-check-input" name="seleccio_zona" value="{{ $zona->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>Selecciona l'Empleat a assignar</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Cog 1</th>
                        <th scope="col">Cog 2</th>
                        <th scope="col">DNI</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
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
                        <td><input type="checkbox" class="form-check-input" name="seleccio_empleat"
                                value="{{ $treballador->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
    </div>
    <div class="col-md-6">
        <div class="col-md-12 px-4">
            <table class="table">
                <thead>
                    <h5>Selecciona el tipus de Servei</h5>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom Servei</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serveis as $servei)
                    <tr>
                        <td>{{ $servei->id }}</td>
                        <td>{{ $servei->nom }}</td>
                        <td><input type="radio" class="form-check-input" name="nom_servei" value="{{ $servei->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
            <br />
            <h5>Selecciona la data d'inici</h5>
            <input class="form-control" type="date" name="data_inici_assign">
            <br />
            <h5>Selecciona la data límit</h5>
            <input class="form-control" type="date" name="data_fi_assign">
        </div>
        <br />
        <br />
        <div class="float-md-right">
            <button class="btn btn-outline-success" type="submit" value="Crear assignació">Crear assignació</button>
            <button class="btn btn-outline-secondary" type="reset" value="Cancel·lar">Cancel·lar</button>
            <div />
            </form>

            @endsection