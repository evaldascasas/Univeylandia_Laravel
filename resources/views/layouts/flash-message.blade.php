@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('error'))

<div class="alert alert-danger alert-important">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-important">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	<strong>{{ $message }}</strong>

</div>

@endif