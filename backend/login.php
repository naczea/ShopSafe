<?php
    include('database.php');
    
    if(isset($_GET['id_user'])) {

        $id = $_GET['id_user'];
        $pass = $_GET['pass_user'];

        $query = "SELECT pass_user FROM users WHERE id_user = $id";
        $result = mysqli_query($conn,$query);
        $show = $result ->fetch_assoc();

        if($result ->num_rows === 0){
            echo false;
        }else{
            $passcod = $show['pass_user'];
            $verf = password_verify($pass,$passcod);
            if($verf){
                echo true;
            }else{
                echo false;
            }
        }
    }
    mysqli_close($conn);
?>