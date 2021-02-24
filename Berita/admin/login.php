<!DOCTYPE html>
<html>
<head>
	<title>Login Administrator</title>
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="bg-primary">

	<div class="card col-4 ml-auto mr-auto text-dark" style="margin-top: 120px;">
		<div class="card-header text-center">
			<h2>Form Login</h2>
		</div>

		<div class="card-body">
			<form class="form" action="proses_login.php" method="POST">
			  <div class="form-group">
			    <label for="">Username</label>
			    <input type="text" class="form-control" name="username" id="" placeholder="Masukkan Username">
			  </div>
			  <div class="form-group">
			    <label for="">Password</label>
			    <input type="password" name="password" placeholder="Password" class="form-control" id="">
			  </div>
			  <div class="text-center">
			  	<button type="submit" name="proses" class="btn btn-primary">Login</button>
			  </div>
			</form>
			<!-- <form action="proses_login.php" method="POST">
				<label for="">Username</label>
				<input type="text" name="username">
				<input type="password" name="password">
				<input type="submit" name="proses" value="Login">
			</form> -->
		</div>
	</div>


</body>
</html>