<?php
session_start();
//echo $_SESSION['user_id'];
?>
<!DOCTYPE html>
<head>
	<title>Foodshala Home page</title>
<style>
	body{
		background-image: linear-gradient(orange, white);
		height: auto;
		background-attachment: fixed;
		background-size: cover;
	}
	#img{
		padding-top:7%;
		height:40%;
		width:40%;
		margin:0 auto;
		display:flex;
		
	}
	#container{
		
		height:200px;
		width:200px;
		float:left;
		margin:4%;
		background-color:white;
		
	}

	#r_name{
		color:red;
		font-weight:bold;
		font-size:150%;
		justify-content: center;
		display:flex;
	}

</style>
<body>
	<div>
	<?php
		//session_start();
		include 'nav_bar.php';  
	?>
	</div>
	<h2 style="color:brown;text-align:center">RESTAURANTS</h2>
	<form name="register-form" method="GET">
	<?php
					
		$restaurant = "SELECT * FROM restaurant_tbl";
		$result = mysqli_query($con, $restaurant);
		while($row = mysqli_fetch_row($result)){ ?>
			<div id="container">
			<div id="img">
			<img height="100%" width="100%" src="img/restaurant.png"/>
			</div>
			<hr width="50%" color="yellow">
			<div id="r_name">
			<a style="text-decoration:none;color:red" href="menu.php?menu_id=<?php echo $row[0]?>"><?php echo ucfirst("$row[1]")?></a>
			</div>
			</div>
		<?php
		}
		?>
	</form>
</body>
</html>