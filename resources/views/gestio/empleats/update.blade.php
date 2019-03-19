@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestio d'Empleats - Inserir</h1>
          </div>

          <form method="post">
            @csrf
              <div class="form-group">
                <div class="col-md-6 mb-3">
                  <label for="codi_seg_social">codi_seg_social: </label>
                  <input type="text" class="form-control form-control-sm" name="codi_seg_social">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="num_nomina">Num nomina: </label>
                    <input type="text" class="form-control" id="num_nomina" name="num_nomina">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="iban">IBAN: </label>
                    <input type="text" class="form-control" id="IBAN" name="IBAN"> <br>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="especialitat">especialitat: </label>
                    <input type="text" class="form-control" id="especialitat" name="especialitat"> <br>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="carrec">carrec: </label>
                    <input type="text" class="form-control" id="carrec" name="carrec"> <br>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="date_inici_contracte">date_inici_contracte: </label>
                    <input type="date" class="form-control" id="date_inici_contracte" name="date_inici_contracte"> <br>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="date_fi_contracte">date_fi_contracte: </label>
                    <input type="date" class="form-control" id="date_fi_contracte" name="date_fi_contracte"> <br>
                </div>
              </div>
            <button class="btn btn-primary" type="submit" value="Crear">Crear</button>
            <button class="btn btn-secondary" type="reset" value="Cancel·lar">Cancel·lar</button>
         </form>
        
@endsection
