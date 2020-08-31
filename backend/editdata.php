<?php
    include('database.php');
	
    if(isset($_POST['id_edit'])) {
        $id = $_POST['id_edit'];
        $mail = $_POST['mail_edit'];
        $phone = $_POST['phone_edit'];
        $sql1 = "UPDATE users SET mail_user='$mail', phone_user='$phone' WHERE id_user = $id";
        
        $result1 = mysqli_query($conn,$sql1);
        //echo 505;
        if($result1){
            echo 505;
        }else{
            echo 500;
        }
        

    }
?>