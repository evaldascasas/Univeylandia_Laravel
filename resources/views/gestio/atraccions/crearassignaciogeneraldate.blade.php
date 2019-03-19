    @extends("layouts.gestio")

  @section("navbarIntranet")
  @endsection
  @section("menuIntranet")
  @endsection
  @section("content")
  
      <style>
        .uper {
          margin-top: 40px;
        }
      </style>

      @if(session()->get('success'))
      <div class="uper">
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
      </div>
      @endif


      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            @if('data_inici_assignacio_empleat' == 0)
            <li>Introdueix una data</li>
            @endif
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">General: Assignar Empleats a Atraccio</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                  <button class="btn btn-sm btn-outline-secondary" value="Exportar">
                    <span data-feather="save"></span>
                    Exportar
                  </button>
                </div>
              </div>
            </div>
            <form action="{{ route('atraccions.crearassignaciogeneral', $atraccio->id) }}">
            <div class="row">
              <div class="col-4">
                <label for="example-date-input" class="col-6 col-form-label">Data inici</label>
                <input class="form-control" name="data_inici_assignacio_empleat" type="date">
              </div>
              <div class="col-4">
                <label for="example-date-input" class="col-6 col-form-label">Data fi</label>
                <input class="form-control" name="data_fi_assignacio_empleat"  type="date">
              </div>
              <div class="col-4">
  <br>
  <br>
         <button type="submit" class="btn">Enviar</button>
              </div>
            </div>
</form>

              </div>
          
  @endsection
