@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

@if(session()->get('success'))
<div class="uper">
    <div class="alert alert-success" style="text-align:center;">
        {{ session()->get('success') }}
    </div>
</div>
@endif

@if(session()->get('error'))
<div class="uper">
    <div class="alert alert-danger" style="text-align:center;">
        {{ session()->get('error') }}
    </div>
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
<link rel="stylesheet" href="css/styles.css" />
<div class="container" id="app">
    <h2 class="title has-text-centered dividing-header">Votacions a la millor atracció!</h2>

    <div class="section">

        <article v-for="submission in sortedSubmissions" :key="submission.id" class="media"
            :class="{ 'blue-border': submission.votes >= 20 }">
            <form method="POST" style="width: 100%;">
                {{ csrf_field() }}
                <submission-component :submission="submission" :submissions="sortedSubmissions">
                </submission-component>
            </form>
        </article>

    </div>

</div>

<script src="https://unpkg.com/vue"></script>
<script>
    window.Seed = (function () {
        const submissions = {!!$atraccions!!};

    return { submissions: submissions };
  }());

</script>
<script src="{{asset('js/main.js')}}"></script>

@endsection

@section("footer")
@endsection