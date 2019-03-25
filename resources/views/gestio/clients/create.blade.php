@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Crear client</h1>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
   </div>
  @endif

   <form class="needs-validation" method="post" action="{{ route('clients.store')}}">
     @csrf
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="nom">Nom</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom1">Cognom 1</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('cognom1') ? ' is-invalid' : '' }}" name="cognom1" value="{{ old('cognom1') }}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom2">Cognom 2 (opcional)</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('cognom2') ? ' is-invalid' : '' }}" name="cognom2" value="{{ old('cognom2') }}">
       </div>
       <div class="col-md-3 mb-3">
         <label for="tipus_document">Tipus document</label>
         <div class="input-group">
           <select class="form-control form-control-sm {{ $errors->has('tipus_document') ? ' is-invalid' : '' }}" name="tipus_document">
             <option value="DNI">DNI</option>
             <option value="NIE">NIE</option>
           </select>
         </div>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="numero_document">Nº document</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('numero_document') ? ' is-invalid' : '' }}" name="numero_document" value="{{ old('numero_document') }}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="date">Data de Naixement</label>
         <input type="date" class="form-control form-control-sm {{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="sexe">Sexe</label>
         <select class="form-control form-control-sm {{ $errors->has('sexe') ? ' is-invalid' : '' }}" name="sexe">
           <option value="Home">Home</option>
           <option value="Dona">Dona</option>
         </select>
       </div>
       <div class="col-md-3 mb-3">
         <label for="tlf">Telèfon de contacte (opcional)</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('telefon') ? ' is-invalid' : '' }}" placeholder="555 555 555" name="telefon" value="{{ old('telefon') }}">
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="email">Correu electrònic</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="example@example.com" name="email" value="{{ old('email') }}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="adreca">Adreça</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('adreca') ? ' is-invalid' : '' }}" name="adreca" value="{{ old('adreca') }}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="ciutat">Ciutat</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('ciutat') ? ' is-invalid' : '' }}" name="ciutat" value="{{ old('ciutat') }}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="provincia">Provincia</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('provincia') ? ' is-invalid' : '' }}" name="provincia" value="{{ old('provincia') }}" required>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="cp">Codi Postal</label>
         <input type="text" class="form-control form-control-sm {{ $errors->has('cp') ? ' is-invalid' : '' }}" name="cp" value="{{ old('cp') }}" required>
       </div>
     </div>

     <button class="btn btn-outline-success" type="submit" value="Guardar">Crear</button>
     <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Cancel·lar</a>
   </form>
 
 @endsection