<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Parc Atraccions Univeylandia') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <!-- Datatables -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" defer></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styleGestio.css') }}" type="text/css">

  <!-- Icon -->
  <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/gif">

</head>
<body>
    @include("layouts.navbarIntranet")
    @yield("navbarIntranet")
    @include("layouts.menuIntranet")
    @yield("menuIntranet")
    <main role="main" class="col-md-10 ml-sm-auto px-4 mb-3">
    @yield("content")
    </main>

  <!-- Feather icons & Datatables -->
  <script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
