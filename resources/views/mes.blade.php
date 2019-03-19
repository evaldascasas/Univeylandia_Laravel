@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<style type="text/css">
    table {
        width: 380px;
        border: 2px solid #4286f4;
    }

    th {
        font-size: larger;
        font-family: arial
    }

    td {
        border: 1px solid #4286f4;
        padding: 5px;
        background-color: #ffffff;
        font-family: arial;
    }
</style>

<div id="principal" class="container jumbotron" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center text-uppercase">Coneix les tendes i restaurants del parc</h1>
            <h4 id="subtitol" class="text-center">No et pergues la <b>MILLOR</b> part del parc</h4>
        </div>
    </div>

    <p id="gelatilandia"><b>Gelatilandia ...</b></p>

    <div id="TableContainer"></div>

    <div id="div_taula"></div>

    <p id="para1" style="font-weight:bolder;">Avui es un gran dia per a estar al nostre parc d'atraccions ja que
        les nostres tendes sortejen un gran premi.</p>

    <p id="para2">Per cada compra et donarem una papereta, totes tenen premis, però
        només serà una la guanyadora.</p>

    <input type="button" class="btn btn-danger" onclick="stylePara(false);" value="Canviar estil">

    <div id="NewTableContainer"></div>

    <input type="button" class="btn btn-outline-success" onclick="deleteNodes()" value="Borrar esta basura">

    <input type="button" class="btn btn-outline-danger" onclick="removeListener()" value="Borrar listener">

</div>

<!-- DOM CREATE TABLE -->
<script>
    function tableCreate() {
        var div_taula = document.getElementById('div_taula');
        var taula = document.createElement('table');
        var thead = taula.appendChild(document.createElement('thead'));
    }
</script>

<!-- GET ELEMENT BY ID -->
<script name="text/javascript">
    var h4tag = document.getElementById("subtitol");
    h4tag.style.fontFamily = "verdana";
    h4tag.style.fontSize = "32";
    h4tag.style.color = "darkgrey";
</script>

<!-- DOM: Insereix un node abans d'un altre node -->
<script type="text/javascript">
    function insertMessage() {
        var newPara = document.createElement("p");
        var newText = document.createTextNode("Univeypizza ...");
        // If you copy this, don’t break the lines.
        newPara.appendChild(newText);
        var firstPara = document.getElementById("gelatilandia");
        var principal = document.getElementById('principal');
        principal.insertBefore(newPara, firstPara);

        /* DOM: Crear una taula */

        // Create the table elements
        var Table = document.createElement("table");
        Table.setAttribute("id", "myTable"); // Create id
        var THead = document.createElement("thead");
        var TBody = document.createElement("tbody");
        var Row, Cell;
        var i, j;

        // Insert the created elements into Table
        Table.appendChild(THead);
        Table.appendChild(TBody);

        Row = document.createElement("tr");
        TBody.appendChild(Row);

        Cell = document.createElement("td");
        Cell.innerHTML = "Foto 1";
        Row.appendChild(Cell);
        Cell = document.createElement("td");
        Cell.innerHTML = "Foto 2";
        Row.appendChild(Cell);

        Row = document.createElement("tr");
        TBody.appendChild(Row);
        Cell = document.createElement("td");
        Cell.innerHTML = "Foto 3";
        Row.appendChild(Cell);
        Cell = document.createElement("td");
        Cell.innerHTML = "Foto 4";
        Row.appendChild(Cell);

        // Insert the table into the document tree
        Tcontainer = document.getElementById("TableContainer");
        Tcontainer.appendChild(Table);

        /*CLONAR TAULA*/
        var tableCopy = document.getElementById("myTable");
        var newTable = tableCopy.cloneNode(true);
        newTable.id = "newtable_id";
        newDiv = document.getElementById("NewTableContainer");
        newDiv.appendChild(newTable);
    }

    /*DOM: Clonant estils de nodes*/
    function stylePara(mode) {
        var p1 = document.getElementById("para1");
        var p2 = document.getElementById("para2");
        var p1Style = p1.getAttributeNode("style");
        var cloneP1Style = p1Style.cloneNode(mode);
        p2.setAttributeNode(cloneP1Style);
    }

    window.onload = insertMessage();
    window.onload = tableCreate();


</script>

<script>
    /* DOM removeChild */
    function deleteNodes() {
        var principal = document.getElementById('principal');
        document.body.removeChild(principal);
    }
</script>

<script>
    /* DOM EventListener */
    var paragrafs = document.getElementsByTagName('P');

    for (var i = 0; i < paragrafs.length; i++) {
        paragrafs[i].addEventListener("dblclick", colorParagraphs);
    }

    function colorParagraphs() {
        for (var i = 0; i < paragrafs.length; i++) {
            paragrafs[i].style.backgroundColor = "red";
        }
    }

    function removeListener() {
        for (var i = 0; i < paragrafs.length; i++) {
            paragrafs[i].removeEventListener("dblclick", colorParagraphs);
        }
    }

</script>

@endsection

@section("footer")
@endsection