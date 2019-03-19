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
                    <div class="card-header h4 font-weight-bold" style="background-color: transparent;">{{ __('Ajuda de
                        contrasenya') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __('S\'ha enviat un correu amb l\'enllaç de reinici de contrasenya.') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="font-weight-bold" for="email">{{ __('Email') }}</label>

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
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block">
                                        {{ __('Continuar') }}
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