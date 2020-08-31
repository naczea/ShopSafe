<?php 
    include('database.php');
    $ced = $_POST['id_c'];
    
    $sql1 = "DELETE FROM users WHERE id_user=$ced";
    $sql2 = "DELETE FROM turn WHERE id_user=$ced";

    $result = mysqli_query($conn,$sql1);
    $result2 = mysqli_query($conn,$sql2);

    if($result && $result2){
        echo 1;
    }else{
        echo 2;
    }

?> 