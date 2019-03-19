@extends("layouts.plantilla")

@section("menu1")
@endsection

@section("menu2")
@endsection

@section("content")

<!-- FAQ -->
<div class="container jumbotron mt-3">
  <div class="row">
      <div class="col-sm-12">
        <h3 class="font-weight-bold text-center text-uppercase">Preguntes freqüents</h3>
      </div>
  </div>
  <div class="col-sm-12 accordion" id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <p class="mb-0">
          <a href="#" class="card-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Segons la meva alçada, en quines atraccions puc pujar?
          </a>
        </p>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body text-justify">
          Univeylandia disposa d'atraccions per a tots els públics. 
          Cada àrea temàtica disposa d'almenys una atracció en la qual podran gaudir els nens, 
          sense requisits d'alçada. Pots consultar els requisits d'altura de cadascuna d'elles aquí, 
          a les guies que trobaràs a l'entrada del parc o bé en els cartells informatius que hi ha a l'entrada de cada atracció.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingTwo">
        <p class="mb-0">
          <a href="#" class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            En cas de necessitat, puc sortir del parc i després tornar a entrar?
          </a>
        </p>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body text-justify">
          Podràs sortir del parc i tornar a entrar sempre que conservis la teva entrada. 
          Així mateix, hauràs de demanar un segell a la sortida del parc que hauràs 
          de mostrar per poder tornar a entrar. Per obtenir més informació, pots consultar la Normativa de Univeylandia.
        </div>
      </div>
    </div>
    
    <div class="card">
      <div class="card-header" id="headingThree">
        <p class="mb-0">
          <a href="#" class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            On puc consultar el Calendari del parc?
          </a>
        </p>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body text-justify">
          Consulta el Calendari en els horaris de Univeylandia.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingFour">
        <p class="mb-0">
          <a href="#" class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Si plou, ens tornen els diners i / o tanca el parc?
          </a>
        </p>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
        <div class="card-body text-justify">
          La pluja no afecta l'operativa del parc pel que no es retorna el preu de l'entrada. 
          Així mateix, podràs seguir gaudint dels espectacles i serveis encara que plogui. 
          Si bé, en cas de pluja molt intensa, tempesta elèctrica o vent molt fort, 
          es podria veure afectat el funcionament d'alguna atracció, una vegada que les condicions adverses hagin cessat,
          el funcionament del parc tornarà a la normalitat. Per obtenir més informació, pots consultar la Normativa de Univeylandia.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingFive">
        <p class="mb-0">
          <a href="#" class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Com és l'accés a les atraccions per a persones amb discapacitat?
          </a>
        </p>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
        <div class="card-body text-justify">
          Univeylandia posa a disposició de les persones que reuneixin les dues 
          condicions de discapacitat legal reconeguda mínima del 33% i mobilitat reduïda acreditades, 
          l'identificatiu per accedir a les atraccions i espectacles per a l'Accés 
          Exclusiu per a persones amb discapacitat i mobilitat reduïda. Aquest identificatiu 
          serà vàlid per a la persona beneficiària i fins a un màxim d'1 acompanyant adult 
          (en el cas d'Espectacles) i fins a 4 acompanyants (en el cas d'atraccions), 
          dels quals un ha de ser obligatòriament major d'edat i estar en plenes facultats per fer-se 
          responsable de la seva custòdia. Pots consultar tota la informació de les Tarifes Especials.
        </div>
      </div>
    </div>

  </div>
</div>
<!--  FI FAQ -->

@endsection

@section("footer")
@endsection