<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	
	$(document).ready(function(){ 

		$("#result").hide();

		$("#submit").on("click",function(e){
            var name = $("#name").val();
			var pass = $("#password").val();

	        e.preventDefault();
			$.get("http://localhost/apiMusic/public/index.php/users/loginUser.json", 
				{
					'name': name,
				 	'pass': pass,
				}, 
				function(response){

					if(response.code == "200"){
						sessionStorage.setItem('token', response.data.token);
            			window.location.href = "canciones.html";
					}else{
						$("#result").show();
						$("#result").html(response.message);
					}
        		}
        	);
		});
	});
    </script>

</head>
<body>

	<div class="main container">

		<h1>Login Admin</h1>

		<h4>Bienvenido al cliente web, Administrador</h4>

		<hr>

		<form>
			<div class="form-group">
				<input type="text" placeholder="name" name="name" id="name">
				<input type="password" placeholder="password" name="password" id="password">
				<input type="submit" class="btn btn-primary" name="submit" value="Entrar" id="submit">
			</div>
		</form>
        
		<p id="result" class="alert alert-danger" style="display:none"></p>

	</div>

</body>
</html>
