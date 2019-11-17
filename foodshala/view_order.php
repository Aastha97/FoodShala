<?php
	session_start();
?>
<html>
<head>
	<title>View Order</title>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  margin: auto;
}

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: orange;
}
</style>
</head>
<body>
	<div>
		<?php
			include 'nav_bar.php';  
		?>
	</div>
	<h2 style="color:brown;text-align:center">ORDERS OF YOUR CUSTOMERS</h2><br>
	<div>
		<table>
			<tr>
			<th>SERIAL NO</th>
			<th>ORDER ID</th>
			<th>CUSTOMER NAME</th>
			<th>FOOD NAME</th>
			</tr>
		<?php
			include 'database.php';
			$order_query = "SELECT * from order_tbl INNER JOIN customer_tbl ON order_tbl.c_id = customer_tbl.c_id INNER JOIN food_item_tbl ON order_tbl.f_id = food_item_tbl.f_id WHERE food_item_tbl.r_id = ".$_SESSION['user_id'];
			$order = mysqli_query($con,$order_query);
			$count=0;
			while($row = mysqli_fetch_row($order)){
				$count++;
				echo' 
					<tr>
					<td>'.$count.'</td>
					<td>'.$row[0].'</td>
					<td>'.$row[4].'</td>
					<td>'.$row[10].'</td>
					</tr>';
			}
		?>

		</table>
			
	</div>
</body>
</html>

