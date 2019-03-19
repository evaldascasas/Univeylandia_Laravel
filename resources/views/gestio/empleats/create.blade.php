@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Crear empleat</h2>
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

    <form method="post" action="{{ route('empleats.store') }}">
        @csrf
        <h5>Dades Generals</h5>
        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control form-control-sm" name="nom">
            </div>
            <div class="col-md-3 mb-3">
                <label for="cognom1">1er Cognom</label>
                <input type="text" class="form-control form-control-sm" name="cognom1">
            </div>
            <div class="col-md-3 mb-3">
                <label for="cognom2">2n Cognom</label>
                <input type="text" class="form-control form-control-sm" name="cognom2">
            </div>
            <div class="col-md-3 mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control form-control-sm" name="email">
            </div>
            <div class="col-md-3 mb-3">
                <label for="data_naixement">Data Naixement</label>
                <input type="date" class="form-control form-control-sm" name="data_naixement">
            </div>
            <div class="col-md-3 mb-3">
                <label for="adreca">Adreça</label>
                <input type="text" class="form-control form-control-sm" name="adreca">
            </div>
            <div class="col-md-3 mb-3">
                <label for="ciutat">Ciutat</label>
                <input type="text" class="form-control form-control-sm" name="ciutat">
            </div>
            <div class="col-md-3 mb-3">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control form-control-sm" name="provincia">
            </div>
            <div class="col-md-3 mb-3">
                <label for="codi_postal">Codi postal</label>
                <input type="text" class="form-control form-control-sm" name="codi_postal">
            </div>
            <div class="col-md-3 mb-3">
                <label for="tipus_document">Tipus document</label>
                <input type="text" class="form-control form-control-sm" name="tipus_document">
            </div>
            <div class="col-md-3 mb-3">
                <label for="numero_document">Número document</label>
                <input type="text" class="form-control form-control-sm" name="numero_document">
            </div>
            <div class="col-md-3 mb-3">
                <label for="sexe">Sexe</label>
                <select class="form-control form-control-sm" name="sexe">
                    <option value="Home">Home</option>
                    <option value="Dona">Dona</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="telefon">Telèfon</label>
                <input type="text" class="form-control form-control-sm" name="telefon">
            </div>
            <div class="col-md-3 mb-3">
                <label for="id_rol">Rol</label>
                <select class="form-control form-control-sm" name="id_rol">
                    @foreach($rols as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nom_rol }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <h5>Dades Empleat</h5>
        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="codi_seg_social">Codi Seg. Social</label>
                <input type="text" class="form-control form-control-sm" name="codi_seg_social">
            </div>
            <div class="col-md-3 mb-3">
                <label for="num_nomina">Número nòmina</label>
                <input type="text" class="form-control form-control-sm" id="num_nomina" name="num_nomina">
            </div>
            <div class="col-md-3 mb-3">
                <label for="iban">IBAN</label>
                <input type="text" class="form-control form-control-sm" id="IBAN" name="IBAN">
            </div>
            <div class="col-md-3 mb-3">
                <label for="especialitat">Especialitat</label>
                <input type="text" class="form-control form-control-sm" id="especialitat" name="especialitat">
            </div>
            <div class="col-md-3 mb-3">
                <label for="carrec">Càrrec</label>
                <input type="text" class="form-control form-control-sm" id="carrec" name="carrec">
            </div>
            <div class="col-md-3 mb-3">
                <label for="date_inici_contracte">Data inici contracte</label>
                <input type="date" class="form-control form-control-sm" name="data_inici_contracte">
            </div>
            <div class="col-md-3 mb-3">
                <label for="date_fi_contracte">Data fi contracte</label>
                <input type="date" class="form-control form-control-sm" name="data_fi_contracte">
            </div>
            <div class="col-md-3 mb-3">
                <label for="horari">Horari</label>
                <select class="form-control form-control-sm" name="id_horari">
                    @foreach($horaris as $horari)
                    <option value="{{ $horari->id }}">{{ $horari->torn }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-outline-success" type="submit" value="Crear">Crear</button>
        <button class="btn btn-outline-secondary" type="reset" value="Cencel·lar">Cancel·lar</button>
    </form>


@endsection