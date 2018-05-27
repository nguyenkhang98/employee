<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Honda Admin</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">

		  body {
		   background: #4568dc; /* fallback for old browsers */
 		   background: -webkit-linear-gradient(to right, #4568dc, #b06ab3); /* Chrome 10-25, Safari 5.1-6 */
  		   background: linear-gradient(to right, #4568dc, #b06ab3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
		h1{
			text-align: center;
			color: white;
		}
		.form-container{
			max-width: 400px;
			margin: 40px auto;
			width:400px;
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
		
		#add-btn{
			width: 100%
		}
	</style>


</head>
<body>
	<input type="button" value="Back" onclick="window.location.href='account.php'" />

<?php
    require 'database-config.php';
    
    if (isset($_GET['id'])){
      $idb = $_GET['id'];     
    }
    $sql = "SELECT id,fullname,gender,birth,image,timework FROM employee WHERE id = '".$idb."'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
    //Kiểm tra xem bị lỗi gì
      die("Can't query data. Error occure.".mysqli_error($conn));
    }
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='containter'>";
      echo "<div class='row'>";
    
      while($row = mysqli_fetch_assoc($result)) {
        // echo "<div class='col-lg-3 col-md-4 '>";
        echo "<a href='viewAccount.php?id=".$row["id"]."'>";
        echo "<div class='account-chitietsp thumbnail'>";
        echo "<img class='img-detail' src='".$row["image"]."'>";
        echo "<h3 class='name-detail'><center>".$row["fullname"]."</center></h3>";
        echo "<h3 class='gender-detail'><center>".$row["gender"]."</center></h3>";
        echo "<h3 class='birth'><center>".$row["birth"]."</center></h3>";
        echo "<h3 class='timework'><center>".$row["timework"]."</center></h3>";
        echo "</div>";
        echo "</a>";
        echo "<div class ='abc'>";
        
        // echo "</div>";
        
      }
      
      echo "</div>";  
      echo "</div>";
    }
      mysqli_close($conn);
      ?>

</body>
</html>