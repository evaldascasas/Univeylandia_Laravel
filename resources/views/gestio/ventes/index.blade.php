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
    <h1 class="h2">Ventes</h1>
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
                <td>Usuari</td>
                <td>Email</td>
                <td>Número document</td>
                <td>Preu total</td>
                <td>Realització de la compra</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($ventes as $venta)
            @if ($venta->estat === 0)
            <tr style="color:lightgrey;">
                @else
            <tr>
                @endif
                <td>{{$venta->id}}</td>
                <td>{{$venta->nom}} {{$venta->cognom1}} {{$venta->cognom2}}</td>
                <td>{{$venta->email}}</td>
                <td>{{$venta->numero_document}}</td>
                <td>{{$venta->preu}}</td>
                <td>{{$venta->temps_compra}}</td>
                <td>
                  <a href="{{ route('ventes.edit',$venta->id)}}" class="btn btn-outline-primary btn-sm">Detalls</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection