<?php
    include('database.php');
    
    $id = $_POST['ci'];
    $pass = $_POST['numberf'];

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
            $name_u = $show['name_user'];
            $last_u = $show['last_user'];
            $ced_u = $show['id_user'];
            $mail_u = $show['mail_user'];
            $phone_u = $show['phone_user'];
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

<!DOCTYPE html>
<html lang="es">

<head>
    <title>ShopSafe | Bienvenido</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Nicolás Correa | naczea">
    <meta name="description" content="ShopSafe - Webpage | Compra o reserva turno seguro desde casa.">
    <link rel="shortcut icon" href="shopsafe.ico" type="image/x-icon">

    <!--STYLES-->
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--FONT-->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,500,600,700,800&display=swap&subset=latin-ext" rel="stylesheet">

    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <header id="shome2">
        <nav class="navbar2">
            <img src="../img/logo.png" alt="logo" class="logoshop">
            <span>ShopSafe</span>
        </nav>
    </header>

    <main class="actions">
        <div class="info">
            <div class="info__personal">
                <div class="personal__img">
                    <img src="../img/user-icon.jpg" alt="users icon">
                </div>
                <div class="personal__data">
                    <i class="fas fa-edit"></i>
                    <span>DATOS PERSONALES</span>
                    <ul>
                        <li>Nombre: <?php echo $name_u; ?></li>
                        <li>Cedula: <?php echo $ced_u; ?> </li>
                        <li>Telefono: <?php echo $phone_u; ?> </li>
                        <li>Correo: <?php echo $mail_u; ?> </li>
                    </ul>
                </div>
            </div>
            <div class="info__activities">
                <div class="activities__nav">
                    <i class="fas fa-edit"></i>
                    <span>ACTIVIDAD RECIENTE</span>
                </div>
                <div class="activities__turn">
                    <span>Turnos: No tienes turnos pendientes</span>
                </div>
                <div class="activities__shop">
                    <span>Compras: No tienes compras pendientes</span>
                </div>
            </div>
        </div>

        <div class="op">
            <div class="op__shop">
                <span>Compra productos</span>
                <img src="" alt="e-comercer illustration">
                <a href="#">Comprar</a>

            </div>
            <div class="op__turn">
                <span>Saca un turno</span>
                <img src="" alt="turns illustartion">
                <a href="#">Reserva</a>

            </div>
        </div>

    </main>

    <footer>
        <div class="footer__logo">
            <div class="logo1">
                <img src="../img/logo.png" alt="logo" class="logoshop">
                <span>ShopSafe</span>
            </div>
            <div class="logo2">
                <img src="../img/naczea.png" alt="naczea-logo">
                <span>naczea</span>
            </div>
        </div>
        <div class="footer__terms">
            <a href="#">¿Quieres publicitar tu negocio?</a>
            <a href="#">Donaciones a creadores</a>
            <a href="#">Contácto y Ayuda</a>
            <a href="#">Términos y Condiciones</a>
        </div>
        <div class="footer__datas">
            <div>
                <div class="datas__icon">
                    <i class="fas fa-envelope-square"></i>
                    <i class="fas fa-phone-square-alt"></i>
                </div>
                <div class="datas__txt">
                    <span>shopsafe_uio@gmail.com</span>
                    <span>0987635011</span>
                </div>
            </div>
            <span class="datas__copy"> &#169; naczea - 2020 | Some Rights Reserved.</span>
        </div>
        <div class="footer__nets">
            <span>Redes Sociales</span>
            <div>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://github.com/naczea/ShopSafe" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://api.whatsapp.com/send?phone=593987635011" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:shopsafe_uio@gmail.com" target="_blank"><i class="fas fa-envelope" data-aos="zoom-in-right" data-aos-duration="2100"></i></a>
            </div>
        </div>
    </footer>
    <!-- SCRIPTS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/187afea212.js" crossorigin="anonymous"></script>
    <script src="../src/main.js"></script>
</body>
</html>