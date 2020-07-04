<?php
    include('database.php');
    
    if(isset($_POST['id_user'])) {
        
        $id = $_POST['id_user'];
        $name = $_POST['name_user'];
        $last = $_POST['last_user'];
        $mail = $_POST['mail_user'];
        $phone = $_POST['phone_user'];
        $pass = $_POST['pass_user'];
        $pass_cod = password_hash($pass,PASSWORD_DEFAULT);

        $query="INSERT INTO users VALUES ($id,'$name','$last','$mail',$phone,'$pass_cod',true)";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die('Query Failed.');
        }
        echo 'Usuario Registrado';
    }
?>