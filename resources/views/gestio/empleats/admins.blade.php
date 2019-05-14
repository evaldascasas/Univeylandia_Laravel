@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Administradors') }}</h1>
</div>

<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
        id="results_table" role="grid">
        <thead class="thead-light">
            <tr>
                <th>{{ __('Nom') }}</th>
                <th>{{ __('Cognom1') }}</th>
                <th>{{ __('Cognom2') }}</th>
                <th>{{ __('Num Document') }}</th>
                <th>{{ __('Codi SS') }}</th>
                <th>{{ __('Càrrec') }}</th>
                <th>{{ __('Horari') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->cognom1 }}</td>
                <td>{{ $user->cognom2 }}</td>
                <td>{{ $user->numero_document }}</td>
                <td>{{ $user->codi_seg_social }}</td>
                <td>{{ $user->carrec }}</td>
                <td>{{ $user->id_horari }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                        <a class="btn btn-outline-success btn-sm"
                            href="{{ route('empleats.show', $user->id) }}">{{ __('Mostrar') }}</a>
                        <a class="btn btn-outline-primary btn-sm"
                            href="{{ route('empleats.edit', $user->id) }}">{{ __('Modificar') }}</a>
                        <form action="{{ route('empleats.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button id="confirm_delete" class="btn btn-outline-danger btn-sm" type="submit"
                            value="Desactivar">{{ __('Desactivar') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection