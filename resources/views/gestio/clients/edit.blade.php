@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">Modificar client</h1>
   </div>

   <form class="needs-validation" method="post" action="/gestio/clients/{{$usuari->id}}">
     {{csrf_field()}}
     <input type="hidden" name="_method" value="PUT">
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="nom">Nom *</label>
         <input type="text" class="form-control form-control-sm" placeholder="Nom" name="nom" value="{{$usuari->nom}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom1">Cognom 1 *</label>
         <input type="text" class="form-control form-control-sm" placeholder="Cognom 1" name="cognom1" value="{{$usuari->cognom1}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="cognom2">Cognom 2</label>
         <input type="text" class="form-control form-control-sm" placeholder="Cognom 2" name="cognom2" value="{{$usuari->cognom2}}">
       </div>
       <div class="col-md-3 mb-3">
         <label for="tipus_document">Tipus document</label>
         <div class="input-group">
           <select class="form-control form-control-sm" name="tipus_document">
             <option>DNI</option>
             <option>NIE</option>
             <option>CIF</option>
             <option>Altres</option>
           </select>
         </div>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="numero_document">Nº document *</label>
         <input type="text" class="form-control form-control-sm" placeholder="Número document" name="numero_document" value="{{$usuari->numero_document}}"required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="date">Data de Naixement *</label>
         <input type="date" class="form-control form-control-sm" placeholder="Data naixement" name="date" value="{{$usuari->data_naixement}}"required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="sexe">Sexe</label>
         <select class="form-control form-control-sm" name="sexe">
           <option>Home</option>
           <option>Dona</option>
         </select>
       </div>
       <div class="col-md-3 mb-3">
         <label for="tlf">Telèfon de contacte</label>
         <input type="text" class="form-control form-control-sm" placeholder="Telèfon de contacte" name="telefon" value="{{$usuari->telefon}}">
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="email">Correu electrònic *</label>
         <input type="text" class="form-control form-control-sm" placeholder="Email" name="email" value="{{$usuari->email}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="adreca">Adreça *</label>
         <input type="text" class="form-control form-control-sm" placeholder="Adreça" name="adreca" value="{{$usuari->adreca}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="ciutat">Ciutat *</label>
         <input type="text" class="form-control form-control-sm" placeholder="Ciutat" name="ciutat" value="{{$usuari->ciutat}}" required>
       </div>
       <div class="col-md-3 mb-3">
         <label for="provincia">Provincia *</label>
         <input type="text" class="form-control form-control-sm" placeholder="Provincia" name="provincia" value="{{$usuari->provincia}}"required>
       </div>
     </div>
     <div class="form-row">
       <div class="col-md-3 mb-3">
         <label for="cp">Codi Postal *</label>
         <input type="text" class="form-control form-control-sm" name="cp" value="{{$usuari->codi_postal}}"required>
         <br>
       </div>
     </div>

     <button class="btn btn-outline-primary" type="submit" value="Guardar">Modificar</button>
     <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Cancel·lar</a>
   </form>
 
 @endsection