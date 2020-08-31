<?php
    header('Access-Control-Allow-Origin: *');
    include('database.php');
    include('evento.php');
    
    $id = $_POST['ci'];
    $pass = $_POST['numberf'];

    session_name('calendario2');
    session_start();
    


    $query = "SELECT * FROM store WHERE id_store = $id";
    $result = mysqli_query($conn,$query);
    $show = $result ->fetch_assoc();

    if($result ->num_rows === 0){
        echo 
        '<script languaje= "javascript"> 
            alert("Usuario no encontrado");
            window.location.href="https://localhost/ShopSafe-master2/";
        </script>';
    }else{
        $passcod = $show['pass_store'];
        $verf = password_verify($pass,$passcod);
        if($verf){
            $_SESSION['id'] = $show['id_store'];
            //$idstore = $show['name_user'];
            $_SESSION['nombre'] = $show['name_store'];
            //$apellido = $show['mail.store'];
            $_SESSION['dir'] = $show['adress_store'];
            //$cedula  = $show['description_store'];
            $_SESSION['horario'] = $show['horario_store'];
            $_SESSION['mail'] = $show['mail_store'];
            $_SESSION['aforo'] = $show['aforo_store'];
            //$correo = $show['aforo_store'];
            header("Location:admin.php");
        }else{
            echo 
            '<script languaje= "javascript"> 
                alert("Contraseña incorrecta");
                window.location.href="https://localhost/ShopSafe-master2/"; 
            </script>';
        }
    }
    mysqli_close($conn);
    
?>