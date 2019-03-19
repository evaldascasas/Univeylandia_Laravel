@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<div class="container jumbotron mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="font-weight-bold text-center text-uppercase">reportar una incidència</h3>
        </div>
    </div>

    @if(session()->get('success'))
    <div class="uper">
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('incidencia') }}" class="align-items-center justify-content-center d-flex">
    @csrf
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea type="text" class="form-control" style="resize:none" name="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="priority">Prioritat</label>
                <select class="form-control form-control-sm" name="priority">
                @foreach ($prioritats as $prioritat)
                    <option value=" {{ $prioritat->id }}">{{ $prioritat->nom_prioritat }}</option>
                @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

</div>

@endsection

@section("footer")
@endsection