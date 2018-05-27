<?php   session_start();  ?>
<html>
<style type="text/css">

 

       .login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}

.form{
            max-width: 700px;
            margin: 40px auto;
            width:300px;
            height: auto;
            background-color:  rgba(247, 247, 247, .5);
            box-shadow: 1px 2px 4px rgba(0 ,0 ,0 ,0.5),
                        1px 2px 4px rgba(0 , 0 , 0,0.3),
                        1px 2px 4px rgba(0 , 0 , 0,0.1);
            border-radius: 5px;
            margin: 0px auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 40px;
        
       }

.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: red;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: red;
  text-decoration: none;
}
.form .register-form {
  display: none;
}

body {
  background-image: url(http://giaoduc.net.vn/Uploaded/ngoctan/2012_04_04/anh_nen_HD_9_giaoduc.net.vn.jpg);

  background-size: cover;
  background-repeat: no-repeat;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>
<!-- Fontawesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<body>
<input type="button" value="Back" onclick="window.location.href='index.php'" />

<?php
// insert code PHP here
  
  
    if( (isset( $_SESSION['login_status'])) && ($_SESSION['login_status'] == "ready")) {
        // header("Location:index.php");
        echo "<script>location='index.php'</script>";
    }

$sErr= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset( $_POST["login"]) ) {
    $_user = $_POST['nA'];
    $_pass = $_POST['nB'];
    // kiểm tra user
require 'database-config.php';
$sql = "SELECT * from admin";
$result = mysqli_query($conn, $sql);
if(!$result){
  die( "Can't query data".mysqli_error($conn) );
}

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
      $id= $row["id"];
      $user = $row["username"];
      $pass = $row["password"];

      if( $_user == $user && $_pass == $pass ){
        $_SESSION["id"]= $id;
        $_SESSION["login_status"]= "ready";
        $_SESSION["name"]= $user;
        echo "<script>location='index.php'</script>";
    }
    
      }
} 

mysqli_close($conn);
//end kiem tra
    
    if( $_user == "Khang" && $_pass == "khang123" ){
        $_SESSION["login_status"]= "ready";
         $_SESSION["name"]= "Khang Nguyễn";
        // header("Location:finalproject_admin/products.php");
        echo "<script>location='index.php'</script>";
    }
    else{
        $sErr= "Username hoặc Password bị sai hoặc chưa tồn tại.";
    }
   
  }
} // end if isset
?>
                        <!-- <div class="container">
                <div class="form-container">  
                   <form action="login_form.php" method="post" >
                   <table >
                    <h2 style="text-align: center;"><i class="fa fa-user" aria-hidden="true" style="color: red;"></i> LOG IN</h2>

                    <tr><td> UserName </td><td><input type="text" name="nA" placeholder="UserName"></td></tr>
                    <tr><td> PassWord </td><td><input type="password" name="nB"></td></tr>
                    <tr><td  colspan="2" align="center"><input type="submit" value="login" name="login" width="100%" ></td></tr>


                    </table>
                    </form>
                </div>
            </div> -->

<div class="login-page">
  <div class="form">
   <form action="login_form.php" method="post" >
    <table >
        <h2 style="text-align: center;"><i class="fa fa-user" aria-hidden="true" style="color: green;"></i> LOG IN</h2>
      <input type="text" name="nA" placeholder="Username"/>
      <input type="password" name="nB" placeholder="Password"/>
      <button name="login">login</button>
      <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
       </table>
    </form>
  </div>
</div>





<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>