@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">Dades client: {{$usuari->nom}} {{$usuari->cognom1}}</h1>
   </div>

   <form method="post">
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="nom">Nom</label>
         <input type="text" class="form-control form-control-sm" name="nom" value="{{$usuari->nom}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom1">Cognom 1</label>
         <input type="text" class="form-control form-control-sm" name="cognom1" value="{{$usuari->cognom1}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom2">Cognom 2</label>
         <input type="text" class="form-control form-control-sm" name="cognom2" value="{{$usuari->cognom2}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="tipus_document">Tipus document</label>
         <input type="text" class="form-control form-control-sm" name="tipus_document" value="{{$usuari->tipus_document}}" disabled>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="numero_document">Nº document</label>
         <input type="text" class="form-control form-control-sm" name="numero_document" value="{{$usuari->numero_document}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="date">Data de Naixement</label>
         <input type="date" class="form-control form-control-sm" name="date" value="{{$usuari->data_naixement}}"disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="sexe">Sexe</label>
         <input type="text" class="form-control form-control-sm" name="sexe" value="{{$usuari->sexe}}"disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="tlf">Telèfon de contacte</label>
         <input type="text" class="form-control form-control-sm" name="telefon" value="{{$usuari->telefon}}" disabled>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="email">Correu electrònic</label>
         <input type="text" class="form-control form-control-sm" name="email" value="{{$usuari->email}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="adreca">Adreça</label>
         <input type="text" class="form-control form-control-sm" name="adreca" value="{{$usuari->adreca}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="ciutat">Ciutat</label>
         <input type="text" class="form-control form-control-sm" name="ciutat" value="{{$usuari->ciutat}}" disabled>
       </div>
       <div class="col-md-3 mb-3">
         <label for="provincia">Provincia</label>
         <input type="text" class="form-control form-control-sm" name="provincia" value="{{$usuari->provincia}}" disabled>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="cp">Codi Postal</label>
         <input type="text" class="form-control form-control-sm" name="cp" value="{{$usuari->codi_postal}}"disabled>
       </div>
     </div>

     <button class="btn btn-secondary" type="reset">Cancel·lar</button>
   </form>
 
 @endsection