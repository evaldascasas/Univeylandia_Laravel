var figura = new Array('Figura univeylandia', 'Figura dragon can', 'Figura mascota ', 'Figura tremor');
var mida = new Array('Menuda', 'Mitjana', 'Gran');

var pedido = new Array(figura, mida);
var preuFigura = new Array(30, 15, 20, 5);
var preuMida = new Array(2, 4, 8);

var total = new Array(preuFigura, preuMida);

var figura = figura.push('Figura vikings');
var preuFigura = preuFigura.push(10);
var figura_triada = new Array();
var mida_triada = new Array();
var resultat = 0;
var ultims_preus = new Array();
var seleccio_figura = 0;
var taula;

function tableCreate(files_num, mida_triada, figura_triada, resultat) {
  var body = document.getElementById('taula_generada')[0];
  var tbl = document.getElementById('data-table');

  var th = document.getElementById('header_taula');
  th.setAttribute("class", "thead-dark");
  var trh = document.createElement('tr');
  var tdh1 = document.createElement('th');
  tdh1.appendChild(document.createTextNode("Figura"))
  var tdh2 = document.createElement('th');
  tdh2.appendChild(document.createTextNode("Mida"))

  tdh1.setAttribute("class", "elements_taula");
  tdh2.setAttribute("class", "elements_taula");
  trh.setAttribute("class", "elements_taula");
  trh.appendChild(tdh1)
  trh.appendChild(tdh2)
  th.appendChild(trh);
  tbl.appendChild(th);

  var tbdy = document.getElementById('tbody');



    for (var f = 0; f < mida_triada.length; f++) {
      var tr = document.createElement('tr');
      var td = document.createElement('td');
      td.appendChild(document.createTextNode(figura_triada[f]))
      var td2 = document.createElement('td');
      td2.appendChild(document.createTextNode(mida_triada[f]))


      td.setAttribute("class", "elements_taula");
      td2.setAttribute("class", "elements_taula");
      tr.setAttribute("class", "elements_taula");
      tr.appendChild(td)
      tr.appendChild(td2)
      tbdy.appendChild(tr);
    }
    var tr2 = document.createElement('tr');
    var td3 = document.createElement('td');
    td3.appendChild(document.createTextNode("Total:"))
    var td4 = document.createElement('td');
    td4.appendChild(document.createTextNode(resultat + " €"))

    tr2.setAttribute("class", "table-dark");
    tr2.setAttribute("class", "elements_taula");
    td3.setAttribute("class", "elements_taula");
    td3.setAttribute("style", "font-weight:bold;");
    td4.setAttribute("class", "elements_taula");
    td4.setAttribute("style", "font-weight:bold;");
    tr2.appendChild(td3)
    tr2.appendChild(td4)
    tbdy.appendChild(tr2);
  tbl.appendChild(tbdy);
  //body.appendChild(tbl)
  document.getElementById("dino").style.display = "block";
  document.getElementById("dino").ondblclick = function() {myFunction()};
}


function calcular_preu_figura(total, i, j, pedido) {
  if (seleccio_figura == 0) {
    resultat = resultat + total[i][j];
    figura_triada.push(pedido[i][j]);
    ultims_preus.push(total[i][j]);
  /*  document.getElementById('preu').innerHTML = resultat;
    document.getElementById('cistella').innerHTML = figura_triada;*/
    seleccio_figura = 1;
  }
  else {
    alert("Ja hi ha una figura seleccionada, tria una mida.");
  }
}

