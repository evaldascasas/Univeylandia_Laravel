@extends("layouts.gestio")

@section("content")

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Programari') }}</h1>
  </div>
  <div class="col-12 text-justify">
        <p>
            {{ __('En aquesta part de la pàgina web es pot trobar programari fet pel departament d\'informàtica del Parc Univeylandia.') }}
            <ul>
                <li><a href="{{ asset('storage/software/UniveylandiaGestio-2.0.jar') }}" download="Univeylandia-gestio-2.0.jar">{{ ('Instal·lador programari de gestió') }}</a></li>
                {{-- {{ storage_path("public/atraccions/") }} --}}
                {{-- <img src="{{ asset('storage/atraccions/1557238969atraccions.jpg') }}"> --}}
                {{-- <br/> --}}
                {{-- {{ public_path() }} --}}
                {{-- <br/> --}}
                {{-- @foreach ($files as $file)
                    {{ $file }}
                @endforeach --}}
            </ul>
        </p>
  </div>
@endsection