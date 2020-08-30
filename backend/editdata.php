<?php
    include('database.php');
	
    if(isset($_POST['id_edit'])) {
        $id = $_POST['id_edit'];
        $mail = $_POST['mail_edit'];
        $phone = $_POST['phone_edit'];
        $sql1 = "UPDATE users SET mail_user=$mail WHERE id_user = $id";
        $sql2 = "UPDATE users SET phone_user=$phone WHERE id_user = $id";
        
        $result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);

        if(!$result1 || !$result2) {
            die('Query Failed'. mysqli_error($conn));
            echo 500;
        }else{
            echo 505;
        }

        mysqli_close($conn);
    }
?>