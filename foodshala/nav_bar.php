 
<!DOCTYPE html>
<head>

<style>
  .navbar {
    overflow: hidden;
    background-color: #333;
  }

  .navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  .dropdown {
    float: right;
    overflow: hidden;
    margin-right:2%;
  }

  .dropdown .dropbtn {
    font-size: 16px;  
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
  }

  .navbar a:hover, .dropdown:hover .dropbtn {
    background-color: red;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 50px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  #name:hover{
    background-color: #333;
    cursor:default;
  }
</style>
</head>
<body>
  <?php
    include 'database.php';
    if (isset($_SESSION['user_id'])) {
	?>

	<div class="navbar">
	  <a href="home.php">FoodShala</a>
  	<a style="float:right" href="logout.php">Logout</a>
	  <?php
		  if($_SESSION['user_type']==0){
			  $query_str = "SELECT r_name from restaurant_tbl WHERE r_id=".$_SESSION['user_id'];
			  $user_name = mysqli_query($con,$query_str);
			  $name = mysqli_fetch_row($user_name)[0];
			  echo '<a href="add_food_item.php">Add Food Item</a>';
			  echo '<a href="view_order.php">View Order</a>';
		  }
		  else{
        $query_str = "SELECT c_name from customer_tbl WHERE c_id=".$_SESSION['user_id'];
        $user_name = mysqli_query($con,$query_str);
        $name = mysqli_fetch_row($user_name)[0];
		  }
		  echo '<a style="float:right;background-color:grey"  id="name" href="#">'.ucfirst("$name").'</a>';
	?>
	
	</div><?php
    }

    else{ ?>
	    <div class="navbar">
	      <a href="home.php">FoodShala</a>
        <div id="non_user" class="dropdown">
          <button class="dropbtn">Login</button>
          <div class="dropdown-content">
            <a href="customer_login_page.php">Customer</a>
            <a href="restaurant_login_page.php">Restaurant</a>
          </div>
        </div> 
        <div class="dropdown">
          <button class="dropbtn">Register</button>
          <div class="dropdown-content">
            <a href="customer_register_page.php">Customer</a>
            <a href="restaurant_register_page.php">Restaurant</a>
          </div>
        </div> 
      </div><?php
    }
  ?>
</body>
</html>