@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
<div class="container" style="margin-top:100px">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Pujar Imatge
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('imatges.save') }}" enctype="multipart/form-data">
              @csrf
            <div class="form-group row">
                <label for="image_path" class="col-md-3 col-form-label text-md-right">Imatge
                </label>
                <div class="col-md-7">
                <input id="image_path" type="file" name="image_path" class="  form-control" required/>

                @if($errors->has('image_path'))
                  <span class="invalid-feedback" role="alert"> <strong>{{$errors->first('image_path')}}</strong></span>
                @endif
                </div>
              </div>
                <br>
            <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label text-md-right">Descripció</label>
                  <div class="col-md-7">
                    <input id="description" type="text" name="description" class="  form-control" required/>
                @if($errors->has('description'))
                    <span class="invalid-feedback" role="alert"> <strong>{{$errors->first('description')}}</strong></span>
                @endif
                </div>
                <br>
            </div>

            <div class="form-group row">
                <select name="atraccio" class="form-control form-control-sm" style="margin-left: 195px; margin-right: 135px;">
                  @foreach ($atraccions as $atraccionetes)
                  <option value="{{$atraccionetes->id}}">{{$atraccionetes->nom_atraccio}}</option>
                  @endforeach
                </select>

            </div>
            <div class="form-group row">
                  <div class="col-md-6 offset-md-3">
                    <input id="description" type="submit" class="btn btn-primary" value="Pujar Imatge" data-toggle="modal" data-target="#exampleModal"/>
                  </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
