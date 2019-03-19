  @extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
@endif
<div class="container" style=" margin-top: 40px; margin-bottom: 40px">
  <h1 style="margin-left: 140px">Carret de la compra</h1>
</div>
<div class="container">
    <div class="row">
      <div class="column col-7">
@if($numeroTickets > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td style="font-weight: bold;">Producte</td>
            <td style="font-weight: bold;">Mida</td>
            <td style="font-weight: bold;">Viatges</td>
            <td style="font-weight: bold;">Quantitat</td>
            <td style="font-weight: bold;">Preu</td>
            <td></td>
          </tr>
      </thead>
      <tbody>
          @forelse($linia_cistella as $cistella)
          <tr>
              <td>{{$cistella->nom}}</td>
              <td>{{$cistella->mida}}</td>
              @if ($cistella->tickets_viatges == 100)
              <td>∞</td>
              @else
              <td>
                <select class="form-control" name="num_viatges_mod" style="width:60px;">
                  @if ($cistella->tickets_viatges == 3)
                  <option selected value=3>3</option>
                  <option value=6>6</option>
                  @else
                  <option selected value=6>6</option>
                  <option value=3>3</option>
                  @endif
              </select>
              </td>
              @endif
              <td><input type="number" id="quantitat_mod" name="tentacles" min="1" max="10" value="{{$cistella->quantitat}}" class="form-control" style="width:60px;"></td>
              <td>{{$cistella->preu * $cistella->quantitat}}€</td>
              <td>
                  <form action="{{ route('cistella',$cistella->id)}}" method="post" onsubmit="return confirm('Estàs segur de que vols eliminar el producte?');">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_linia_producte" value="{{$cistella->id}}">
                    <button class="btn btn-danger" type="submit">X</button>
                  </form>
              </td>
          </tr>
          <p style="display:none"> {{$total = $total + ($cistella->preu* $cistella->quantitat)}} </p>
          @empty
          <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han productes a llistar</p>
          @endforelse

      </tbody>
    </table>
    @endif
    @if($numeroFotos > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td id="producte" style="font-weight: bold;">Producte</td>
            <td id=fototitol style="font-weight: bold;">Foto</td>
            <td><span id="quantitattitol" style="margin-left: 148px;font-weight: bold;">Quantitat</span></td>
            <td><span id="preutitol" style="margin-right: 47px; font-weight: bold;">Preu</span></td>
            <td></td>
          </tr>
      </thead>
      <tbody>
        @foreach($fotos as $cistellafoto)
          <tr>
              <td id="nom">{{$cistellafoto->nom}}</td>
              <td><span id="imatge"><img class="card-img-top" width="100px" src="{{url('/')}}/{{ $cistellafoto->fotoaigua}}" alt="Card image" style="width:100px"></span></td>
              <td><span id=quantitat style="margin-left: 156px;">{{$cistellafoto->quantitat}}</span></td>
              <td><span id="preu" style="margin-right: 47px;">{{$cistellafoto->preu}}&nbsp;€</span></td>
              <td>
                <div id="eliminarP">
                    <form id="eliminar" style="margin-left: -48px;"action="{{ route('cistella',$cistellafoto->id)}}" method="post" onsubmit="return confirm('Estàs segur de que vols eliminar el producte?');">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_linia_producte" value="{{$cistellafoto->id}}">
                    <button class="btn btn-danger" type="submit">X</button>
                  </form>
                </div>

              </td>
          </tr>
          <tr>
                  <p style="display:none"> {{$total2 = $total2 + ($cistellafoto->preu * $cistellafoto->quantitat)}} </p>
          </tr>

          @endforeach
          @endif
          <tr>
                  <p style="display:none"> {{$compteTotal = $total + $total2}} </p>
          </tr>
      </tbody>
    </table>
    </div>
<div class="column col-5">
  <div class="card" style="width: 100%">
  <div class="card-body">
    <h5 class="card-title" style="font-weight: bold;">Dades Usuari</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><span style="font-weight: bold;">Nom:</span>&nbsp;&nbsp;&nbsp;{{$user->nom}}</li>
    <li class="list-group-item"><span style="font-weight: bold;">Cognom:</span>&nbsp;&nbsp;&nbsp;{{$user->cognom1}}</</li>
    <li class="list-group-item"><span style="font-weight: bold;">Cognom:</span>&nbsp;&nbsp;&nbsp;{{$user->cognom2}}</</li>
    <li class="list-group-item"><span style="font-weight: bold;">Email:</span>&nbsp;&nbsp;&nbsp;{{$user->email}}</</li>
    <li class="list-group-item"><span style="font-weight: bold;">Adreça:</span>&nbsp;&nbsp;&nbsp;{{$user->adreca}}</li>
  </ul>
  <div class="card-body">
    @if ($compteTotal > 0)
    <div class="row" style="margin-left: 150px">
          <div style="font-weight: bold; margin-top: 5px; margin-left: 30px">TOTAL:</div>
          <div style="font-weight: bold; align-items: center;margin-top: 5px; margin-left: 30px">{{$compteTotal}}€</div>
          <a href="/compra" style="text-decoration: none;margin-left: 30px"><button type="button" class="btn btn-success" >Comprar</button> </a>
    </div>
    @endif
  </div>
</div>
  </div>
</div>
 </div>
</div>

@endsection
@section("footer")
@endsection
