@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<!-- FAQ -->
<div class="container jumbotron mt-3">
  <div class="row">
      <div class="col-sm-12">
        <h3 class="font-weight-bold text-center text-uppercase">Notificacions</h3>
      </div>
  </div>

  @php
  $i = 0
  @endphp

  @forelse(Auth::user()->notifications as $notification)
  <div class="col-sm-12 accordion" id="accordion">

    <div class="card">
      <a href="#" class="card-link collapsed" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="false" aria-controls="collapseOne{{$i}}" id_notificacio="{{$notification->id}}" posicio="{{$i}}" id="{{$notification->id}}">
      <div class="card-header" id="headingOne">
        <p class="mb-0">
            @if($notification->unread())
            <img id="img{{$i}}" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Disc_Plain_red.svg/1024px-Disc_Plain_red.svg.png" style="max-width: 15px;padding-right: 10px;">
            @endif
            {{$notification->data['titol']}}
          <p>
        </p>
      </div>
      </a>

      <div id="collapseOne{{$i}}" class="collapse {{$notification->id}}" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body text-justify">
          {!!html_entity_decode($notification->data['descripcio'])!!}
        </div>
      </div>
    </div>

    @php
    $i = $i + 1
    @endphp
  </div>
  @empty
  <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No tens notificacions </p>

  @endforelse

</div>
<!--  FI FAQ -->

<script>
$(".card-link").click(function () {
  if (this.getAttribute("aria-expanded") == "false") {
    //alert("Quan obris notificació: " + this.getAttribute("aria-expanded") + "img: " + "img" + this.getAttribute("posicio"));
    var imatge_notificacio = "#img" + this.getAttribute("posicio");
    //alert(imatge_notificacio);
    $.ajaxSetup({
          headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
          });
    $.ajax({
    type: "PATCH",
    url: "{{ route('markasread', Auth::id()) }}",
    data: { 'notification_uuid': this.getAttribute("id_notificacio"), 'crida_ajax' : true },
    beforeSend: function () {
        //$(this).prop('disabled', true);
        //$(imatge_notificacio).hide();
    },
    success: function (data) {
        setTimeout(function () {
            $(imatge_notificacio).hide();
            //return false;
        }, 500);
    }
});
  }
});
</script>

<script>
$( document ).ready(function() {
  $( ".{{session()->get('id_notificacio')}}" ).addClass( "show" );
  $('html, body').animate({
    scrollTop: $("#{{session()->get('id_notificacio')}}").offset().top
  }, 1000)
});
</script>

@endsection

@section("footer")
@endsection
