@extends("layouts.plantilla")
<div id="contingut_carrito">
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
<style>
.disabled {
  pointer-events: none;
  cursor: default;
}
</style>

<div class="container" style=" margin-top: 40px; margin-bottom: 40px">
  <h1 style="">Carret de la compra</h1>
</div>
<div class="container" style="height:auto;position:relative;">
@if(!$linia_cistella->isEmpty())
    <table class="table table-striped">
      <thead>
          <tr>
            <td style="font-weight: bold;">Producte</td>
            <td style="font-weight: bold;">Viatges</td>
            <td style="font-weight: bold;">Quantitat</td>
            <td style="font-weight: bold;">Preu</td>
            <td></td>
          </tr>
      </thead>
      <tbody>
        <div class="container" id="loading" style="position: absolute;background-color: rgba(255, 255, 255, 0.5);overflow: hidden;height:100%;display:none;">
            <img src="https://html5.dcatalog.com/images/ajax_loader2.gif" style="margin: 0 auto;display: block;width:5%;position: absolute;top: 50%;left: 50%;">
        </div>

          @forelse($linia_cistella as $cistella)
          <tr>
              <td>{{$cistella->nom}} </td>
              @if ($cistella->tickets_viatges == 100)
              <td>Indefinits</td>
              @else
              <td>
                <select class="form-control viatges_input" name="num_viatges_mod" style="width:60px;" id_atributs = "{{$cistella->id}}">
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
              <td>
                <input id="quantitat_ticket" class="form-control quantitat_input" style="width:50%;" class="quantitat_valor" type="number" min="1" max=6 value="{{$cistella->quantitat}}" id_linia_cistella = "{{$cistella->id}}">
              </td>
              <td>
                {{$cistella->preu * $cistella->quantitat}}€
              </td>
              <td>
                  <form action="{{ route('cistella',$cistella->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_linia_producte" value="{{$cistella->id}}">
                    <button id ='confirm_delete' class="btn btn-danger" type="submit">X</button>
                  </form>
              </td>
          </tr>
          <p style="display:none"> {{$total = $total + ($cistella->preu* $cistella->quantitat)}} </p>
          @empty
          <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han productes a llistar</p>
          @endforelse
          @if($fotos->isEmpty())
          <tr>
            <td> </td>
            <td> </td>
            <td> <b> TOTAL:</b> </td>
            <td> {{$compteTotal = $total + $total2}}€ </td>
            <td style="width:140px;"> <a href="/compra" style="text-decoration: none;" class="btn btn-success" id="compraButton">Comprar</a> </td>
          </tr>
          @endif
      </tbody>
    </table>
    @endif
    @if(!$fotos->isEmpty())
    <table class="table table-striped">
      <thead>
          <tr>
            <td id="producte" style="font-weight: bold;">Producte</td>
            <td id=fototitol style="font-weight: bold;">Foto</td>
            <td><span id="quantitattitol" style="font-weight: bold;">Quantitat</span></td>
            <td><span id="preutitol" style="font-weight: bold;">Preu</span></td>
            <td></td>
          </tr>
      </thead>
      <tbody>
        @foreach($fotos as $cistellafoto)
          <tr>
              <td id="nom">{{$cistellafoto->nom}}</td>
              <td><span id="imatge"><img class="card-img-top" src="{{ asset($cistellafoto->thumbnail)}}" alt="Card image" style="max-width: 60px;"></span></td>
              <td><span id=quantitat style="">{{$cistellafoto->quantitat}}</span></td>
              <td><span id="preu" style="">{{$cistellafoto->preu}}&nbsp;€</span></td>
              <td>
                <div id="eliminarP">
                    <form id="eliminar" style=""action="{{ route('cistella',$cistellafoto->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_linia_producte" value="{{$cistellafoto->id}}">
                    <button id="confirm_delete" class="btn btn-danger" type="submit">X</button>
                  </form>
                </div>

              </td>
          </tr>

          <tr>
                  <p style="display:none"> {{$total2 = $total2 + ($cistellafoto->preu * $cistellafoto->quantitat)}} </p>
          </tr>

          @endforeach
          <tr>
            <td> </td>
            <td> </td>
            <td> <b> TOTAL:</b> </td>
            <td> {{$compteTotal = $total + $total2}}€ </td>
            <td style="width:140px;"> <a href="/compra" style="text-decoration: none;" class="btn btn-success" id="compraButton">Comprar</a> </td>
          </tr>
          @endif
      </tbody>
    </table>
</div>
@endsection
@section("footer")

<script>
$(".quantitat_input").each(function() {
    $(this).data("lastValue", this.value);
})

$(".quantitat_input" ).keyup(function() {
  if($(this).val() <= 0){
      this.value = 1;
  }else if ($(this).val() >= 6) {
      this.value = 6;
  }
});

$(".quantitat_input").focusout(function() {
    if (this.value != $(this).data("lastValue")) {
        //alert($(this).data("lastValue") + this.value + "id_cistella: " + this.getAttribute("id_linia_cistella"));
        $(this).data("lastValue", this.value)
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var id_linia_cistella = this.getAttribute("id_linia_cistella");
        var quantitat_mod = this.value;
        $("#loading").show();
        document.getElementById("compraButton").classList.add("disabled");
        $.ajax({
          type:"POST",
          url: "/cistella/update",
          data: {'id_linia_cistella':id_linia_cistella,'quantitat_mod':quantitat_mod},
          beforeSend: function() {
            $(this).prop('disabled', true);
          },
          success:function(data) {
            setTimeout(function() {
              $('#contingut_carrito').load('cistella/');
              return false;
              $("#loading").hide();
              document.getElementById("compraButton").disabled = false;
              //toastr["success"]('Lead closer has been saved.', "Success");
            }, 500);
          }
        });
    }
});

$(".viatges_input").each(function() {
    $(this).data("lastValue", this.options[this.selectedIndex].value);
})

$(".viatges_input").focusout(function() {
    if (this.options[this.selectedIndex].value != $(this).data("lastValue")) {
        //alert($(this).data("lastValue") + this.value + "id_cistella: " + this.getAttribute("id_linia_cistella"));
        $(this).data("lastValue", this.options[this.selectedIndex].value)
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var id_atributs = this.getAttribute("id_atributs");
        var quantitat_mod = this.options[this.selectedIndex].value;
        $("#loading").show();
        document.getElementById("compraButton").classList.add("disabled");
        $.ajax({
          type:"POST",
          url: "/cistella/updateV",
          data: {'id_atributs':id_atributs,'quantitat_mod':quantitat_mod},
          beforeSend: function() {
            $(this).prop('disabled', true);
          },
          success:function(data) {
            setTimeout(function() {
              $('#contingut_carrito').load('cistella/');
              return false;
              //toastr["success"]('Lead closer has been saved.', "Success");
              $("#loading").hide();
            }, 500);
          }
        });
    }
});
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
$(document).on('click','#confirm_delete', function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    Swal.fire({
        title: 'Estàs segur?',
        text: "Vols eliminar el producte de la cistella?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
});
</script>
</div>
@endsection
