<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Empolyee Management</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">

		  body {
		  	background-image: url(https://4.bp.blogspot.com/-BYhRb5VoMy8/WXiR9Ub_t6I/AAAAAAAAo_I/9W9UwTQjWuUREz7a-GCtqCDjXw0QR2aKQCLcBGAs/s1600/91ec5707d4718990e75934ea137f2e64.jpg);

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

if(isset($_POST["fullname"])){
	require "database-config.php";
	$target_dir = "images/";
	$target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);
	$fullname = $_POST["fullname"];
	$gender = $_POST["gender"];
	$birth = $_POST["birth"];
	$timework = $_POST["timework"];
	
	// $image = $_POST["image"];

	// Move upload file to img folder 
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

	$sql = "INSERT INTO employee(fullname, gender, birth, timework, image) VALUES('".$fullname."','".$gender."','".$birth."', '".$timework."', '".$target_file."')";

	$result = mysqli_query($conn, $sql);
	if($result){
		//echo '<h2>Add product successfully</h2>';
		header("location: account.php");
		die();
	}else{		
		echo '<h2>Can not add account with error: '.mysqli_error($conn).'</h2>';
	}
}else{
	//echo 'No product code';
}

?>
<div class="container">
<div class="logo"><h1><i class="fa fa-plus" aria-hidden="true"></i> ADD ACCOUNTS </h1></div>
	<div class="form-container">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="fullname">Full Name</label>
				<input type="text" name="fullname" id="fullname" class="form-control">
			</div>	
				
			<div class="form-group">
				<label for="gender">Gender</label>
				<input type="text" name="gender" id="gender" class="form-control">
			</div>	
				
			<div class="form-group">
				<label for="birth">Date Of Birth</label>
				<input type="text" name="birth" id="birth" class="form-control">
			</div>	
			
			<div class="form-group">
				<label for="birth">Time Work</label>
				<input type="text" name="timework" id="timework" class="form-control">
			</div>	

			<div class="form-group">
				<label for="fileToUpload">Hình Ảnh</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<img src="#" style="width: 200px" class="thumbnail" id="uploadphoto">
			</div>	
			<div class="form-group">
				<button type="submit" class="btn btn-success" id="add-btn">Add</button>
			</div>

		</form>
	</div>	
</div>	

<!-- JQuey -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function loadImage(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#uploadphoto").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    $("#fileToUpload").change(function(){
        loadImage(this);
    })
</script>
</body>
</html>