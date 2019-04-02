@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center text-uppercase">{{ $atraccio->nom_atraccio }}</h1>
        </div>
    </div>

    <div class="row">
        @foreach($atributs as $atribut)
        <div class="col-sm-4 mb-1">
            <div class="card">
                <a href="#" data-toggle="modal" data-target="#modalFoto{{$atribut->id}}">
                    <img src="{{ asset($atribut->foto_path_aigua) }}" class="card-img img-fluid">
                </a>
                <div class="card-body align-self-center">
                    <a href="{{url("/comprarFotos/{$atribut->id}")}}" type="button"
                        class="btn btn-success">{{ __('Comprar') }}</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalFoto{{$atribut->id}}" tabindex="-1" role="dialog" aria-labelledby="modalFoto"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $atribut->nom_atraccio }} - {{ $atribut->created_at }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset($atribut->foto_path_aigua) }}" class="card-img">
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Modal -->
        @endforeach
    </div>
</div>

@endsection
@section("footer")
@endsection