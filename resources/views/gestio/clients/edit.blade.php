@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">{{ __('Modificar client') }}</h1>
   </div>

   @if ($errors->any())
   <div class="alert alert-danger alert-important">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif

   <form method="post" action="/gestio/clients/{{$usuari->id}}">
    @csrf
    @METHOD('PATCH')
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="nom">{{ __('Nom') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Nom" name="nom" value="{{$usuari->nom}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom1">{{ __('1r Cognom') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Cognom 1" name="cognom1" value="{{$usuari->cognom1}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom2">{{ __('2n Cognom') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Cognom 2" name="cognom2" value="{{$usuari->cognom2}}">
       </div>
       <div class="col-md-3 mb-3">
         <label for="tipus_document">{{ __('Tipus document') }}</label>
         <div class="input-group">
           <select class="form-control form-control-sm" name="tipus_document">
             <option>DNI</option>
             <option>NIE</option>
           </select>
         </div>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="numero_document">{{ __('Nº document') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Número document" name="numero_document" value="{{$usuari->numero_document}}"required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="date">{{ __('Data de naixement') }}</label>
         <input type="date" class="form-control form-control-sm" placeholder="Data naixement" name="date" value="{{$usuari->data_naixement}}"required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="sexe">{{ __('Sexe') }}</label>
         <select class="form-control form-control-sm" name="sexe">
          @if($user->sexe == 'Home')
          <option selected value="{{ $user->sexe }}">{{ $user->sexe }}</option>
          <option value="Dona">Dona</option>
          @else
          <option selected value="{{ $user->sexe }}">{{ $user->sexe }}</option>
          <option value="Home">Home</option>
          @endif
         </select>
       </div>
       <div class="col-md-3 mb-3">
         <label for="tlf">{{ __('Telèfon de contacte') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Telèfon de contacte" name="telefon" value="{{$usuari->telefon}}">
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="email">{{ __('Correu electrònic') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Email" name="email" value="{{$usuari->email}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="adreca">{{ __('Adreça') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Adreça" name="adreca" value="{{$usuari->adreca}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="ciutat">{{ __('Ciutat') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Ciutat" name="ciutat" value="{{$usuari->ciutat}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="provincia">{{ __('Provincia') }}</label>
         <input type="text" class="form-control form-control-sm" placeholder="Provincia" name="provincia" value="{{$usuari->provincia}}"required>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="cp">{{ __('Codi postal') }}</label>
         <input type="text" class="form-control form-control-sm" name="cp" value="{{$usuari->codi_postal}}"required>
       </div>
     </div>

     <button class="btn btn-outline-primary" type="submit" value="Guardar">{{ __('Modificar') }}</button>
     <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">{{ __('Cancel·lar') }}</a>
   </form>
 
 @endsection