@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<head>
    <meta charset="UTF-8">
    <title>Equip directiu d'Univeylandia</title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
                cache: false,
				type: "get",
				url: "{{ asset('storage/team.json') }}",
				beforeSend: function() {
					$("#team").html("Loading...");
				},
				timeout: 10000,
				error: function(xhr, status, error) {
					alert("Error: " + xhr.status + " - " + error);
				},
				dataType: "json",
				success: function(data) {
					$("#team").html("");
					$.each(data, function() {
			    		$.each(this, function(key, value) {
							$("#team").append(
								"<div class='row'> " + 
									"<div class='col-sm-9''> " +
										"<br><br>" + 
										"<dt> Nom : " + value.name + "</dt><br>" +
										"<dt>Carrec : </dt>" + value.title + "<br>" +
										"<dt>Valors : </dt> " + value.bio + "<br><br>" +  
									"</div> " +
									"<div class='col-sm-3''> " +
									 value.img + "<br><br><br>" +
									"</div> " +
								"</div> "
 							);
						});
					});
				}
			});
		});
    </script>
</head>

<body>
    <header></header>
    <main>
        <div class="container" class="container jumbotron mt-3" >
            <div class="row">
			<br><br>
                <div class="col-sm-12"><h1 class="display-3">Equip directiu d'Univeylandia</h1></div>
            </div>
			<br> <br>
            
            <div id="team"></div>
    </main>
    
    <footer></footer>
</body>



@endsection
@section("footer")
@endsection
