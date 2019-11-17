<?php
	session_start();
?>
<!DOCTYPE html>
<head>
<title>Add Food Item page</title>
<style>
	input[type=text,number]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: orange;
  color: white;
  padding: 14px 20px;
  margin: 8px 0px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}

input[type=submit]:hover {
  background-color: red;
}

.add {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:20%;
  margin:auto;
}

</style>
</head>
<body>
  <div>
    <?php
      include 'nav_bar.php';  
    ?>
  </div>
  <h2 style="color:brown;text-align:center">ADD FOOD ITEM</h2>
  <div >

    <div class="add">
    <form name="register-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label><b>Food Name</b></label><br>
      <input type="text" id="f_name" name="f_name" placeholder="Food item name.." required><br><br>

      <label><b>Food Price</b></label><br>
      <input type="number" id="f_price" name="f_price" placeholder="Food item price.." required><br><br>

      <label><b>Type</b></label>
      <input type="radio" id="is_nonveg" name="is_nonveg" value="false" required> Veg&nbsp
      <input type="radio" id="is_nonveg" name="is_nonveg" value="true" required> Non-veg<br>
  </div>
  <div class="add" style="background-color:white;padding:0px">
    <input id="add_btn" type="submit" name="add_btn" value="Add" />
  </div>
	
	<p>
  <?php
    if (isset($_POST['add_btn'])) {
      $name = $_POST['f_name'];
      $price = $_POST['f_price'];
      $is_nonveg = $_POST['is_nonveg'];
      $r_id = $_SESSION['user_id'];

      $add = "INSERT INTO food_item_tbl (f_name,f_price,is_nonveg,r_id) VALUES ('$name', '$price', $is_nonveg,$r_id)";
      $result = mysqli_query($con,$add);
      if ($result) {
        echo '<script language ="javascript">
              alert("Food item Added Successfully.")
              </script>';
        }
      else{
        echo "Could not add the food item".mysqli_error($con);
      }
      
    }
  ?>
  </p>
  
</body>
</html>

