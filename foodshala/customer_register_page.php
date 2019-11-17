<!DOCTYPE html>
<head>
  <title>Customer Registration page</title>
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
    background-color:#41aaa2 ; 
    color: black; 
    margin:3% 0% 0% 33.5%;
    
    border: 2px solid #e7e7e7;
  }

  .button2:hover {
    background-color: #008CBA;
    color: white;
  }
</style>
</head>
<body>
  <a href="home.php" style="text-decoration:none"><h2 style="color:red;font-family:cursive">FoodShala</h2></a>
  <form name="register-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div style="padding:8% 20% 0% 0%">
    <div style="background-color:brown; height:450px; width:400px; border-radius:30px; text-align:center;position:fixed" class="col-md-offset-4">
      <h3 style="text-align:center; padding-top:15px; color:#ffffff;">Customer Register</h3><br>  
      <div class="col-sm-12" style="padding-top:5px;">
        <input type="text" class="form-control" id="c_name" placeholder="Enter Name" name="c_name" style="border-radius:15px;" required="true">
      </div>

      <div class="col-sm-12" style="padding-top:10px;">
        <input type="text" class="form-control" id="c_username" placeholder="Enter Username" name="c_username" style="border-radius:15px;" required="true">
      </div>

      <div class="col-sm-12" style="padding-top:10px;">
        <textarea class="form-control" id="c_address" placeholder="Enter address" name="c_address" style="border-radius:15px;" required="true"></textarea>
      </div>

      <div class="col-sm-12" style="padding-top:10px;color:white">
        <input type="radio" id="is_nonveg" name="is_nonveg" value="false" required> Veg&nbsp
        <input type="radio" id="is_nonveg" name="is_nonveg" value="true" required> Non-veg<br>
      </div>

      <div class="col-sm-12" style="padding-top:10px;">
        <input type="password" class="form-control" id="c_password" placeholder="Type your Password" name="c_password" style="border-radius:15px;" required="true"><br>
      </div>

      <p>
        <?php
          if (isset($_POST['register_btn'])) {
            include 'database.php';

            $username = $_POST['c_username'];
            $password = md5($_POST['c_password']);
            $usercheck = mysqli_query($con, "SELECT * FROM customer_tbl WHERE c_username = '$username' and c_password = '$password' ");
            
            if (mysqli_num_rows($usercheck) > 0) {
              echo "This user already exists";
            }
            else{
              $name = $_POST['c_name'];
              $add = $_POST['c_address'];
              $is_nonveg = $_POST['is_nonveg'];

              $register = "INSERT INTO customer_tbl (c_name,c_address,c_username,c_password,is_nonveg) VALUES ('$name', '$add', '$username', '$password', $is_nonveg) ";
              $result = mysqli_query($con,$register);
              if ($result) {
                echo "Registered Successfully. Click to <a href='customer_login_page.php'>Login</a>";
              }
              else{
                echo "Could not register ".mysqli_error($con);
              }
            }
          }
        ?>
      </p>

      <input class="col-md-4 col-md-offset-4 btn" style="background-color:#ffffff; color:#626a69; font-size:20px; margin-top:10px;" id="register_btn" type="submit" name="register_btn" value="Register" />
      <div class="col-sm-12" style="padding-top:5px;">
        <a href="customer_login_page.php" style="font-size:150%;color:orange"><b>Login</b></a>
      </div>
    </div>
  </div>
  </form>
</body>
</html>

