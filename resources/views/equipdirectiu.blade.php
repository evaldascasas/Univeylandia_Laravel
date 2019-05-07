@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<div class="container jumbotron mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center">{{ __('Equip directiu d\'Univeylandia') }}</h1>
        </div>
    </div>

	<div class="row">
		<div class="col-sm-12">
			<div id="team"></div>
		</div>
	</div>
</div>


<script>
    $(document).ready(function () {
        $.ajax({
            cache: false,
            type: "get",
            url: "{{ asset('storage/team.json') }}",
            beforeSend: function () {
                $("#team").html("Loading...");
            },
            timeout: 10000,
            error: function (xhr, status, error) {
                alert("Error: " + xhr.status + " - " + error);
            },
            dataType: "json",
            success: function (data) {
                $("#team").html("");
                $.each(data, function () {
                    $.each(this, function (key, value) {
                        $("#team").append(
                            "<div class='row'> " +
                            "<div class='col-sm-9''> " +
                            "<br><br>" +
                            "<dt>Nom: " + value.name + "</dt><br>" +
                            "<dt>Càrrec: </dt>" + value.title + "<br>" +
                            "<dt>Valors: </dt> " + value.bio + "<br><br>" +
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
@endsection

@section("footer")
@endsection