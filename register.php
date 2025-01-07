<?php

require 'function.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
		     alert('username baru berhasil ditambah!');
		 </script>";
	} else {
		echo mysqli_error($conn);
	}
}





?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style> 
		label {
		display: block;
		}
		body {
			background-image: url(images/bgregister.jpeg);

			width: 300px;

			padding: 20px;

			margin: auto;

			margin-top: 100px;

			border: 4px solid #F3C623;

			font-size: 18px;
         }
         h3

		{

			background-color: #F3C623;

			text-align: center;

			color: white;

			padding: 10px;

			border-radius: 7px;
		}
		body {
			display: center;
		}
		label{
			color: #F3C623;
		}
        a{
            color:white;
        }
	</style>
</head>
<body>
	<h3>Halaman Registrasi</h3>
	<form action="" method="post">
		
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">	
			</li>
			<li>
				<label for="password2">Konfirmasi Password :</label>
				<input type="password" name="password2" id="password2">	
			</li>
			<li>
				<button type="submit" name="register">Register !</button>
			</li>

		</ul>


<center><a href="login.php">Login !</a></center>
	</form>

</body>
</html>