@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<a href="/noticies" style="text-decoration: none;color:black;"> <h1 class="font-weight-bold text-center text-uppercase" style="margin-top:30px;">noticies</h1> </a>
<div style="width:70%;margin:0 auto;margin-top: 20px;background-color: whitesmoke;border-radius: 5px;padding:10px;border: 2px solid lightgray;">
  <h1>{{$noticia->titol}}</h1>
  <a href="/noticies?catId={{$categoria->id}}"><kbd style="font-size:10px;"> {{$categoria->nom}} </kbd> </a>
  <hr>
  <p>{!!html_entity_decode($noticia->descripcio)!!} </p>
  <hr>
  @if($valid)
  <a href="{{ route('noticies.edit',$noticia->id)}}" class="btn btn-primary" style="">Editar noticia</a>
  @else
  @endif
</div>

@endsection
@section("footer")
@endsection
