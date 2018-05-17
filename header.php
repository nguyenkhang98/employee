<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Empolyee Management</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Empolyee Management</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
         <li>
                <?php
                  if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
            echo "<a href='signup.php' style='padding-right:0.2px'>  Đăng ký</a>
              

            ";
          }
          else{
            echo "<a>Hi ".$_SESSION["name"]."</a>";
          }
          ?>
                </li>
                <li>
                <?php
                  if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
              echo '<a href="login_form.php">Đăng nhập</a>
        ';
             }
           else{
              echo '<a href="logout.php">Logout</a>';
           }
           ?>
                </li>
      </ul>
                </div>

            </div>
        </div>
    </div>

        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive" />
                     
                    </li>


                    <li>
                        <a href="account.php"><i class="fa fa-desktop "></i>Employee</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Empolyee Account<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addAccount.php">Add</a>
                            </li>
                            <li>
                                <a href="account.php">Update</a>
                            </li>
                            <li>
                                <a href="account.php">Delete</a>
                            </li>
                        </ul>
                    </li>

                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>
                    </div>
                </div>
            </div>
                <hr />
                