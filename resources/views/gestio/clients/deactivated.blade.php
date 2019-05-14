@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Clients desactivats') }}</h1>
</div>

<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
        id="results_table" role="grid">
        <thead class="thead-light">
            <tr>
                <th>{{ __('Nom') }}</th>
                <th>{{ __('1r Cognom') }}</th>
                <th>{{ __('2n Cognom') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Data naixement') }}</th>
                <th>{{ __('Adreça') }}</th>
                <th>{{ __('Ciutat') }}</th>
                <th>{{ __('Provincia') }}</th>
                <th>{{ __('CP') }}</th>
                <th>{{ __('Tipus document') }}</th>
                <th>{{ __('Número document') }}</th>
                <th>{{ __('Sexe') }}</th>
                <th>{{ __('Telèfon') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->nom}}</td>
                <td>{{$user->cognom1}}</td>
                <td>{{$user->cognom2}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->data_naixement}}</td>
                <td>{{$user->adreca}}</td>
                <td>{{$user->ciutat}}</td>
                <td>{{$user->provincia}}</td>
                <td>{{$user->codi_postal}}</td>
                <td>{{$user->tipus_document}}</td>
                <td>{{$user->numero_document}}</td>
                <td>{{$user->sexe}}</td>
                <td>{{$user->telefon}}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                        <form action="{{ route('clients.reactivate', $user->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <button id="confirm_reactivation" class="btn btn-outline-success btn-sm" type="submit"
                                value="Reactivar">{{ __('Reactivar') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection