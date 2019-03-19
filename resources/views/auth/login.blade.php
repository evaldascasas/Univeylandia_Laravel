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
            <div class="col-sm-4">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('home') }}">
                        <img class="img-rounded img-responsive mb-4 mt-4" src="/img/univeylandia_logo_petit.png" alt="logo">
                    </a>
                </div>

                <div class="card">

                    <div class="card-header h4 font-weight-bold" style="background-color: transparent;">{{ __('Iniciar
                        sessió') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="font-weight-bold" for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="font-weight-bold mr-4" for="password">{{ __('Contrasenya') }}</label>

                                    @if (Route::has('password.request'))
                                    <a class="btn-link text-right small" href="{{ route('password.request') }}">
                                        {{ __('Has oblidat la contrasenya?') }}
                                    </a>
                                    @endif

                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recorda\'m') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block">
                                        {{ __('Iniciar sessió') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <p class="text-center small">Ets nou a Univeylandia Parc?</p>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-block">
                                        {{ __('Crea\'t un compte') }}
                                    </a>
                                    @endif

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