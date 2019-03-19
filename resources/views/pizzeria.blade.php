<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Parc Atraccions Univeylandia') }}</title>

    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style>
    #alergens_desplegable {
        font-style: italic;
        display: none;
    }
</style>

<body onload="onload(), checkCookie()" onscroll="scroll()">
    @include("layouts.menu1")
    @yield("menu1")

    @include("layouts.menu2")
    @yield("menu2")


    <!-- PIZZA -->
    <!--
                      EVENTOS HECHOS:
                        ON CLICK , ON DOUBLE CLICK, ON MOUSE OVER, ON MOUSE OUT, RADIO BUTTON CHECKED
                        ON KEY DOWN, COMPROVACIO DEL EMAIL, ON KEY UP, ON LOAD, SCROLL, BLUR, ON FOCUS, ON ABORT  N O   A C A B A D O
                                          -->
    <div class="container jumbotron" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12">

                <iframe src="banners/univeylados/univeylados.html" height="110" width="1050"></iframe>

                <h3 class="font-weight-bold text-center text-uppercase">PERSONALITZA LA TEVA PIZZA</h3>
                <br>
            </div>
        </div>
        <div class=text-center>
            <script type="text/javascript">
                var ingredients_afegits = new Array();									//variable per emmagatzemar els ingredients que es seleccionen
                var massa = false;																		//boolean per saber i ja hem escollit una massa
                var comptador = 0;                                    //variable per comptar la quantitat de lletres que s'han escrit en el textholder dels sugeriments

                /*Mètode per a sumar els ingredients i el seu preu total*/
                function afegir(preu_pizza, i, j, ingredient_pizza) {
                    if (i == 0 && massa) {																	//comprovem si hem seleccionat una massa
                        alert("Ja has seleccionat una massa");
                    }
                    else if (!ingredients_afegits.includes(ingredient_pizza[i][j])) {
                        if (i == 0) { massa = true; }															//actualitzem el valor del boolean perque i==0 vol dir que hem seleccionat una massa y no podem seleccionar més
                        preu_total = preu_total + preu_pizza[i][j];
                        ingredients_afegits.push(ingredient_pizza[i][j]);
                        canvis(preu_total, i, j);
                    }
                    else {
                        /*Borrem l'ingredient si ja existeix*/
                        for (z = 0; z < ingredients_afegits.length; ++z) {
                            if (ingredients_afegits[z].localeCompare(ingredient_pizza[i][j]) == 0) {
                                ingredients_afegits.splice(z, 1);
                            }
                        }
                        preu_total = preu_total - preu_pizza[i][j];
                        canvis(preu_total, i, j);
                        //alert("Ja has afegit aquest ingredient");
                    }
                }
                /*Mètode per a actualitzar el preu i els ingredients en la pàgina*/
                function canvis(preu, i, j) {
                    var str = document.getElementById("preu").innerHTML;
                    var resultat = "El preu de la teva pizza es: " + Math.round(preu * 100) / 100 + "€";
                    document.getElementById("preu").innerHTML = resultat;

                    var llista_ingredients = "Els ingredients son: " + ingredients_afegits.join(", ");
                    document.getElementById("ingredients").innerHTML = llista_ingredients;

                    ingredients_string = ingredients_afegits.toString();
                }

                /*Mètode per a buidar els ingredients*/
                function buidar() {
                    preu_total = 0;
                    ingredients_afegits = [];

                    document.getElementById("preu").innerHTML = "El preu de la teva pizza es: 0€";

                    document.getElementById("ingredients").innerHTML = "Els ingredients son:";
                }

                /*Mètode utilitzat en mouseover*/
                function mouseover() {
                    document.getElementById("mouseover").innerHTML = " Per eliminar-lo selecciona'l una altra vegada.";
                }
                /*Mètode utilitzat en mouseout*/
                function mouseout() {
                    document.getElementById("mouseout").innerHTML = " O pots restablir els ingredients.";
                }
                /*Mètode utilitzat en keydown*/
                function keydown() {
                    var email = document.getElementById("email").value;
                    document.getElementById("email_confirm").innerHTML = "Confirma que el teu email és: " + email;
                }
                /*Mètode utilitzat en KEYUP*/
                function keyup() {
                    ++comptador;
                    document.getElementById("lletres_sugeriments").innerHTML = comptador + "/500 caracters.";
                }

                /*Mètode utilitzat en onLoad*/
                function onload() {
                    $("#formulario").hide();
                }

                /*Mètode utilitzat en Scroll*/
                var x = 0;
                function scroll() {
                    x += 1;
                    if (x == 80) {
                        alert('Et recomanem la pizza amb massa original, pernil dolç, bacó i mozzarella!');
                    }
                }

                /*Mètode utilitat onBlur, SE ACTIVA CUANDO 'SALES' DEL CAMPO DE TEXTO*/
                function noFoco() {
                    var x = document.getElementById("nom");
                    x.value = x.value.toUpperCase();
                    x.style.background = "white";

                    var y = document.getElementById("cognoms");
                    y.value = y.value.toUpperCase();
                    y.style.background = "white";

                }

                /*Mètode utilitzat en l'event onFocus*/
                function foco(x) {
                    x.style.background = "yellow";
                }

                /*Mètode utilitzar en l'event onAbort*/
                function abortar() {
                    alert("Algunes imatges no s'han pogut carregar completament.");
                }
                var preu_total = 0;
                /*Array amb els ingredients*/
                var ingredient_massa = new Array('Massa fina', 'Massa grosa', 'Massa original', 'Amb formatge');
                var ingredient_carn = new Array('Carn picada', 'Bacó', 'Pernil salat', 'Pernil dolç');
                var ingredient_formatge = new Array('Cheddar', 'Roquefort', 'De cabra', 'Mozzarella');
                var ingredient_vegetals = new Array('Cogombret', 'Ceba', 'Pebrot roig', 'Pebrot Verd');
                var ingredient_pizza = new Array(ingredient_massa, ingredient_carn, ingredient_formatge, ingredient_vegetals);

                /*Array amb les imatges*/
                var img_carn = new Array('carn.jpg', 'baco.jpeg', 'pernil.jpg', 'pernildolc.jpeg');
                var img_masa = new Array('fina.jpg', 'gorda.jpeg', 'normal.jpg', 'queso.jpg');
                var img_formatge = new Array('cheddar.jpg', 'roquefort.jpeg', 'cabra.jpeg', 'mozzarella.jpg');
                var img_vegetals = new Array('cogombret.JPG', 'ceba.png', 'pebrotr.jpg', 'pebrotv.jpg');
                var img_pizza = new Array(img_masa, img_carn, img_formatge, img_vegetals);

                /*Array amb el preu dels ingredients*/
                var preu_masa = new Array(4, 5, 4, 7);
                var preu_carn = new Array(2, 0.8, 1, 1);
                var preu_formatge = new Array(0.8, 1.2, 1.2, 1);
                var preu_vegetals = new Array(0.5, 0.75, 0.65, 0.65);
                var preu_pizza = new Array(preu_masa, preu_carn, preu_formatge, preu_vegetals);

                /*Bucle per a imprimir els botons amb els ingredients*/
                for (i = 0; i < ingredient_pizza.length; i++) {
                    for (j = 0; j < ingredient_pizza[i].length; j++) {
                        document.write("<a href=\"img/" + img_pizza[i][j] + "\" data-fancybox data-caption=\"Pizzeria Univeylandia\">");
                        document.write("<img src=\"img/" + img_pizza[i][j] + "\" width=\"100\" height=\"60\"> ");
                        document.write("</a>");
                        document.write("<button class=\"btn btn-primary\" style=\"margin-right:30px;\" name=" + preu_pizza[i][j] +
                            " ondblclick=\"afegir(preu_pizza," + i + "," + j + ", ingredient_pizza)\">" + ingredient_pizza[i][j] + "</button> ");
                    }
                    document.write("<br> <br>");
                }

                document.write("</div>");
                document.write("<p id=\"preu\">El preu de la teva pizza es: 0€</p>");
                document.write("<p id=\"ingredients\">Els ingredients son:</p>");

                document.write("<button onclick=\"buidar()\" class=\"btn btn-primary\">Buida els ingredients</button>   ");
                document.write("<button id=\"suggeriments\" class=\"btn btn-primary\">Envia'ns els teus suggeriments</button>   ");
                document.write("<button onClick = \"location.reload()\" class=\"btn btn-primary\">Envia</button>   ");

                document.write("<br><a onmouseover=\"mouseover()\" onmouseout=\"mouseout()\" class=\"small\">Només pots afegir un ingredient una vegada.</a>");
                document.write("<a class=\"small\" id=\"mouseover\"></a>");
                document.write("<a class=\"small\" id=\"mouseout\"></a>");
                document.write("<a onkeydown=\"keydown()\" id=\"keydown\"></a>");

            </script>

            <div id="formulario" style="margin-top:30px; margin-left: 200px; margin-right: 200px;">

                <form>
                    <fieldset>
                        <legend>Suggeriments</legend>

                        <label for="nombre">Nom</label>
                        <input required type="text" size="15" id="nom" onblur="noFoco()" onfocus="foco(this)">

                        <label for="apellidos">Cognoms</label>
                        <input type="text" size="36" id="cognoms" onblur="noFoco()" onfocus="foco(this)">

                        <br>
                        <label for="email">e-Mail</label>
                        <input onkeydown="keydown()" required type="text" id="email" size="60" onfocus="foco(this)">
                        <br>
                        <a id="email_confirm" class="small"></a>
                        <br>
                        <a id="email_error" class="small" style="color:red;"></a>

                        <br>
                        <br>
                        <input onkeyup="keyup()" required type="textarea" size="65" id="sugeriments"
                            placeholder="Escriu els teus sugeriments" maxlength="500" />
                        <br>
                        <a id="lletres_sugeriments" class="small"></a>

                        <br>
                        <br>
                        <label for="alergens">Alergens</label>
                        <br>
                        <div style="margin-left: 15px;">
                            <input type="checkbox" name="alergen1" value="fruts secs">Soc alergic a alguns fruts
                            secs<br>
                            <input type="checkbox" name="alergen2" value="lactosa">Soc alergic a la lactosa<br>
                            <input type="checkbox" name="alergen3" value="gluten">Soc alergic al gluten<br>
                        </div>

                        <br>
                        <br>
                        <label for="alergens">Estic conforme en que s'emmagatzeme aquesta informació</label>
                        <br>
                        <div style="margin-left: 15px;">
                            <input type="radio" name="informacio" value="si" checked>Sí<br>
                            <input type="radio" name="informacio" value="no">No<br>
                        </div>

                        <br>
                        <input onclick="comprovar_informacio()" class="btn btn-primary" type="submit" value="Envia" />
                    </fieldset>
                </form>
            </div>
            <br><br>
            <div id="alergens_avis">
                Fes click per a veure els alergens
            </div>

            <button class="btn btn-secondary" id="stop">Parar animació</button>
            <div id="alergens_desplegable">
                Les pizzes no contenen gluten ni lactosa.
                <div id="img_alergens"> <img id="img_alergens2" src='img/alergens.png' width="364" height="180">
                </div>
            </div>
        </div>
        <!-- FI PIZZA -->
        @include("layouts.footer")
        @yield("footer")

        <!-- SCRIPTS -->
        <script>
            function comprovar_informacio() {
                /*Si/No*/
                var elementos = document.getElementsByName("informacio");

                if (elementos[1].checked) {
                    alert("Has d'acceptar que s'emmagatzeme la informació");
                }
                /*email*/
                var email = document.getElementById("email").value;
                if (!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email))) {
                    document.getElementById("email_error").innerHTML = "Has d'escriure una direcció d'email amb format correcte (john@doe.org)";
                }
            }

            /* - J Q U E R Y - */
            //hide usado en onload(), fadeIn,
            $(document).ready(function () {
                $("#suggeriments").click(function () {
                    $("#formulario").fadeIn("slow");
                });

                //Slide
                $("#alergens_avis").click(function () {
                    $("#alergens_desplegable").slideDown(10000);
                });

                //Animate
                $("#img_alergens").click(function () {
                    $("#img_alergens2").animate({ opacity: '0.5' });
                });

                //Stop
                $("#stop").click(function () {
                    $("#alergens_desplegable").stop();
                });
            });


            /* C O O K I E S */
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function checkCookie() {
                var ingredient = getCookie("cookie_ingredient");
                if (ingredient != "") {
                    alert("El teu ingredient favorit es " + ingredient);
                } else {
                    ingredient = prompt("Quin és el teu ingredient favorit:", "");
                    if (ingredient != "" && ingredient != null) {
                        setCookie("cookie_ingredient", ingredient, 30);
                    }
                }
            }

        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js"></script>

        <!--Cookie banner-->
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>

        <script src="{{ asset('js/public.js') }}"></script>
</body>

</html>