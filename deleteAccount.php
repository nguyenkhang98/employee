
<?php

if(isset($_GET["id"])){
    require "database-config.php";
    $id = $_GET["id"];
    
    $sql = "DELETE FROM employee WHERE id = ".$id;

    $result = mysqli_query($conn, $sql);
    if($result){
        
        header("location: account.php");
        die();
    }else{      
        echo '<h2>Can not delete account with error: '.mysqli_error($conn).'</h2>';
    }
}else{
    echo 'No account id';
}

?>