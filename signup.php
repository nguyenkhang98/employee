<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">

body {
  background-image: url(https://aboutmevuongcongminh.files.wordpress.com/2015/08/vtech360-com-hc3acnh-ne1bb81n-phong-ce1baa3nh-4.jpg);

  background-size: cover;
  background-repeat: no-repeat;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
h2{
  color: white;
}
h3{
  color: white;
}

</style>
<!--
New Event
http://www.templatemo.com/tm-486-new-event
-->
 <title>Employee Account</title>
<meta name="description" content="">
<meta name="author" content="">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/owl.theme.css">
<link rel="stylesheet" href="css/owl.carousel.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">


<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
 
</head>
<body>

<nav class="navbar navbar-inverse">
<form>
<input type="button" value="Back" onclick="window.location.href='index.php'" />
</form></button>

      <ul class="nav navbar-nav navbar-right">
        <li>
                <?php
                  if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
            echo "<a href='signup.php' style='padding-right:0.2px'>Sign Up</a>";
          }
          else{
            echo "<a>Hi ".$_SESSION["name"]."</a>";
          }
          ?>
                </li>
                <li>
                <?php
                  if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
              echo '<a href="login_form.php">Login</a>';
             }
           else{
              echo '<a href="logout.php">Logout</a>';
           }
           ?>
                </li>
      </ul>

    </div>
    <div id="search" style="text-align: right;">
  <form class="searchform" action="search.php" methog="get">
    <i class="fa fa-search" aria-hidden="true" style="color: white"></i>
    <input type="text" name="search" style="height: 30px;">
    <input class="searchsubmit" type="submit" value="Search" style="height: 30px;">
    
  </form>
</div>
  </div>
</div>
      </ul>
    </div>
   
</nav>
<section id="register" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="0.6s">
        <h2>Register Here</h2>
        <h3>Quý khách vui lòng nhập đầy đủ các thông tin.</h3>
      </div>

      <div class="wow fadeInUp col-md-5 col-sm-5" data-wow-delay="1s">
        <form action="#" method="post">
          <input name="username" type="text" class="form-control" id="username" placeholder="Username">
          <input name="password" type="password" class="form-control" id="password" placeholder="Password">
          <input name="phone" type="telephone" class="form-control" id="phone" placeholder="Phone Number">
          <input name="email" type="email" class="form-control" id="email" placeholder="Email Address">
          <div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">
            <input name="register" type="submit" class="form-control" id="submit" value="REGISTER">
          </div>
        </form>
      </div>

      <div class="col-md-1"></div>

    </div>
  </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset( $_POST["register"]) ) {
    $_username = $_POST['username'];
    $_password = $_POST['password'];
    $_phone = $_POST['phone'];
    // $_lname = $_POST['lname'];
    $_email = $_POST['email'];
    echo '<script language="javascript">';
      echo 'alert("Đăng ký thành công")';
      echo '</script>';
    }
}
?>

<?php

require 'database-config.php';
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_username;
    $password = $_password;
    $phone = $_phone;
    $email =$_email;
    $sql = "INSERT INTO admin(username, password,email,phone) VALUES('".$username."','".$password."','".$email."','".$phone."')";
    $result = mysqli_query($conn,$sql);
    }
?>
</section>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
<?php
include 'footer.php'; 
?>