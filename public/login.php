<?php
    $conn = mysqli_connect("127.0.0.1","root","","usuario");

    $nombre = $_POST['namef'];
    $clave = $_POST['numberf'];


    $sql1 = "SELECT Contrasena FROM registrados WHERE Cedula = $nombre";
    //$sql = "SELECT Nombres,Apellidos,Contrasena FROM registrados WHERE Cedula = $nombre AND Contrasena = '$clave'";
    $resultado = mysqli_query($conn,$sql1);

    $mostrar = $resultado ->fetch_assoc();
    if($resultado ->num_rows === 0){
        echo "Cedula incorrecta";
    }else{
        $calvecod = $mostrar['Contrasena'];
        $verificacion = password_verify($clave,$calvecod);
        if($verificacion){
            echo "Bienvenido";
        }else{
            echo "clave incorrecta";
        }
        //echo $mostrar['Nombres']." ".$mostrar['Apellidos']." ".$mostrar['Contrasena'];
    }
    
    
    /*if($resultado){
        echo $resultado;
    }else{
        echo "Usuario no registrado";
    }*/

    mysqli_close($conn);
?>