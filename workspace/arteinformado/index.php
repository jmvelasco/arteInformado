<!DOCTYPE HTML>
<html>
<head>
<title>Prueba Técnica - ArteINFORMADO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="styles.css">
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#add-button").click(function(e) {
			e.preventDefault();
			var tag_name = $("#tag").val();
			$.ajax({
			  type: "POST",
			  url: "add_tag.php",
			  data: { tag: tag_name }
			}).success(function( msg ) {
			  $("#tag-container").append(msg);
			  $("#tag").val('');
			});		
		
		});

		// como los elementos con la clase 'remove_tag' se crean posteriormente a la carga de la pagina 
		// definimos la función agarrandola al contenedor de tag's que ya está creado 
		$('#tag-container').on('click', '.remove_tag', function() {
			id = $(this).parent().attr("id");
			selector = "#"+id;
			$.ajax({
				type: "POST",
				url: "del_tag.php",
				data: { id_tag: id }
			}).success(function( msg ) {
				$(selector).remove();
			});
		});
		$.post("get_tags.php", function(data) {
			$("#tag-container").append(data);
		});
		

	});
	</script>
</head>
<body>
	<h1>Prueba técnica - ArteINFORMADO</h1>
	<div id="tag-container"></div>
	<div id="tag-agregator">
		<form name="add-tag" method="post" id="add-tag" action="">
			<input type="text" name="tag" id="tag"> <input type="image"
				src="img/add_button.png" id="add-button">
		</form>
	</div>
</body>
</html>
