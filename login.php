<?php

require 'function.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];


	$result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE 
		username = '$username'");




	//cek username

	if( mysqli_num_rows($result) === 1 ) {


	//cek pasword

	$row = mysqli_fetch_assoc($result);
	if (password_verify($password, $row["password"]) ) {
		header("Location:  https://wa.me/085881837295");
		exit;

	}

	}
}




?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign in & Sign up Form</title>
	<script src="https://kit.fontawesome.com/9cdce9d668.js" crossorigin="anonymous"></script>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body, input {
			font-family: 'Poppins', sans-serif;
		}

		.container{
			position:  relative;
			width:  100%;
			min-height: 100vh;
			background-color: #fff;
			overflow: hidden;
		}

		.container:before{
			content: '';
			position: absolute;
			width: 1000px;
			height: 2600px;
			border-radius: 100%;
			background: #000, #000;
            background-image: url(images/me.jpg);
		
			right: 48%;
			transform: translateY(-50%);
			z-index: 6;
		}

		.form-container{
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
		} 

		.Signin-Signup{
			position: absolute;
			top: 50%;
			left: 75%;
			transform: translate(-50%, -50%);
			width: 50%;
			display: grid;
			grid-template-columns: 1fr;
			z-index: 5;
		}

		form{
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 5rem;
			overflow: hidden;
			grid-column: 1 / 2;
			grid-row: 1 / 2;

		}
		form.Sign-in-form{
			z-index: 2;
		}

		form.Sign-up-form{
			z-index: 1;
			opacity: 0;
		}

		.tittle{
			font-size: 2.2rem;
			color: #444;
			margin-bottom: 10px;
		}

		.input-field{
			max-width: 380px;
			width: 100%;
			height: 55px;
			background-color: #f0f0f0;
			margin: 10px 0;
			border-radius: 55px;
			display: grid;
			grid-template-columns: 15% 85%;
			padding:0 .4rem;
		}

		.input-field i{
			text-align: center;
			line-height: 55px;
			color: #acacac;
			font-size: 1.1rem;
		}

		.input-field input {
			background: none;
			outline: none;
			border: none;
			line-height: 1;
			font-weight: 600;
			font-size: 1.1rem;
		 	color: #333;
		}

		.input-field input:placeholder{
			color: #aaa;
			font-weight: 500;
		}

		.btn{
			width: 150px;
			height: 49px;
			border: none;
			border-radius: 49px;
			cursor: pointer;
			background-color: #000;
			color: #fff;
			text-transform: uppercase;
			font-weight:  600;
			margin: 10px 0;
			transition:  .5s;
    
		}

		.register{
			padding: 0;
			font-size: 15px;
		}

		.social-text{
			padding: .7rem 0;
			font-size: 1rem;
		}

		.social-media{
			display:  flex;
			justify-content: center;
		}

		.social-icon{
			height: 46px;
			width: 46px;
			border: 1px solid #333;
			margin: 0 0.45rem;
			display: flex;
			justify-content: center;
			align-items: center;
			text-decoration: none;
			color:  #333;
			font-size: 1.1rem;
			border-radius: 50%;
			transition: 0.3s;
		}
		
		.social-icon:hover{
			color: #4481eb;
			border-color: #4481eb;

		}

		

		.panel .content{
			color: #000;
			margin-right: 70px;
			margin-bottom: 40px;
			margin-top: 10px;
		}
        button{
            border-radius: 20%;
            width:20%;
            height: 20px;
        }

		




	</style>
</head>
<body>
	<div class="container">
		<div class="form-container">
			<div class="Signin-Signup">
				<form action="" method="post" class="Sign-in-form">
					<h2 class="title">Sign In</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" name="username" id="username">
					</div>
					<div class="input-field">
						<i class="fa-solid fa-lock"></i>
						<input type="password" name="password" id="password">
					</div>
					<button type="submit" name="login">LOGIN</button>

					<p class="social-text">Or Sign in with social platform</p>
					<div class="social-media">
						<a href="https://accounts.google.com" class="social-icon">
							<i class="fa-brands fa-google"></i>
						</a>
						<a href="https://mail.google.com" class="social-icon">
							<i class="fa-solid fa-envelope"></i>
						</a>
						<a href="https://www.linkedin.com" class="social-icon">
							<i class="fa-brands fa-linkedin"></i>
						</a>
						<a href="https://id-id.facebook.com" class="social-icon">
							<i class="fa-brands fa-facebook"></i>
						</a>
					</div>

					<br></br>
					<p>Don't have an account?</p><a class="register" href="register.php">Sign up</a>
						
					</div>
				</form>

				<form action="" class="Sign-up-form">
					<h2 class="title">Sign up</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Username">
					</div>
					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input type="text" placeholder="Email">
					</div>
					<div class="input-field">
						<i class="fa-solid fa-lock"></i>
						<input type="password" placeholder="password">
					</div>
					<input type="submit" value="Sign up" class="btn solid">

					<p class="social-text">Or Sign up with social platform</p>
					<div class="social-media">
						<a href="#" class="social-icon">
							<i class="fa-brands fa-google"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fa-solid fa-envelope"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fa-brands fa-linkedin"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fa-brands fa-facebook"></i>
						</a>


					</div>
					</div>
				</form>
			</div>
		</div>
		</div>
		
	</div>
	</body>
</html>