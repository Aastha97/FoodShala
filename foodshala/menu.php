<?php 
	session_start();
	//echo $_SESSION['user_id'];
?>
<!DOCTYPE html>
<head>
	<title>Menu page</title>

<style>
	#container{
		height:auto;
		width:350px;
		float:left;
		margin:4%;
		background-color:orange;
		padding:1%;
		font-size:120%;
		
	}	

</style>
</head>
<body>
	<div>
	<?php
		//session_start();
		include 'nav_bar.php';  
	?>
	</div>
	<div>
		<h2 style="color:brown;text-align:center">MENU</h2>
		
		<?php			
			$food_item = "SELECT * FROM food_item_tbl INNER JOIN restaurant_tbl ON food_item_tbl.r_id = restaurant_tbl.r_id WHERE restaurant_tbl.r_id=".$_GET['menu_id'];
			$result = mysqli_query($con, $food_item);
			//print_r($result);
			while($row = mysqli_fetch_row($result)){
				if($row[3]){
					$type="Non-veg";
				}
				else{
					$type="Veg";
				}
				if(isset($_SESSION['user_id']) && $_SESSION['user_type']==1){
					$c_type_query = "SELECT is_nonveg FROM customer_tbl WHERE customer_tbl.c_id=".$_SESSION['user_id'];				  
					$c_type = mysqli_fetch_row(mysqli_query($con, $c_type_query))[0];
					if($row[3] && !$c_type)
						continue;
				} 
		?>

		<form <?php if(!isset($_SESSION['user_type'])) echo 'action = "customer_login_page.php"';
					else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==0) echo 'action = "Javascript:alert(\'Please login as Customer to Order Food\')"';?> method = "post">

				<?php  
					echo '
						<div id="container">
							<input name = "f_id" type = "hidden" value = "'.$row[0].'">
							<label> <b>Food name: </b> '.$row[1].'</label><br>
							<label> <b>Food Price: </b> '.$row[2].'</label><br>
							<label> <b>Veg/Non-veg: </b>'.$type.'</label><br>
							<label> <b>Restuartant: </b>'.ucfirst("$row[6]").'</label><br>
							<input type="submit" id="order_btn" name="order_btn" value="Order">
						</div>';?>
		</form><?php
			}
							
			if (isset($_POST['order_btn']) && isset($_SESSION['user_type']) && $_SESSION['user_type']==1) {
				
			$c_id = $_SESSION['user_id'];
			$f_id = $_POST['f_id'];
			
			$order = "INSERT INTO order_tbl (c_id,f_id) VALUES ($c_id, $f_id)";
			$result1 = mysqli_query($con,$order);
			if ($result1) {
				echo '<script>alert("Food item ordered Successfully.")</script>';
			}
			else{
				echo '<script>alert("Could not order the food item"'.mysqli_error($con).'</script>';
				header("Refresh:0; url=menu.php");
			}	
		}
		?>
	</div>
</body>
</html>
