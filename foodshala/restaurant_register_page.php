<!DOCTYPE html>
<head>
<title>Restaurant Registration page</title>
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
    <div style="background-color:brown; height:470px; width:400px; border-radius:30px; text-align:center;position:fixed" class="col-md-offset-4">
      <h3 style="text-align:center; padding-top:15px; color:#ffffff;">Restaurant Register</h3><br>
      <div class="col-sm-12" style="padding-top:5px;">
        <input type="text" class="form-control" id="r_name" placeholder="Enter Name" name="r_name" style="border-radius:15px;" required="true">
      </div>

      <div class="col-sm-12" style="padding-top:10px;">
        <input type="text" class="form-control" id="r_username" placeholder="Enter Username" name="r_username" style="border-radius:15px;" required="true">
      </div>

      <div class="col-sm-12" style="padding-top:10px;">
        <textarea class="form-control" id="r_address" placeholder="Enter address" name="r_address" style="border-radius:15px;" required="true"></textarea>
      </div>

    <div class="col-sm-12" style="padding-top:5px;">
      <input type="text" class="form-control" id="r_owner_name" placeholder="Enter Owner's Name" name="r_owner_name" style="border-radius:15px;" required="true">
    </div>

    <div class="col-sm-12" style="padding-top:10px;">
      <input type="password" class="form-control" id="r_password" placeholder="Type your Password" name="r_password" style="border-radius:15px;" required="true"><br>
    </div>
    <p>
      <?php
        if (isset($_POST['register_btn'])) {
          include 'database.php';

          $username = $_POST['r_username'];
          $password = md5($_POST['r_password']);
          $usercheck = mysqli_query($con, "SELECT * FROM restaurant_tbl WHERE r_username = '$username' and r_password = '$password' ");
          
          if (mysqli_num_rows($usercheck) > 0) {
            echo "This user already exists";
          }
          else{
            $name = $_POST['r_name'];
            $add = $_POST['r_address'];
            $owner_name = $_POST['r_owner_name'];

            $register = "INSERT INTO restaurant_tbl (r_name,r_address,r_username,r_password,r_owner_name) VALUES ('$name', '$add', '$username', '$password', '$owner_name') ";
            $result = mysqli_query($con,$register);
            if ($result) {
              echo "Registered Successfully. Click to <a href='restaurant_login_page.php'>Login</a>";
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
      <a href="restaurant_login_page.php" style="font-size:150%;color:orange"><b>Login</b></a>
    </div>
  </div>
  </div>
  </form>
</body>
</html>

