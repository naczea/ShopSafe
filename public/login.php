<?php
    $conn = mysqli_connect("127.0.0.1","root","","shopsafe_db");

    $nombre = $_POST['namef'];
    $clave = $_POST['numberf'];


    $sql1 = "SELECT pass_user FROM users WHERE id_user = $nombre";
    $resultado = mysqli_query($conn,$sql1);

    $mostrar = $resultado ->fetch_assoc();
    if($resultado ->num_rows === 0){
        echo "Cedula incorrecta";
    }else{
        $calvecod = $mostrar['pass_user'];
        $verificacion = password_verify($clave,$calvecod);
        if($verificacion){
            header("Location: http://localhost/ShopSafe/public/principal.html");
        }else{
            echo "clave incorrecta";
        }
    }

    mysqli_close($conn);
?>