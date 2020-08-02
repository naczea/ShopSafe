<?php
    header('Access-Control-Allow-Origin: *');
    include('database.php');
    include('evento.php');
    
    $id = $_POST['ci'];
    $pass = $_POST['numberf'];

    session_name('calendario');
    session_start();
    


    $query = "SELECT * FROM users WHERE id_user = $id";
    $result = mysqli_query($conn,$query);
    $show = $result ->fetch_assoc();

    if($result ->num_rows === 0){
        echo 
        '<script languaje= "javascript"> 
            alert("Usuario no encontrado");
            window.location.href="https://localhost/ShopSafe/";
        </script>';
    }else{
        $passcod = $show['pass_user'];
        $verf = password_verify($pass,$passcod);
        if($verf){
            $_SESSION['nombre'] = $show['name_user'];
            $nombre = $show['name_user'];
            $_SESSION['apellido'] = $show['last_user'];
            $apellido = $show['last_user'];
            $_SESSION['cedula'] = $show['id_user'];
            $cedula  = $show['id_user'];
            $_SESSION['mail'] = $show['mail_user'];
            $correo = $show['mail_user'];
            $_SESSION['telefono'] = $show['phone_user'];
            $telefono  = $show['phone_user'];
            header("Location:principal.php");
        }else{
            echo 
            '<script languaje= "javascript"> 
                alert("Contraseña incorrecta");
                window.location.href="https://localhost/ShopSafe/"; 
            </script>';
        }
    }
    mysqli_close($conn);
    
?>