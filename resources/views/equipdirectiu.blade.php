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
                $path = storage_path() . "/js/${team}.json";
                cache: false,
				type: "get",
				url: "../../public/js/team.json",
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
								"Nom :  " + value.name + "<br>" + 
								"Carrec : " + value.title + "<br>" + 
								"Valors : " + value.bio + "<br><br>"
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
        <div class="container">
            <div class="row">
                <div class="col-sm-12"><h1 class="display-3">Equip directiu d'Univeylandia</h1></div>
            </div>
            
            <div id="team"></div>
    </main>
    
    <footer></footer>
</body>



@endsection
@section("footer")
@endsection