function calcular_preu(total, i, j, pedido) {
  if (seleccio_figura == 1) {
    resultat = resultat + total[i][j];
    mida_triada.push(pedido[i][j]);
    ultims_preus.push(total[i][j]);
  /*  document.getElementById('preu').innerHTML = resultat;
    document.getElementById('cistella_mida').innerHTML = mida_triada;*/
    seleccio_figura = 0;
    var td_taula =  document.getElementsByClassName('elements_taula');
    /*if (td_taula != '[object HTMLCollection]'){
      //element.remove();
      //element.parentNode.removeChild(element);
      //('#data-table > tr > td').remove();
      document.getElementById('taula_td').innerHTML = td_taula;
      tableCreate(mida_triada.length, mida_triada[mida_triada.length-1], figura_triada[figura_triada.length-1]);
    }else {*/
      //document.getElementById('taula_td').innerHTML = td_taula;
      for(var z = 0; z < td_taula.length;)
      {
         td_taula.item(z).remove();
      }
      tableCreate(mida_triada.length, mida_triada, figura_triada, resultat);
      //$('#data-table > tr > td').remove();
      //td_taula.remove();
    //}

    }else {
      alert("Selecciona una figura per a triar la seva mida!.");
    }
}
  function eliminar_ultim() {
  if (resultat > 0) {
    figura_triada.pop();
    mida_triada.pop();
    if (seleccio_figura == 1) {
      preu_a_restar = ultims_preus.pop();
      resultat = resultat - preu_a_restar;
    //  document.getElementById('preu').innerHTML = resultat;
    }else {
      for (var i = 0; i < 2; i++) {
        preu_a_restar = ultims_preus.pop();
        resultat = resultat - preu_a_restar;
    //    document.getElementById('preu').innerHTML = resultat;
      }
    //  document.getElementById('preu').innerHTML = resultat;
    }
    var td_taula =  document.getElementsByClassName('elements_taula');
    for(var z = 0; z < td_taula.length;)
    {
       td_taula.item(z).remove();
    }
    tableCreate(mida_triada.length, mida_triada, figura_triada, resultat);
    //document.getElementById('preu').innerHTML = resultat;
  /*  document.getElementById('cistella').innerHTML = figura_triada;
    document.getElementById('cistella_mida').innerHTML = mida_triada;*/
    seleccio_figura = 0;
  }
}
function buidar_cistella() {
  resultat = 0;
  figura_triada = [];
  mida_triada = [];
  var td_taula =  document.getElementsByClassName('elements_taula');
  for(var z = 0; z < td_taula.length;)
  {
     td_taula.item(z).remove();
  }
  tableCreate(mida_triada.length, mida_triada, figura_triada, resultat);
  /*document.getElementById('preu').innerHTML = resultat;
  document.getElementById('cistella').innerHTML = figura_triada;
  document.getElementById('cistella_mida').innerHTML = mida_triada;*/
}
function displayDate() {
  document.getElementById("demo").innerHTML = Date();
}
document.write('<h3> Tenda figures </h3>');
/*for (i = 0; i < pedido.length; i++) {
  for (j = 0; j < pedido[i].length; j++) {
    document.write('<button class="btn btn-secondary btn-lg" onclick="calcular_preu(total,' + i + ',' + j + ',pedido)">' +pedido[i][j]+ '</button>');
    document.write('&nbsp; &nbsp;');
  }
  document.write('<br> <br>');
}*/
//document.write('<p> Patata </p>');
document.write('<div class="card-group">');
  for (j = 0; j < pedido[0].length; j++) {
    //document.write('<p>' + pedido[0][j] + '</p>');
    document.write('<div class="card">')
    document.write('<img class="card-img-top2" src="/img/tenda_figures/'+j+'.jpg" alt="Card image cap" id="img_atraccio'+j+'">');
    document.write('<div class="card-body">');
    document.write('<h5 class="card-title">'+pedido[0][j].toUpperCase()+'</h5>');
    if( pedido[0][j].split(" ")[2] ) {
      document.write('<p class="card-text">Figura de '+pedido[0][j].split(" ")[1]+' '+pedido[0][j].split(" ")[2]+' de gran qualitat feta a mà</p>');
    }else{
      document.write('<p class="card-text">Figura de '+pedido[0][j].split(" ")[1]+' de gran qualitat feta a mà</p>');
    }
    document.write('<button class="btn btn-secondary btn-lg" onclick="calcular_preu_figura(total,' + 0 + ',' + j + ',pedido)"  >Comprar</button>');
    document.write('<p class="card-text"><small class="text-muted">No se admeten devolucions </small></p>');
    document.getElementById('img_atraccio'+j+'').addEventListener("click", displayDate);
    document.write('</div>');
    document.write('</div>');
    document.write('&nbsp; &nbsp;');
  }
  document.write('</div>');
  document.write('<br>');
  document.write('<div class="card-group">');
  for (k = 0; k < pedido[1].length; k++) {
    document.write('<div class="card">')
    document.write('<img class="card-img-top3" src="/img/tenda_figures/'+k+'.png" alt="Card image cap">');
    document.write('<div class="card-body">');
    document.write('<h5 class="card-title">'+pedido[1][k].toUpperCase()+'</h5>');
    document.write('<p class="card-text">Seleccio de la mida '+pedido[1][k].toLowerCase()+'</p>');
    document.write('<button class="btn btn-secondary btn-lg" onclick="calcular_preu(total,' + 1 + ',' + k + ',pedido)">Mida '+pedido[1][k].toLowerCase()+'</button>');
    document.write('</div>');
    document.write('</div>');
    document.write('&nbsp; &nbsp;');
    document.write('&nbsp; &nbsp;');
  }
  document.write('</div>');
  document.write('<br>');
