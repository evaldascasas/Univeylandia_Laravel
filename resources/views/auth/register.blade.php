<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/icon.png">

    <title>Parc Atraccions Univeylandia</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('home') }}">
                        <img class="img-rounded img-responsive mb-4 mt-4" src="/img/univeylandia_logo_petit.png" alt="logo">
                    </a>
                </div>

                <div class="card">

                    <div class="card-header h4 font-weight-bold" style="background-color: transparent;">{{
                        __('Registre') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Nom') }}</label>

                                <div class="col-sm-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname1" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('1r Cognom')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input id="surname1" type="text" class="form-control{{ $errors->has('surname1') ? ' is-invalid' : '' }}"
                                        name="surname1" value="{{ old('surname1') }}" required>

                                    @if ($errors->has('surname1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname2" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('2n Cognom')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input id="surname2" type="text" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}"
                                        name="surname2" value="{{ old('surname2') }}">

                                    @if ($errors->has('surname2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Correu electrònic') }}</label>

                                <div class="col-sm-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Contrasenya')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birth-date" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Data de naixement') }}</label>

                                <div class="col-sm-6">
                                    <input id="birth-date" type="date" class="form-control{{ $errors->has('birth-date') ? ' is-invalid' : '' }}"
                                        name="birth-date" value="{{ old('birth-date') }}" required>

                                    @if ($errors->has('birth-date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth-date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Adreça') }}</label>

                                <div class="col-sm-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                        name="address" value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Ciutat') }}</label>

                                <div class="col-sm-6">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                        name="city" value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="province" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Provincia')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input id="province" type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}"
                                        name="province" value="{{ old('province') }}" required>

                                    @if ($errors->has('province'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postal-code" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Codi postal') }}</label>

                                <div class="col-sm-6">
                                    <input id="postal-code" type="text" class="form-control{{ $errors->has('postal-code') ? ' is-invalid' : '' }}"
                                        name="postal-code" value="{{ old('postal-code') }}" required>

                                    @if ($errors->has('postal-code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal-code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="document-type" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Tipus document identitat') }}</label>

                                <div class="col-sm-6">
                                    <select id="document-type" class="form-control" name="document-type">
                                        <option value="DNI">DNI</option>
                                        <option value="NIE">NIE</option>
                                        <option value="CIF">CIF</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="document-number" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Número document identitat') }}</label>

                                <div class="col-sm-6">
                                    <input id="document-number" type="text" class="form-control{{ $errors->has('document-number') ? ' is-invalid' : '' }}"
                                        name="document-number" value="{{ old('document-number') }}" onblur="nif(this.value)" required>

                                    @if ($errors->has('document-number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document-number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Sexe') }}</label>

                                <div class="col-sm-6">
                                    <select id="gender" class="form-control" name="gender">
                                        <option value="Dona">Dona</option>
                                        <option value="Home">Home</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone-number" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Número de telèfon') }}</label>

                                <div class="col-sm-6">
                                    <input id="telephone-number" type="text" class="form-control{{ $errors->has('telephone-number') ? ' is-invalid' : '' }}"
                                        name="telephone-number" value="{{ old('telephone-number') }}" required>

                                    @if ($errors->has('telephone-number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone-number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-6 offset-sm-4">
                                    <button type="submit" class="btn btn-success" onclick="regexDNI()">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
  function nif(dni) {
    numero = dni.substr(0,dni.length-1);
    let = dni.substr(dni.length-1,1);
    numero = numero % 23;
    letra='TRWAGMYFPDXBNJZSQVHLCKET';
    letra=letra.substring(numero,numero+1);
    if (letra!=let)
      alert('Dni erroneo');
  }

</script>
