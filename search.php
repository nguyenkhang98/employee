<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">

body {
  background-image: url(http://giaoduc.net.vn/Uploaded/ngoctan/2012_04_04/anh_nen_HD_9_giaoduc.net.vn.jpg);

  background-size: cover;
  background-repeat: no-repeat;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
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
<input type="button" value="Back" onclick="window.location.href='index.php'" />

<nav class="navbar navbar-inverse">
  
      <ul class="nav navbar-nav navbar-right">
        <li>
                <?php
                  if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
            echo "<a href='signup.php' style='padding-right:0.2px'>  Đăng ký</a>";
          }
          else{
            echo "<a>Hi ".$_SESSION["name"]."</a>";
          }
          ?>
                </li>
                <li>
                <?php
                  if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
              echo '<a href="login_form.php">Đăng nhập</a>';
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
</head>
<body>
<style type="text/css">
    h3{
         font-family: 'Dancing Script', cursive;
    }
</style>
<div>
<?php

        require 'database-config.php';
        
        if (isset($_GET['search'])){
            $searchq = $_GET['search'];
            $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
            $sql = "SELECT  id, fullname, gender, timework, birth, image FROM employee WHERE fullname LIKE '%".$searchq."%'";
        }else{ 
            $sql = "SELECT  id, fullname, gender, timework, birth, image FROM employee";
        }
        $result = mysqli_query($conn, $sql);
        if(!$result){
        //Kiểm tra xem bị lỗi j
            die("Can't query data. Error occure.".mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
             echo "<div class='timkiem'style='padding :40px 40px 40px 40px'>";
             echo "<div class='row'>";
            $a=0;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-lg-3 col-md-4 '>";
                echo "<a href='viewAccount.php?id=".$row["id"]."'>";
                // echo "<div class='product-container thumbnail'>";
                echo "<img class='img-responsive' src='".$row["image"]."'>";
                echo "<h3><center>".$row["fullname"]."</center></h3>";
                echo "<h3><center>".$row["gender"]."</center></h3>";
                echo "<h3><center>".$row["birth"]."</center></h3>";
                echo "<h3><center>".$row["timework"]."</center></h3>";

                // echo "</div>";
                echo "</a>";
                echo "</div>";
                $a=$a+1;
            }
            
             echo "</div>";  
             echo "</div>";
            // echo "<div><b></t> $a products have been found... </b></div><br>";  
        }else{
                // echo "<div class='containter'>";
                // echo "<div class='row'>";
                echo "No results to search";
                echo"Location: index.php";
                // echo "</div>";
                // echo "</div>";
        }
        
            mysqli_close($conn);
            ?>
            
</div>

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
