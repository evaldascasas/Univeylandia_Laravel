@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Registrar Atracció</h2>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="needs-validation" method="post" action="{{ route('atraccions.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="nom">Nom de l'atracció</label>
                <input type="text" class="form-control form-control-sm" placeholder="Nom" name="nom" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="alturamin">Altura mínima</label>
                <input type="text" class="form-control form-control-sm" name="alturamin" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="alturamax">Altura màxima</label>
                <input type="text" class="form-control form-control-sm" name="alturamax" required>
            </div>
            <div class="col-md-12 mb-12">
                <div class="form-group">
                    <label for="descripcio">Descripció</label>
                    <textarea class="form-control form-control-sm" name="descripcio" id="descripcio_atraccio"></textarea>
                </div>
            </div>
            <div class="col-md-12 mb-12">
                <label for="datainauguracio">Data d'innauguració</label>
                <input type="date" class="form-control form-control-sm" name="datainauguracio" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="tipusatraccio">Tipus d'atracció</label>
                <div class="input-group">
                    <select class="form-control form-control-sm" name="tipusatraccio">
                        @foreach($tipusAtraccions as $tipus)
                        <option value="{{ $tipus->id }}">{{ $tipus->tipus }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="accessible">Accessibilitat</label>
                <div class="input-group">
                    <select class="form-control form-control-sm" name="accessible">
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="accesexpress">Accés Express</label>
                <div class="input-group">
                    <select class="form-control form-control-sm" name="accesexpress">
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Imatge</label>
                <input type="file" name="image" class="form-control form-control-sm">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Crear</button>
        <button class="btn btn-secondary" type="reset">Cancel·lar</button>
    </form>
</div>
</div>

@endsection