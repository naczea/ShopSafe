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
    <link rel="shortcut icon" href="../img/shopsafe.ico" type="image/x-icon">

    <!--STYLES-->
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--FONT-->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,500,600,700,800&display=swap&subset=latin-ext" rel="stylesheet">

    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="ui__turn" id="uiturn">
        <div class="turn__cont">
            <div class="cont1">
                <div class="cont1__nav">
                    <span>Emision de turnos</span>
                </div>
                <div class="cont1__cont">
                    <div class="cont__info">
                        <div class="contenedor">
                            <p><span>Servicio:</span> MERCADO</p>
                            <p><span>Establecimiento:</span> SUPERMAXI</p>
                            <img src="../img/database/logo-supermaxi.jpg" alt="">
                            <p>Supermercado con toda clase de productos, alimentos, hogar,tecnología, ropa y muchas cosas más.</p>
                            <p><span>Ubicación:</span> Av 1 y calle 1</p>
                            <p><span>Horarios:</span> 10:00 a 18:00</p>
                        </div>
                    </div>
                    <div class="cont__actions">
                        <span>AQUI VA LA ELECCION</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header id="shome2">
        <nav class="navbar2">
            <div class="nav__logo">
                <img src="../img/logo.png" alt="logo" class="logoshop">
                <span>ShopSafe</span>
            </div>
            <div class="nav__close">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </nav>
    </header>

<!-- **************************INFORMACION ****************************************-->
    <main class="actions" id="main_principal">
        <div class="info">
            <div class="info__personal">
                <div class="cont">
                    <div class="personal">
                        <div class="personal__img">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="personal__data">
                            <span>Datos Personales</span>
                            <ul>
                                <li>Nombre: <?php echo $name_u; ?></li>
                                <li>Apellido: <?php echo $last_u; ?></li>
                                <li>Cedula: <?php echo $phone_u; ?></li>
                                <li>Telefono: <?php echo $phone_u; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user__edit">
                        <a href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="info__activities">
                <div class="cont2">
                    <div class="activities__img">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="cont__text">
                        <div class="activities__nav">
                            <span>Actividad reciente</span>
                        </div>
                        <div class="activities">
                            <span>No tienes turnos pendientes</span>
                            <span>No tienes compras pendientes</span>
                        </div>
                    </div>
                    <div class="act__edit">
                        <a href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="info__que">
                <div class="cont__que">
                    <h2>Mas Opciones</h2>
                    <a href="#">Preguntas frecuentes</a>
                    <a href="#">Sugerencias y Recomendaciones</a>
                    <a href="#">Encuestas y formularios</a>
                </div>
            </div>
        </div>

<!-- ******************  OPCIONES *************************************** -->
        <div class="op">

<!----------------------SHOP------------SHOP-----------------SHOP--------------------->

            <div class="op__shop">
                <div class="cont_shop" id="shopcont__general">

<!--********************** CONTENEDOR 1-->
                    <div class="cont1" id="shop__cont1" onclick="mostrar('turn__cont2'), ocultar('turn__cont1'), back_color('shopcont__general')">
                        <a href="#">
                            <img src="../img/online.svg" alt="e-comercer illustration">
                        </a>
                        <span>Comprar productos</span>
                    </div>
<!--********************* CONTENEDOR2-->
                    <div class="cont2" id="shop__cont2">
                        <img src="../img/online2.svg" alt="e-comercer illustration">
                        <span>Comprar productos</span>
                    </div>
                </div>
            </div>

<!--------------------------TURNOS ---------------TURNOS---------TURNOS----------------->

            <div class="op__turn">
                <div class="cont__turn" id="turncont__general">

<!--********************** CONTENEDOR 1-->
                    <div class="cont1" id="turn__cont1" onclick="mostrar('shop__cont2'), ocultar('shop__cont1'), back_color('turncont__general'), ocultar('turn__cont1'), mostrar('turn__cont3')">
                        <a href="#">
                            <img src="../img/turn.svg" alt="turns illustartion">
                        </a>
                        <span>Sacar un turno</span>
                    </div>
<!--********************* CONTENEDOR2-->
                    <div class="cont2" id="turn__cont2">
                        <img src="../img/turn2.svg" alt="turns illustartion">
                        <span>Sacar un turno</span>
                    </div>
<!--********************* CONTENEDOR3-->
                    <div class="cont3" id="turn__cont3" onclick="ocultar('turn__cont3'), mostrar('turn__cont4')">
                        <div class="turn__nav">
                            <span>Seleccione un servicio:</span>
                        </div>
                        <div class="turn__op">
                            <div class="op">
                                <a href="#">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Mercado</span>
                                </a>
                            </div>
                            <div class="op">
                                <a href="#">
                                    <i class="fas fa-cut"></i>
                                    <span>Peliqueria</span>
                                </a>
                            </div>
                            <div class="op">
                                <a href="#">
                                    <i class="fas fa-utensils"></i>
                                    <span>Restaurante</span>
                                </a>
                            </div>
                        </div>
                    </div>
<!--********************* CONTENEDOR4-->
                    <div class="cont4" id="turn__cont4">
                        <div class="turn__nav">
                            <span>Servicio: MERCADO </br> Seleccione un establecimiento:</span>
                        </div>
                        <div class="store__op">
                            <?php
                                include('database.php');
                                $query = "SELECT * FROM store WHERE turn_store = true";
                                $result = $conn->query($query);
                                if(!$result) {
                                    die('Query Failed'. mysqli_error($conn));
                                } 
                                $id = 0;
                                while($row = $result->fetch_assoc()) {
                                    $id = $id + 1;
                            ?>
                            <div class="op">
                                <a href="#<?php echo $id?>" id="<?php echo $id ?>" onclick="mostrar('uiturn')">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($row['logo_store']); ?>" alt="">
                                    <span><?php echo $row['name_store']; ?></span>
                                </a>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--*************************** FOOTER*******************************************-->

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
    <script src="../src/app2.js"></script>
    <script src="../src/main.js"></script>
</body>
</html>
