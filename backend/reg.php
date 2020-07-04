<?php

    $conn = mysqli_connect("127.0.0.1","root","","shopsafe_db");

    $nombre = $_POST['namef'];
    $apellido = $_POST['secondf'];
    $cedula = intval ($_POST['cif']);
    $correo = $_POST['mailf'];
    $telefono = $_POST['numberf'];
    $contrasena = $_POST['passwf'];
    $passcod = password_hash($contrasena,PASSWORD_DEFAULT);
    
    $result=mysqli_query($conn,"INSERT INTO users VALUES ($cedula,'$nombre','$apellido','$correo',$telefono,'$passcod',true)");

    if(!$result){
        echo"No se registro";
    }else{
        echo "Se registro excitosamente";
    }

    mysqli_close($conn);
    
    header("Location: http://localhost/ShopSafe/index.html");
?>