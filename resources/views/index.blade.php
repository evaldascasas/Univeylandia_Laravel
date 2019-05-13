@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- SLIDER-->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/img/slider1.jpg" alt="imatge del parc">
            <div class="carousel-caption">
                <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/img/slider2.jpg" alt="imatge del parc">
            <div class="carousel-caption">
                <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/img/slider3.jpg" alt="imatge del parc">
            <div class="carousel-caption">
                <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Prèvia</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Següent</span>
    </a>
</div>
<!-- FI SLIDER -->

<!-- PROMOCIONS -->
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center">Promocions</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{route('promocions')}}"><img src="{{ asset('/img/promocions/promocio1.jpg') }}" class="img-fluid"
                    alt="imatge promoció 1"></a>
        </div>
    </div>
</div>
<!-- FI PROMOCIONS -->

<!-- NOTICIES -->
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center">Notícies</h1>
        </div>
    </div>
    <div class="row">
        @forelse($noticies as $noticia)
        <div class="col-sm-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <img class="card-img-top" alt="imatge de la noticia"
                    style="width: 200px;height: 300px; object-fit: cover;" src="{{$noticia->path_img}}">

                <div class="card-body d-flex flex-column align-items-start">
                    <a href="/noticies?catId={{$noticia->catId}}" class="d-inline-block mb-2 text-success"
                        style="background: none;border: none;"> {{$noticia->categoria}}</a>
                    <h3 class="mb-0">
                        <a class="text-dark">{{$noticia->titol}}</a>
                    </h3>
                    <p class="card-text mb-auto">{!!html_entity_decode(str_limit($noticia->descripcio, $limit=100, $end
                        = "..."))!!}</p>
                    <a href="{{ route('noticia', $noticia->str_slug) }}" class="btn btn-primary">{{ __('Continuar llegint') }}</a>
                </div>
            </div>
        </div>
        @empty
        <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han noticies a llistar</p>
        @endforelse
    </div>
    <!-- FI NOTICIES -->

    <!-- LOCALITZA -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="font-weight-bold text-center">On estem?</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc4rbBZW_EiNrWWjzcgb2NnFAeBD66cSs&callback=myMap"></script>
            <script>
                $(document).ready(function () {
                    var marker;
                    var geocoder = new google.maps.Geocoder();
                    var myLatlng = new google.maps.LatLng(40.7160476, 0.5648026);
                    var mapOptions = { zoom: 7, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP }
                    var map = new google.maps.Map($("#map").get(0), mapOptions);

                    var address = "Amposta";
                    if (marker) { marker.setMap(null); }
                    geocoder.geocode({ address: address }, function (results) {
                        marker = new google.maps.Marker({
                            position: results[0].geometry.location, map: map
                        });

                        var infoWindow = new google.maps.InfoWindow({
                            content: "<h3>" + "Univeylandia" + "<br><a href=http://maps.google.com/maps?daddr=" +
                                address + ">Com anar</a>"
                        }
                        );
                        infoWindow.open(map, marker);
                    });
                });
            </script>
            <div id="map" style="width:100%;height:400px;"></div>
        </div>
    </div>
</div>

<!-- FI LOCALITZA -->
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center">Fotos realitzades pels nostres clients</h1>
        </div>
    </div>
    <div class="row" id="photos">
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var url = "https://api.flickr.com/services/feeds/photos_public.gne?" +
            "format=json&jsoncallback=?&tags=parc+atraccions";

        $.getJSON(url, function (data) {
            var html = "";
            $.each(data.items, function (i, item) {
                if (i <= 11) {
                    html += "<div class='col-lg-2 col-md-4 col-6'>"
                    html += "<a class='d-block mb-4' href=" + item.link + ">";
                    html += "<img style='width:150px; height: 150px;' class='img-fluid img-thumbnail' src=" + item.media.m + ">";
                    html += "</a>";
                    html += "</div>";
                    html = html.replace("/>", ">");
                }
            });
            $("#photos").html(html);
        });
    });
</script>

@endsection

@section("footer")
@endsection
