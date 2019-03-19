@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Empleat: {{ $user->nom }} {{ $user->cognom1 }} {{ $user->congom2 }}</h1>
    </div>

    <form method="post">
        <h5>Dades Generals</h5>
        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control form-control-sm" name="nom" value="{{ $user->nom }}" disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cognom1">1er Cognom</label>
                <input type="text" class="form-control form-control-sm" name="cognom1" value="{{ $user->cognom1 }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cognom2">2n Cognom</label>
                <input type="text" class="form-control form-control-sm" name="cognom2" value="{{ $user->cognom2 }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control form-control-sm" name="email" value="{{ $user->email }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="data_naixement">Data naixement</label>
                <input type="date" class="form-control form-control-sm" name="data_naixement" value="{{ $user->data_naixement }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="adreca">Adreça</label>
                <input type="text" class="form-control form-control-sm" name="adreca" value="{{ $user->adreca }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="ciutat">Ciutat</label>
                <input type="text" class="form-control form-control-sm" name="ciutat" value="{{ $user->ciutat }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control form-control-sm" name="provincia" value="{{ $user->provincia }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="codi_postal">Codi postal</label>
                <input type="text" class="form-control form-control-sm" name="codi_postal" value="{{ $user->codi_postal }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="tipus_document">Tipus document</label>
                <input type="text" class="form-control form-control-sm" name="tipus_document" value="{{ $user->tipus_document }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="numero_document">Número document</label>
                <input type="text" class="form-control form-control-sm" name="numero_document" value="{{ $user->numero_document }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="sexe">Sexe</label>
                <input type="text" class="form-control form-control-sm" name="sexe" value="{{ $user->sexe }}" disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="telefon">Telèfon</label>
                <input type="text" class="form-control form-control-sm" name="telefon" value="{{ $user->telefon }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="id_rol">Rol</label>
                <input type="text" class="form-control form-control-sm" name="id_rol" value="{{ $rols[0]->nom_rol }}"
                    disabled>
            </div>
        </div>

        <h5>Dades Empleat</h5>
        <div class="form-group row">
            <div class="col-md-3 mb-9">
                <label for="codi_seg_social">Codi Seg. Social</label>
                <input type="text" class="form-control form-control-sm" name="codi_seg_social" value="{{ $dades->codi_seg_social }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="num_nomina">Número nòmina</label>
                <input type="text" class="form-control form-control-sm" id="num_nomina" name="num_nomina" value="{{ $dades->num_nomina }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="iban">IBAN</label>
                <input type="text" class="form-control form-control-sm" id="IBAN" name="IBAN" value="{{ $dades->IBAN }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="especialitat">Especialitat</label>
                <input type="text" class="form-control form-control-sm" id="especialitat" name="especialitat" value="{{ $dades->especialitat }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="carrec">Càrrec</label>
                <input type="text" class="form-control form-control-sm" id="carrec" name="carrec" value="{{ $dades->carrec }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="date_inici_contracte">Data inici contracte</label>
                <input type="date" class="form-control form-control-sm" name="data_inici_contracte" value="{{ $dades->data_inici_contracte }}"
                    disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="date_fi_contracte">Data fi contracte</label>
                <input type="date" class="form-control form-control-sm" name="data_fi_contracte" value="{{ $dades->data_fi_contracte }}"
                    disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="horari">Horari</label>
                <input type="text" class="form-control form-control-sm" name="id_horari" value="{{ $horaris[0]->torn }}"
                    disabled>
            </div>
        </div>
        <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Enrere</a>
    </form>

@endsection