document.write('<br>');
document.write('<button id="compra" class="btn btn-primary btn-lg" onclick="eliminar_ultim()" onmousedown="mouseDown()" onmouseup="mouseUp()" >Eliminar</button>');
document.write('&nbsp; &nbsp;');
document.write('<button class="btn btn-primary btn-lg" onclick="buidar_cistella()">Buidar carrito</button>');
document.write('<br> <br>');
document.write('<p id="demo"> </p>');

function myFunction() {
  alert("M'has pillatxdxdjajxdxd");
}
function mouseDown() {
  document.getElementById("compra").style.color = "red";
}

function mouseUp() {
  document.getElementById("compra").style.color = "green";
}

$(document).ready(function(){
  $("#updown").mouseup(function(){
    $(this).after("<p style='color:green;'>Mouse button released.</p>");
  });
  $("#updown").mousedown(function(){
    $(this).after("<p style='color:purple;'>Mouse button pressed down.</p>");
  });
});

function bigImg(x) {
  x.style.height = "64px";
  //x.style.width = "64px";
}

function normalImg(x) {
  x.style.height = "38px";
  //x.style.width = "32px";
}

function myFunction(e) {
  var x = e.clientX;
  var y = e.clientY;
  var coor = "Coordinates: (" + x + "," + y + ")";
  document.getElementById("demo").innerHTML = coor;
}

function clearCoor() {
  document.getElementById("demo").innerHTML = "";
}

$(document).ready(function(){
  $("#ok").keydown(function(){
    $("#ok").css("background-color", "yellow");
  });
  $("#ok").keyup(function(){
    $("#ok").css("background-color", "pink");
  });
});

i = 0;
$(document).ready(function(){
  $("#ok").keypress(function(){
    $("#contador").text(i += 1);
  });
});

$(document).ready(function(){
  $("#ok").blur(function(){
    alert("focus out.");
  });
});

$(document).ready(function(){
  $("#hide").click(function(){
    $("#dino").hide(1000, function(){
    alert("Dino amagat");
  });
  });
  $("#show").click(function(){
    $("#dino").show(1000);
  });
});

$(document).ready(function(){
  $("#imatges_button").click(function(){
    $(".card-img-top2").fadeToggle();
    $(".card-img-top3").fadeToggle("slow");
  });
});

$(document).ready(function(){
  $("#flip").click(function(){
    $("#taula_generada").slideToggle("slow");
  });
});

$(document).ready(function(){
  $("#mutar").click(function(){
    $("#dino").css("background", "url(http://66.media.tumblr.com/2e8986a1b1c062623cea1b9edaddcc52/tumblr_mup3qzOPsX1rk0k2jo1_500.gif)")
    $("#dino").css("background-size", "100px 150px")
      .slideUp(2000, function(){
    $("#dino").css("background", "url(https://img.memecdn.com/niggers-love-fried-chicken_o_250599.gif)")
    $("#dino").css("background-size", "100px 150px")

      .slideDown(2000, function(){
    $("#dino").css("background", "url(https://img.memecdn.com/niggers-love-fried-chicken_o_250599.gif)")
    $("#dino").css("background-size", "100px 150px")
  });
  });
  });
});

$("#btnapp").click(function(){
    $("p").append(" <b>PERQUE NO FUNCIONA????????????????????????????????????</b>.");
});

$("#dimensions").click(function(){
  var txt = "";
  txt += "Width: (+margin): " + $("#dino").outerWidth(true) + "</br>";
  txt += "Height (+margin): " + $("#dino").outerHeight(true);
  $("#dino_dim").html(txt);
});

/*document.write('<p>Preu: <text id="preu"> 0 </text></p>');
document.write('<p>Carrito figura: <text id="cistella"> </text></p>');
document.write('<p>Carrito mida: <text id="cistella_mida"> </text></p>');*/
