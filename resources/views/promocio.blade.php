@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<a href="/promocions" style="text-decoration: none;color:black;"> <h1 class="font-weight-bold text-center text-uppercase" style="margin-top:30px;">promocions</h1> </a>
<div style="width:70%;margin:0 auto;margin-top: 20px;background-color: whitesmoke;border-radius: 5px;padding:10px;border: 2px solid lightgray;">
  <h1>{{$promocio->titol}}</h1>
  <hr>
  <p>{!!html_entity_decode($promocio->descripcio)!!} </p>
  <hr>
  @if($valid)
  <a href="{{ route('promocions.edit',$promocio->id)}}" class="btn btn-primary" style="">Editar promoció</a>
  @else
  @endif
</div>

@endsection
@section("footer")
@endsection
