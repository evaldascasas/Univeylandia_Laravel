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
                        __('Verificació del compte') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('S\'ha enviat un altre correu de verificació.') }}
                        </div>
                        @endif

                        {{ __('Abans de continuar, revisa si ha arribat un enllaç de verificació al correu
                        electrònic.') }}
                        {{ __('Si no has rebut el correu') }}, <a href="{{ route('verification.resend') }}">{{ __('prem
                            aqui per tornar a enviar-ne un') }}</a>.
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>