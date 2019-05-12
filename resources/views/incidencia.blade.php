@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<div class="container jumbotron mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="font-weight-bold text-center text-uppercase">reportar una incidència</h3>
        </div>
    </div>

    @if(session()->get('success'))
    <div class="uper">
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
    </div>
    @endif

    <form id="form" class="align-items-center justify-content-center d-flex">
    @csrf
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" class="form-control" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea id="description" type="text" class="form-control" style="resize:none" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="priority">Prioritat</label>
                <select id="priority" class="form-control form-control-sm">
                @foreach ($prioritats as $prioritat)
                    <option  value=" {{ $prioritat->id }}">{{ $prioritat->nom_prioritat }}</option>
                @endforeach
                </select>
            </div>
        <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
        <p id="sol"></p>
        </div>
    </form>

</div>



<script>

$(document).ready(function(){
   jQuery('#submit').click(function(e){
     e.preventDefault();

     if($("#title").val() == ""  || $("#description").val() == "")
         $("#sol").html("Revisa els camps")
      else

     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.ajax({
      url: "incidencia",
      type: "post",
      data: {
        title: jQuery('#title').val(),
        description: jQuery('#description').val(),
        priority: jQuery('#priority').val(),
//        email: {{Auth::user()->email}}

      },

      success: function(result) {
        $("#submit").html("Enviat Correctament");
         $("#submit").attr("disabled", true);

         $("#submit").removeClass("btn btn-primary");

         $("#submit").addClass("btn btn-success");

         $("#form")[0].reset();
          console.log(result);
      }});
  });
});

</script>



@endsection

@section("footer")
@endsection
