<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Meals - Fitness tracker</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="../content/css/fitnessmockup.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<div id="top-nav"><? include __DIR__ . '/../../inc/'.$nav; ?></div>
		</header>
		
		<? include __DIR__ . '/../' . $view; ?>
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			var id = 2;
			$(function() {
				$("#addFields").click(function() {
					var html = "<br><div class='form-group'><label class='sr-only' for='foodInput" + id + "'>Food</label>";
					html += "<input type='text' class='form-control' id='foodInput" + id + "' placeholder='Food'></div>";
					html += "<div class='form-group'><label class='sr-only' for='quantityInput" + id + "'>Quantity</label>";
					html += "<input type='text' class='form-control' id='quantityInput" + id + "' placeholder='Quantity'></div>";
					html += "<div class='form-group'><label class='sr-only' for='caloriesInput" + id + "'>Calories</label>";
					html += "<input type='text' class='form-control' id='caloriesInput" + id + "' placeholder='Calories'></div>";

					id++;
					$("#submitNewMeal").before(html);
				});
				$("#newExerciseForm *").tooltip();
			});
		</script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
	</body>
</html>