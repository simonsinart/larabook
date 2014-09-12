<!doctype html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Larabook</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>



</head>
<body>
	
	@include('layouts.partials.nav')

	<div class="container">
		@include('flash::message')
		@yield('content')
	</div>

	<script src="https://js.stripe.com/v2/"></script>
	<script src="//code.jquery.com/jquery.js"> </script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script> 
		$('#flash-overlay-modal').modal();

		//ko nekdo pritisne enter, da se koment direktno zapise
		$('.comments__create-form').on('keydown', function(e){
			if(e.keyCode == 13){
				e.preventDefault();
				$(this).submit();
			}
		});
	</script>
</body>
</html>