@extends("layouts.plantilla")

@section("content")

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if(session()->get('error'))
<div class="alert alert-danger alert-important">
    {{ session()->get('error') }}
</div>
@endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mb-4 mt-4">

                <div class="card">

                    <div class="card-header h4 font-weight-bold" style="background-color: transparent;">{{
                        __('Canviar contrasenya') }}</div>

                    <div class="card-body">

                        <form action="{{ route('perfil.updatePassword') }}" method="post">
                            @csrf
                            @METHOD('PATCH')
                            <div class="form-group row">
                                <label for="password_old" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Contrasenya Anterior')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input  type="password" class="form-control{{ $errors->has('password_old') ? ' is-invalid' : '' }}"
                                        name="password_old" placeholder="Introdueix la contrasenya actual" required>

                                    @if ($errors->has('password_old'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_old') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Contrasenya Nova')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="Mínim de 6 caràcters" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Confirmar contrasenya') }}</label>

                                <div class="col-sm-6">
                                    <input  type="password" class="form-control" name="password_confirmation"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success btn-block">
                                        {{ __('Modificar') }}
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route('perfil') }}" class="btn btn-secondary btn-block">
                                        {{ __('Cancel·lar') }}
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection