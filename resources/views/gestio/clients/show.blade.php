@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">{{ __('Dades client:') }} {{$usuari->nom}} {{$usuari->cognom1}}</h1>
   </div>

   <form method="post">
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="nom">{{ __('Nom') }}</label>
         <input type="text" class="form-control form-control-sm" name="nom" value="{{$usuari->nom}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom1">{{ __('1r cognom') }}</label>
         <input type="text" class="form-control form-control-sm" name="cognom1" value="{{$usuari->cognom1}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom2">{{ __('2n Cognom') }}</label>
         <input type="text" class="form-control form-control-sm" name="cognom2" value="{{$usuari->cognom2}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="tipus_document">{{ __('Tipus document') }}</label>
         <input type="text" class="form-control form-control-sm" name="tipus_document" value="{{$usuari->tipus_document}}" disabled>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="numero_document">{{ __('Nº document') }}</label>
         <input type="text" class="form-control form-control-sm" name="numero_document" value="{{$usuari->numero_document}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="date">{{ __('Data de naixement') }}</label>
         <input type="date" class="form-control form-control-sm" name="date" value="{{$usuari->data_naixement}}"disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="sexe">{{ __('Sexe') }}</label>
         <input type="text" class="form-control form-control-sm" name="sexe" value="{{$usuari->sexe}}"disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="tlf">{{ __('Telèfon de contacte') }}</label>
         <input type="text" class="form-control form-control-sm" name="telefon" value="{{$usuari->telefon}}" disabled>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="email">{{ __('Correu electrònic') }}</label>
         <input type="text" class="form-control form-control-sm" name="email" value="{{$usuari->email}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="adreca">{{ __('Adreça') }}</label>
         <input type="text" class="form-control form-control-sm" name="adreca" value="{{$usuari->adreca}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="ciutat">{{ __('Ciutat') }}</label>
         <input type="text" class="form-control form-control-sm" name="ciutat" value="{{$usuari->ciutat}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="provincia">{{ __('Provincia') }}</label>
         <input type="text" class="form-control form-control-sm" name="provincia" value="{{$usuari->provincia}}" disabled>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="cp">{{ __('Codi postal') }}</label>
         <input type="text" class="form-control form-control-sm" name="cp" value="{{$usuari->codi_postal}}"disabled>
       </div>
     </div>

     <a class="btn btn-secondary" href="{{ route('clients.index') }}">{{ __('Cancel·lar') }}</a>
   </form>
 
 @endsection