<?php 
  include 'database-config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Account</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/b-1.4.2/r-2.2.0/datatables.min.css"/>
	<style type="text/css">
		.form-container{
			max-width: 400px;
			margin: 40px auto;
		}
		#add-btn{
			width: 100%;
		}
		img{
			width: 100px;
		}
		body{
			background-image: url(https://hinhnenhd.net/wp-content/uploads/2018/01/hinh-anh-bien-dep-full-hd-45.jpg);
		}
	
	</style>
</head>
<body>
	<input type="button" value="Back" onclick="window.location.href='index.php'" />

<?php
require "database-config.php";

$sql = "SELECT * FROM employee";

$result = mysqli_query($conn, $sql);

if(!$result){
	die('Can\'t not query data');
}



if (mysqli_num_rows($result) > 0) {

	// Xuất tiều đề bảng
?>
	<!-- MÃ HTML -->
	<div class="container"></div>
	<a href="addAccount.php" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i>Add Account</a>
	<table class="table table-bordered table-striped" id="account-table">
		<thead>
			<tr>
				<th>Image</th>
				<th>ID</th> 
				<th data-priority="1">Fullname</th>
				<th>Gender</th>
				<th>Birth</th>
				<th>Time</th>
				<th data-priority="2">Option</th>
			</tr>
		</thead>
		<tbody>
	

	<!-- Hết mã HTML -->
<?php

    // Xuất các dòng dữ liệu
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<tr>";
    		echo '<td><img src="' . $row['image'].'"></td>'; 
       	 	echo "<td>" . $row["id"]."</td>"; 
        	echo "<td>" . $row["fullname"]."</td>";
        	echo "<td>" . $row["gender"]."</td>";
        	echo "<td>" . $row["birth"]."</td>";
        	echo "<td>" . $row["timework"]."</td>";
        	echo "<td>";
        	echo '<a class="btn btn-info" href="viewAccount.php?id='.$row["id"].'"><span class="glyphicon glyphicon-eye-open"</span>
        	</a> ';
        	
        	echo '<a class="btn btn-warning" href="updateAccount.php?id='.$row["id"].'"><span class="glyphicon glyphicon-pencil"</span>
        	</a> ';
        
        	echo '<a class="btn btn-danger" href="deleteAccount.php?id='.$row["id"].'"><span class="glyphicon glyphicon-trash"</span>
        	</a>';
        	
        echo "</td>";
        echo "</tr>";

    }

?>
<!-- Mã HTML -->
		</tbody>
	</table>	

<!-- Hết mã HTML -->
<?php    
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/b-1.4.2/r-2.2.0/datatables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#account-table').DataTable({
				responsive: true,
				autoWidth: false,

			});
		})
	
</script>
<!-- My Script -->
	<script type="text/javascript" src="script.js"></script>
</body>
</html>
