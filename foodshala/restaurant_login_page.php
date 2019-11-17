<!DOCTYPE html>
<head>
	<title>Foodshala Restaurant Login page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="WebContent/css/mycss.css">

<style>
	body  {
		opacity:0.97;
		background-repeat: no-repeat;
		background-image: url("img/1.jpeg");
		background-size: cover;
		background-color: #ccbaaa;
	}

	.button2 {
		background-color:orange ; 
		color: black; 
		margin:3% 0% 0% 33.5%;
		border: 2px solid #e7e7e7;
	}

	.button2:hover {
		background-color:red;
		color: white;
	}
</style>
</head>
<body>
	<a href="home.php" style="text-decoration:none"><h2 style="color:red;font-family:cursive">FoodShala</h2></a>
	<form name="login-form" method="POST" action="">
	<div style="padding:8% 20% 0% 0%">
		<div style="background-color:brown; height:400px; width:400px; border-radius:50%; text-align:center;position:fixed;opacity:0.9" class="col-md-offset-4">
			<h3 style="text-align:center; padding-top:30px; color:#ffffff;">Restaurant Login Page</h3><br><br>
			<div class="col-sm-12" style="padding-top:10px;">
				<input type="text" class="form-control" id="r_username" placeholder="Username" name="r_username" style="border-radius:15px"><br>
			</div>
			<div class="col-sm-12" style="padding-top:10px;">
				<input type="password" class="form-control" id="r_password" placeholder="Password" name="r_password" style="border-radius:15px;"><br>
			</div>
			<p>
				<?php
					session_start();
					if (isset($_POST['login_btn'])) {
						include('database.php');
						$username = $_POST['r_username'];
						$password = md5($_POST['r_password']);
						
						$usercheck = "SELECT * FROM restaurant_tbl WHERE r_username = '$username' and r_password = '$password' ";
						$result = mysqli_query($con,$usercheck);
						
						if ($result) {
							if (mysqli_num_rows($result) < 1) {
								echo "invalid username or password";
							}
							else{
								$row = mysqli_fetch_array($result);
								$_SESSION['user_id'] = $row['r_id'];
								$_SESSION['user_type'] = 0;
								header('location: home.php');
							}
						}
						else{
							echo "error in query ".mysqli_error($con);
						}
					}

					elseif (isset($_POST['register_btn'])) {
						header('location: restaurant_register_page.php');
					}
				?>
			</p>

	<div>
		<input class="col-md-4 col-md-offset-4 btn" style="background-color:#ffffff; color:#626a69; font-size:20px; margin-top:10px;" type="submit" name="login_btn" value="Login" />
		<input class="button button2 col-md-4 col-md-offset-4 btn" type="submit" id="register_btn" name="register_btn" value="Register" />
	</div>

	</div>
	</form>
</body>
</html>