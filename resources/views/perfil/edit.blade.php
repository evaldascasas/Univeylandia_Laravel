@extends("layouts.plantilla")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mb-4 mt-4">

            <div class="card">

                <div class="card-header h4 font-weight-bold" style="background-color: transparent;">{{
                        __('Modificar perfil') }}</div>

                <div class="card-body">

                    <form action="{{ route('perfil.update', Auth::user()->id)}}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Nom') }}</label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}"
                                    name="nom" value="{{ Auth::user()->nom }}" required autofocus>

                                @if ($errors->has('nom'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cognom1" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('1r Cognom')
                                    }}</label>

                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control{{ $errors->has('cognom1') ? ' is-invalid' : '' }}"
                                    name="cognom1" value="{{ Auth::user()->cognom1 }}" required>

                                @if ($errors->has('cognom1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cognom1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cognom2" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('2n Cognom')
                                    }}</label>

                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control{{ $errors->has('cognom2') ? ' is-invalid' : '' }}"
                                    name="cognom2" value="{{ Auth::user()->cognom2 }}">

                                @if ($errors->has('cognom2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cognom2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adreca" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Adreça') }}</label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control{{ $errors->has('adreca') ? ' is-invalid' : '' }}"
                                    name="adreca" value="{{ Auth::user()->adreca }}" required>

                                @if ($errors->has('adreca'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('adreca') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciutat" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Ciutat') }}</label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control{{ $errors->has('ciutat') ? ' is-invalid' : '' }}"
                                    name="ciutat" value="{{ Auth::user()->ciutat }}" required>

                                @if ($errors->has('ciutat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ciutat') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provincia" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Provincia')
                                    }}</label>

                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }}"
                                    name="provincia" value="{{Auth::user()->provincia }}" required>

                                @if ($errors->has('provincia'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('provincia') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codi_postal" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Codi postal') }}</label>

                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control{{ $errors->has('codi_postal') ? ' is-invalid' : '' }}"
                                    name="codi_postal" value="{{ Auth::user()->codi_postal }}" required>

                                @if ($errors->has('codi_postal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('codi_postal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefon" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Número de telèfon') }}</label>

                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control{{ $errors->has('telefon') ? ' is-invalid' : '' }}"
                                    name="telefon" value="{{ Auth::user()->telefon }}" required>

                                @if ($errors->has('telefon'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success btn-block mb-1">
                                    {{ __('Modificar') }}
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-secondary btn-block mb-1"
                                href="{{ route('perfil') }}">{{ __('Cancel·lar') }}</a>
                                <a class="btn btn-primary btn-block mb-1"
                                href="{{ route('perfil.password') }}">{{ __('Modificar contrasenya') }}</a>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
