<?php
    include('database.php');
    //include('evento.php');
    //include('login.php');
    session_name('calendario');
    session_start();
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $cedula = $_SESSION['cedula'];
    $correo = $_SESSION['mail'];
    $telefono = $_SESSION['telefono'];

    $sql = "SELECT * FROM turn WHERE id_user=$cedula";
    $result = mysqli_query($conn,$sql);
    $show = $result ->fetch_assoc();
    if($result ->num_rows === 0){
        $mensaje = "Usted no tiene turnos agendados";
    }else{
        $filas  =mysqli_num_rows($result)-1;
        $sql2 = "SELECT * FROM turn WHERE id_user=$cedula LIMIT $filas,1";
        $result2 = mysqli_query($conn,$sql2);
        //$filas = mysqli_num_rows($result2);
        $show = $result2 ->fetch_assoc();
        $store_name = $show['id_store'];
        $sql3 = "SELECT * FROM store WHERE id_store=$store_name";
        $result3 = mysqli_query($conn,$sql3);
        $show2 = $result3 ->fetch_assoc();
        //echo $show['id_store'];
        $mensaje = $show2['name_store']." ".$show['start'];
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="../src/jquery.min.js"></script>
    <script src="../src/moment.min.js"></script>
    <link rel="stylesheet" href="../assets/css/fullcalendar.min.css">
    <script src="../src/fullcalendar.min.js"></script>
    <script src="../src/es.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--FONT-->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,500,600,700,800&display=swap&subset=latin-ext" rel="stylesheet">

    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.8.2.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="ui_shop" id="uishop">
        <div class="shop__cont">
            <div class="shop__info">
                <div class="navbar__logo">
                    <img src="../img/logo.png" alt="logo" class="logoshop">
                    <h1>ShopSafe</h1>
                </div>
                <div class="datastore" id="datastore"></div>
                <div class="menu_products">
                    <div class="op_products">
                        <ul>
                            <li><a href="#" id="carnebtn"  onclick="showprod('cont_carnes','cont_frutas','cont_granos','cont_lacteos','cont_limpieza','carnebtn','frutasbtn','cerealesbtn','lacteosbtn','limpiezabtn')">Carnes</a></li>
                            <li><a href="#" id="frutasbtn" onclick="showprod('cont_frutas','cont_carnes','cont_granos','cont_lacteos','cont_limpieza','frutasbtn','carnebtn','cerealesbtn','lacteosbtn','limpiezabtn')">Frutas-Verduras</a></li>
                            <li><a href="#" id="cerealesbtn" onclick="showprod('cont_granos','cont_carnes','cont_frutas','cont_lacteos','cont_limpieza','cerealesbtn','carnebtn','frutasbtn','lacteosbtn','limpiezabtn')">Granos-Cereales</a></li>
                            <li><a href="#" id="lacteosbtn" onclick="showprod('cont_lacteos','cont_carnes','cont_granos','cont_frutas','cont_limpieza','lacteosbtn','carnebtn','cerealesbtn','frutasbtn','limpiezabtn')">Lacteos</a></li>
                            <li><a href="#" id="limpiezabtn" onclick="showprod('cont_limpieza','cont_carnes','cont_granos','cont_lacteos','cont_frutas','limpiezabtn','carnebtn','cerealesbtn','lacteosbtn','frutasbtn')">Limpieza</a></li>
                        </ul>
                    </div>
                    <div class="selec_products">
                        <a href="#" class="next">
                            <span>Continuar</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#" class="cancel" onclick="ocultar('uishop'), mostrar('turn__cont1'), mostrar('shop__cont1'), ocultar('turn__cont2'), ocultar('shop__cont2'), ocultar('shop__cont3')">
                            <span>Cerrar</span>
                            <i class="fas fa-times"></i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="shop__table">
                <div class="nav__table">
                        <a href="#" class="contnav" id="contbtn" onclick="mostrar('shoptotal')">
                            <div id="contador">0</div>
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                </div>
                <div class="totalshop" id="shoptotal">
                    <h1>Venta confirmada</h1>
                </div>
                <!--CONTENEDOR CARNES-->
                <div class="cont__prod" id="cont_carnes">
                    <div class="prod">
                        <img src="../img/database/prod/carne/Bandejas-Pechugas.png" alt="">
                        <span class="prod__title">Bandeja de Pechugas</span>
                        <span class="prod__brand">Marca: Mr. Pollo</span>
                        <span class="prod__brand">Precio: $5.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcarne1)">+</a>
                            <input type="number" id="pcarne1" min="0">
                            <a href="#" onclick="restar(pcarne1)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="c11" onclick="showcart('c11','c12'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="c12" onclick="showcart('c12','c11'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/carne/carnemolida.png" alt="">
                        <span class="prod__title">Carne Molida 2kg</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $3.20</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcarne2)">+</a>
                            <input type="number" id="pcarne2" min="0">
                            <a href="#" onclick="restar(pcarne2)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="c21" onclick="showcart('c21','c22'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="c22" onclick="showcart('c22','c21'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/carne/falda_res_1.jpg" alt="">
                        <span class="prod__title">Falda de Res 3kg</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $4.30</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcarne3)">+</a>
                            <input type="number" id="pcarne3" min="0">
                            <a href="#" onclick="restar(pcarne3)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="c31" onclick="showcart('c31','c32'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="c32" onclick="showcart('c32','c31'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/carne/pollo2.jpg" alt="">
                        <span class="prod__title">Pollo Extra Grande</span>
                        <span class="prod__brand">Marca: Mr. Pollo</span>
                        <span class="prod__brand">Precio: $8.50</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcarne4)">+</a>
                            <input type="number" id="pcarne4" min="0">
                            <a href="#" onclick="restar(pcarne4)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="c41" onclick="showcart('c41','c42'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="c42" onclick="showcart('c42','c41'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/carne/pollo2.jpg" alt="">
                        <span class="prod__title">Pollo Mediano</span>
                        <span class="prod__brand">Marca: Mr. Pollo</span>
                        <span class="prod__brand">Precio: $7.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcarne5)">+</a>
                            <input type="number" id="pcarne5" min="0">
                            <a href="#" onclick="restar(pcarne5)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="c51" onclick="showcart('c51','c52'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="c52" onclick="showcart('c52','c51'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/carne/pollo2.jpg" alt="">
                        <span class="prod__title">Pollo Pequeño</span>
                        <span class="prod__brand">Marca: Mr. Pollo</span>
                        <span class="prod__brand">Precio: $7.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcarne6)">+</a>
                            <input type="number" id="pcarne6" min="0">
                            <a href="#" onclick="restar(pcarne6)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="c61" onclick="showcart('c61','c62'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="c62" onclick="showcart('c62','c61'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                </div>
                <!--CONTENEDOR FRUTAS-->
                <div class="cont__prod" id="cont_frutas">
                    <div class="prod">
                        <img src="../img/database/prod/frutas/manzana.jpg" alt="">
                        <span class="prod__title">Manzanas Rojas 2kg</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $2.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pfruta1)">+</a>
                            <input type="number" id="pfruta1" min="0">
                            <a href="#" onclick="restar(pfruta1)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="f11" onclick="showcart('f11','f12'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="f12" onclick="showcart('f12','f11'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/frutas/platano-verde.jpg" alt="">
                        <span class="prod__title">Verde 2.5kg</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $3.25</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pfruta2)">+</a>
                            <input type="number" id="pfruta2" min="0">
                            <a href="#" onclick="restar(pfruta2)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="f21" onclick="showcart('f21','f22'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="f22" onclick="showcart('f22','f21'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/frutas/cebolla.jpeg" alt="">
                        <span class="prod__title">Cebolla 1.5kg</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $2.25</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pfruta3)">+</a>
                            <input type="number" id="pfruta3" min="0">
                            <a href="#" onclick="restar(pfruta3)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="f31" onclick="showcart('f31','f32'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="f32" onclick="showcart('f32','f31'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/frutas/unnamed.jpg" alt="">
                        <span class="prod__title">Brocoli 1kg</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $1.25</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pfruta4)">+</a>
                            <input type="number" id="pfruta4" min="0">
                            <a href="#" onclick="restar(pfruta4)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="f41" onclick="showcart('f41','f42'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="f42" onclick="showcart('f42','f41'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/frutas/tomate.jpg" alt="">
                        <span class="prod__title">Tomate 1kg</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $1.25</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pfruta5)">+</a>
                            <input type="number" id="pfruta5" min="0">
                            <a href="#" onclick="restar(pfruta5)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="f51" onclick="showcart('f51','f52'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="f52" onclick="showcart('f52','f51'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                </div>
                <!--CONTENEDOR CEREALES-->
                <div class="cont__prod" id="cont_granos">
                    <div class="prod">
                        <img src="../img/database/prod/granos/avena.jpg" alt="">
                        <span class="prod__title">Avena 400g</span>
                        <span class="prod__brand">Marca: Quaker</span>
                        <span class="prod__brand">Precio: $2.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcereal1)">+</a>
                            <input type="number" id="pcereal1" min="0">
                            <a href="#" onclick="restar(pcereal1)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="ce11" onclick="showcart('ce11','ce12'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="ce12" onclick="showcart('ce12','ce11'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/granos/chocapic.jpg" alt="">
                        <span class="prod__title">Chocapic 500g</span>
                        <span class="prod__brand">Marca: Nestle</span>
                        <span class="prod__brand">Precio: $5.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcereal2)">+</a>
                            <input type="number" id="pcereal2" min="0">
                            <a href="#" onclick="restar(pcereal2)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="ce21" onclick="showcart('ce21','ce22'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="ce22" onclick="showcart('ce22','ce21'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/granos/garbanzo.png" alt="">
                        <span class="prod__title">Garbanzo 200g</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $3.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcereal3)">+</a>
                            <input type="number" id="pcereal3" min="0">
                            <a href="#" onclick="restar(pcereal3)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="ce31" onclick="showcart('ce31','ce32'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="ce32" onclick="showcart('ce32','ce31'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/granos/granola.jpg" alt="">
                        <span class="prod__title">Granola 340g</span>
                        <span class="prod__brand">Marca: Quaker</span>
                        <span class="prod__brand">Precio: $2.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcereal4)">+</a>
                            <input type="number" id="pcereal4" min="0">
                            <a href="#" onclick="restar(pcereal4)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="ce41" onclick="showcart('ce41','ce42'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="ce42" onclick="showcart('ce42','ce41'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/granos/lenteja.png" alt="">
                        <span class="prod__title">Lenteja 230g</span>
                        <span class="prod__brand">Marca: Supermaxi</span>
                        <span class="prod__brand">Precio: $3.74</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(pcereal5)">+</a>
                            <input type="number" id="pcereal5" min="0">
                            <a href="#" onclick="restar(pcereal5)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="ce51" onclick="showcart('ce51','ce52'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="ce52" onclick="showcart('ce52','ce51'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                </div>
                <!--CONTENEDOR LACTEOS-->
                <div class="cont__prod" id="cont_lacteos">
                    <div class="prod">
                        <img src="../img/database/prod/lacteos/vitaen.png" alt="">
                        <span class="prod__title">Lecha Entera 900ml</span>
                        <span class="prod__brand">Marca: Vita</span>
                        <span class="prod__brand">Precio: $0.80</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(plac1)">+</a>
                            <input type="number" id="plac1" min="0">
                            <a href="#" onclick="restar(plac1)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="la11" onclick="showcart('la11','la12'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="la12" onclick="showcart('la12','la11'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/lacteos/vitasemi.jpg" alt="">
                        <span class="prod__title">Lecha Semi 900ml</span>
                        <span class="prod__brand">Marca: Vita</span>
                        <span class="prod__brand">Precio: $0.80</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(plac2)">+</a>
                            <input type="number" id="plac2" min="0">
                            <a href="#" onclick="restar(plac2)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="la21" onclick="showcart('la21','la22'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="la22" onclick="showcart('la22','la21'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/lacteos/queso.png" alt="">
                        <span class="prod__title">Queso Mozarella 350g</span>
                        <span class="prod__brand">Marca: Kiosko</span>
                        <span class="prod__brand">Precio: $6.20</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(plac3)">+</a>
                            <input type="number" id="plac3" min="0">
                            <a href="#" onclick="restar(plac3)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="la31" onclick="showcart('la31','la32'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="la32" onclick="showcart('la32','la31'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/lacteos/yougurt.jpg" alt="">
                        <span class="prod__title">Yougurt Fresa 3500g</span>
                        <span class="prod__brand">Marca: Dulacs</span>
                        <span class="prod__brand">Precio: $8.20</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(plac4)">+</a>
                            <input type="number" id="plac4" min="0">
                            <a href="#" onclick="restar(plac4)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="la41" onclick="showcart('la41','la42'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="la42" onclick="showcart('la42','la41'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                </div>
                <!--CONTENEDOR LIMPIEZA-->
                <div class="cont__prod" id="cont_limpieza">
                    <div class="prod">
                        <img src="../img/database/prod/limpieza/clorox.jpg" alt="">
                        <span class="prod__title">Cloro Regular</span>
                        <span class="prod__brand">Marca: Clorox</span>
                        <span class="prod__brand">Precio: $3.80</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(plim1)">+</a>
                            <input type="number" id="plim1" min="0">
                            <a href="#" onclick="restar(plim1)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="li11" onclick="showcart('li11','li12'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="li12" onclick="showcart('l12','li11'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/limpieza/deja.jpg" alt="">
                        <span class="prod__title">Deja Limon 2kg</span>
                        <span class="prod__brand">Marca: Deja</span>
                        <span class="prod__brand">Precio: $4.80</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(plim2)">+</a>
                            <input type="number" id="plim2" min="0">
                            <a href="#" onclick="restar(plim2)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="li21" onclick="showcart('li21','li22'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="li22" onclick="showcart('li22','li21'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/limpieza/colgate.jpg" alt="">
                        <span class="prod__title">Pasta Dental</span>
                        <span class="prod__brand">Marca: Colgate</span>
                        <span class="prod__brand">Precio: $2.40</span>
                        <div class="prod__number">
                            <a href="#" onclick="sumar(plim3)">+</a>
                            <input type="number" id="plim3" min="0">
                            <a href="#" onclick="restar(plim3)">-</a>
                        </div>
                        <a href="#" class="prod__add" id="li31" onclick="showcart('li31','li32'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                        <span></span>
                        <a href="#" class="prod__remove" id="li32" onclick="showcart('li32','li31'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="prod">
                        <img src="../img/database/prod/limpieza/protex.png" alt="">
                        <span class="prod__title">Jabon de manos 75g</span>
                        <span class="prod__brand">Marca: Protex</span>
                        <span class="prod__brand">Precio: $1.75</span>
                        <div class="prod__number">
                        <a href="#" onclick="sumar(plim4)">+</a>
                        <input type="number" id="plim4" min="0">
                        <a href="#" onclick="restar(plim4)">-</a>
                    </div>
                    <a href="#" class="prod__add" id="li41" onclick="showcart('li41','li42'), addcart(true)">Añadir<i class="fas fa-check-circle"></i></a>
                    <span></span>
                    <a href="#" class="prod__remove" id="li42" onclick="showcart('li42','li41'), addcart(false)">Retirar<i class="fas fa-minus-circle"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="ui__turn" id="uiturn">
        <div class="turn__cont">
            <div class="cont1">
                <div class="cont1__nav">
                    <span>Emision de turnos</span>
                </div>
                <div class="cont1__cont">
                    <div class="cont__info">
                        <div class="contenedor" id="continfo">
                            <!--INFO DEL STORE-->
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                        <div class="col"></div>
                        <div class="col-7"><div id="Web"></div></div>
                        <div class="col"></div>
                        <div class="botons">    
                            <a href="#" class="prod__close" id="c12" onclick="ocultar('uiturn'), mostrar('turn__cont1'), mostrar('shop__cont1'), ocultar('turn__cont2'), ocultar('turn__cont2'), ocultar('turn__cont4'), mostrar('checkout')">Regresar<i class="fas fa-times-circle"></i></a>
                        </div>
                    </div>
                </div>

                        <script>
                                $(document).ready(function(){
                                    $('#Web').fullCalendar({
                                        header:{
                                            left:'today,prev,next',
                                            center:'title',
                                            right:'agendaDay,month'
                                        },
                                        dayClick:function(date,jsEvent,view){
                                            $('#Agendar').prop("disabled",false);
                                            $('#Modificar').prop("disabled",true);
                                            $('#Eliminar').prop("disabled",true);
                                            limpiarForm();
                                            $('#fecha_ev').val(date.format());
                                            $('#modalEventos').modal();
                                        },
                                        events:'evento.php?accion',
                                        eventClick:function(calEvent,jsEvent,view){
                                            $('#Agendar').prop("disabled",true);
                                            $('#Modificar').prop("disabled",false);
                                            $('#Eliminar').prop("disabled",false);
                                            $('#tituloEvento').html(calEvent.title);
                                            //$('#descrip_ev').val(calEvent.descripcion);
                                            $('#id_turn').val(calEvent.id_turn);
                                            $('#titulo_ev').val(calEvent.title);
                                            //$('#color_ev').val(calEvent.color);
                                            FechaHora = calEvent.start._i.split(" ");
                                            $('#fecha_ev').val(FechaHora[0]);
                                            $('#hora_ev').val(FechaHora[1]);
                                            $('#modalEventos').modal();
                                        }
                                        
                                    });
                                });
                        </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloEvento"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label>Fecha: </label> 
                    <input type="text" id="fecha_ev" name="fechaEvento"> <br/>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label>Titulo:</label> 
                            <input type="text" id="titulo_ev" name="tituloEvento" class="form-control" placeholder="Titulo de la cita">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hora: </label> 
                            <input type="time" id="hora_ev" name="horaEvento" class="form-control" placeholder="hh:mm:ss"> <br/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="Agendar">Agendar</button>
                    <button type="button" class="btn btn-success" id="Modificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="Eliminar">Borrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var NuevoEvento;
        var comprobacion = false;
        var id_c="<?php echo $cedula; ?>";
        var auxiliar;
        $('#Agendar').click(function(){
            RecolectarDatos(); 
            NuevoEvento['id_c']=id_c;
            NuevoEvento['id_s']=ids;
            EnviarInfo('agregar',NuevoEvento);
        });
        $('#Modificar').click(function(){
            RecolectarDatos(); 
            NuevoEvento['id_c']=id_c;
            NuevoEvento['id_s']=ids;
            EnviarInfo('modificar',NuevoEvento);
            
        });
        $('#Eliminar').click(function(){
            RecolectarDatos(); 
            NuevoEvento['id_c']=id_c;
            NuevoEvento['id_s']=ids;
            EnviarInfo('eliminar',NuevoEvento);
            
        });
        function RecolectarDatos(){
            NuevoEvento = {
                idc:$('#id_turn').val(),
                title:$('#titulo_ev').val(),
                start:$('#fecha_ev').val()+" "+$('#hora_ev').val()+":00",
                color:"008F39",
                descripcion:"Descripcion",
                textColor:"#FFFFFF",
                end:$('#fecha_ev').val()+" "+$('#hora_ev').val()+":00"
            }; 
        }
        function EnviarInfo(accion,objEvento){
            $.ajax({
                type:'POST',
                url:'evento.php?accion='+accion,
                data:objEvento,
                success:function(msg){
                    var cadena = msg;
                    var div = cadena.split(" ");
                    if(div[0]){
                        //alert(msg);
                        if(div[0] == 1){
                            alert("Fecha pasada vuelva a ingresar");
                        }else{
                            if(div[0] == 2){
                                $('#Web').fullCalendar('refetchEvents');
                                $('#modalEventos').modal('toggle');
                                alert("Turno ingresado correctamente. Su codigo de turno es: "+div[1]);
                            }else{
                                if(div[0] == 3){
                                    alert("No es su evento");
                                }else{
                                    if(div[0] == 4){
                                        $('#Web').fullCalendar('refetchEvents');
                                        $('#modalEventos').modal('toggle');
                                        alert("Su turno a sido borrado");
                                    }else{
                                        if(div[0] == 5){
                                            $('#Web').fullCalendar('refetchEvents');
                                            $('#modalEventos').modal('toggle');
                                            alert("Su turno a sido actualizado");
                                        }else{
                                            if(div[0] == 6){
                                                alert("Este no es su turno");
                                            }else{
                                                if(div[0] == 7){
                                                    alert("Fuera de horario de la tienda");
                                                }else{
                                                    if(div[0] == 8){
                                                        alert("Turnos llenos, escoja otra hora (1 hora mas tarde)");
                                                    }else{
                                                        if(div[0] == 9){
                                                            alert("Su turno es con otra tienda");
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        
                    }else{
                        alert("ERROR");
                    }
                },
                error:function(){
                    alert("Hay un error");
                }
            })
        }
        function limpiarForm(){
            $('#id_turn').val('');
            $('#descrip_ev').val('');
            $('#titulo_ev').val('');
            $('#color_ev').val('');
            
        }
    </script>
    
    <!-- ----------------------EDIT PERSONALES-->

    <div class="peredit" id="peredit">
        <div class="peredit__cont">
            <span>Editar datos personales</span>
            <div class="ch__bord"></div>
            <div id="lol"><p></p></div>
            <div class="ch__coonf" id="ch__confirm2">
                <i class="far fa-check-circle"></i></br>
                <span>Cambios guardados</span>
            </div>
            <form id="checkform" class="checkforms">

                <label for="number">Cedula: </label>
                <input type="number" id="cededit" name="cedrf" placeholder="<?php echo $cedula ?>" required>

                <label for="email">Mail:</label>
                <input type="text" id="emailedit" name="mailf" placeholder="<?php echo $correo; ?>" required>

                <label for="number">Celular:</label>
                <input type="number" id="numberedit" name="numberf" placeholder="<?php echo $telefono; ?>" required>

                <input type="submit" class="neu3" value="Guardar Cambios" id="btnSendch" name="sendf">
                <input type="button" class="neu3 neuesp" value="Eliminar cuenta" id="btndropmain" name="sendf">
                <div class="dropop" id="drop">
                    <p>¿Desea eliminar su cuenta y todos sus turnos?</p>
                    <div class="dropbtn">
                        <a href="#" id="dropconfirm">Confirmar</a>
                        <a href="#" id="droprt">Regresar</a>
                    </div>
                </div>
            </form>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('peredit'), mostrar('checkout')">Cerrar</a>
        </div>
        
    </div>

    <script>
        var id_c="<?php echo $cedula; ?>";
        $('#dropconfirm').click(function(){
            //alert(<?php echo $cedula; ?>);
            RecolectarDatos2();
            NuevoEvento['id_c']=id_c;
            EnviarInfo2(NuevoEvento);
        });

        function RecolectarDatos2(){
            NuevoEvento = {
                }; 
        }

        function EnviarInfo2(objEvento){
            $.ajax({
                type:'POST',
                url:'eliminaruser.php',
                data:objEvento,
                success:function(msg){
                    if(msg == 1){
                        alert("Su usuario ha sido eliminado.");
                    }else{
                        alert("Error al eliminar su usuario.");
                    }
                },
                error:function(){
                    alert("Hay un error");
                }
            })
        }
    </script>

    <!-- ----------------------ACTIVIDAD RECIENTE-->
    <div class="activity" id="activityt">
        <div class="activityt__cont">
            <span>Actividad Reciente</span>
            <div class="ch__bord"></div>
            <div id="lol">
            <table>
            <tr>
                <td>Cedula</td>
                <td>Turno</td>
                <td>Tienda</td>
                <td>Titulo</td>
                <td>Fecha</td>
            </tr>
            <?php 
                $query = "SELECT * FROM turn WHERE id_user = $cedula";
                $result = mysqli_query($conn,$query);
                while($mostrar = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td>|<?php echo $mostrar['id_user'] ?>|</td>
                <td>|<?php echo $mostrar['id_turn'] ?>|</td>
                <td>|<?php echo $mostrar['id_store'] ?>|</td>
                <td>|<?php echo $mostrar['title'] ?>|</td>
                <td>|<?php echo $mostrar['start'] ?>|</td>
            </tr>
            <?php
                }
            ?>
            </table>
                            </div>
            <div class="ch__coonf" id="ch__confirm2">
                <i class="far fa-check-circle"></i></br>
                <span>Cambios guardados</span>
            </div>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('activityt')">Cerrar</a>
        </div>
        
    </div>
    <!-- ----------------------SUGENERENCIAS-->

    <div class="sugui" id="sugui">
        <div class="sugui__cont">
            <span>Buzón de Sugerencias</span>
            <div class="ch__bord"></div>
            <div class="cont__sugui">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdliPzEPJrE_hrS3JCSkOhU7PUuJ0Qtj8mykaxdX3p-CR1wew/viewform?embedded=true" width="640" height="402" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
            </div>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('sugui'), mostrar('checkout')">Cerrar</a>
        </div>
        
    </div>

    <!-- ----------------------ENCUESTA-->

    <div class="formui" id="formui">
        <div class="formui__cont">
            <span>Encuesta de Calidad</span>
            <div class="ch__bord"></div>
            <div class="cont__formui">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSegNvkFG79DudjLbGfo9eJJxz6nvSTNfbrIPuaZ3UbCi5-SWA/viewform?embedded=true" width="700" height="520" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
            </div>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('formui'), mostrar('checkout')">Cerrar</a>
        </div>
        
    </div>
    
    <!-- **************************INICIO ****************************************-->

    <header id="shome2">
        <nav class="navbar2">
            <div class="nav__logo">
                <img src="../img/logo.png" alt="logo" class="logoshop">
                <span>ShopSafe</span>
            </div>
            <div class="nav__close">
                <a href="#" id="checkout">
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
                                <li>Nombre: <?php echo $nombre; ?></li>
                                <li>Apellido: <?php echo $apellido; ?></li>
                                <li id="idpost">Cedula: <?php echo $cedula; ?></li>
                                <li>Telefono: <?php echo $telefono; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user__edit">
                        <a href="#" id="p123">
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
                            <span><?php echo $mensaje?></span>
                        </div>
                    </div>
                    <div class="act__edit">
                        <a href="#" id="p456">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="info__que">
                <div class="cont__que">
                    <h2>Mas Opciones</h2>
                    <a href="#" id="p789">Sugerencias y Recomendaciones</a>
                    <a href="#" id="p101">Encuestas y formularios</a>
                </div>
            </div>
        </div>

<!-- ******************  OPCIONES *************************************** -->
        <div class="op">

<!----------------------SHOP------------SHOP-----------------SHOP--------------------->

            <div class="op__shop">
                <div class="cont_shop" id="shopcont__general">

<!--********************** CONTENEDOR 1-->
                    <div class="cont1" id="shop__cont1" onclick="mostrar('turn__cont2'), ocultar('turn__cont1'), mostrar('shop__cont3'), ocultar('shop__cont1')">
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
<!--********************* CONTENEDOR3-->
                    <div class="cont3" id="shop__cont3">
                        <div class="store__nav">
                            <span>Seleccione un establecimiento:</span>
                        </div>
                        <div class="store__op">
                            <?php
                                include('database.php');
                                $query = "SELECT * FROM store WHERE shop_store = true";
                                $result = $conn->query($query);
                                if(!$result) {
                                    die('Query Failed'. mysqli_error($conn));
                                } 
                                while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="op">
                                <a href="#" onclick="mostrar('uishop'),  ocultar('checkout'), searchstore2(<?php echo $row['id_store']; ?>)">
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
                            <div class="op2">
                                <div>
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Mercado</span>
                                    <p>(Próximamente)</p>
                                </div>
                            </div>
                            <div class="op2">
                                <div>
                                    <i class="fas fa-cut"></i>
                                    <span>Peluqueria</span>
                                    <p>(Próximamente)</p>
                                </div>
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
                                while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="op">
                                <a href="#" onclick="mostrar('uiturn'), ocultar('checkout'), searchstore(<?php echo $row['id_store']; ?>)">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($row['logo_store']); ?>">
                                    <span><?php echo $row['name_store']; ?></span>
                                    <span>Sector: Centro de Conocoto</span>
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
            <span>¿Quieres publicitar tu negocio?</span>
            <span>Donaciones a creadores</span>
            <span>Contácto y Ayuda</span>
            <span>Términos y Condiciones</span>
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
            <span>CONTACTO</span>
            <div>
                <a href="https://github.com/naczea/ShopSafe" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://api.whatsapp.com/send?phone=593987635011" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:shopsafe_uio@gmail.com" target="_blank"><i class="fas fa-envelope" data-aos="zoom-in-right" data-aos-duration="2100"></i></a>
            </div>
        </div>
    </footer>
    <!-- SCRIPTS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/187afea212.js" crossorigin="anonymous"></script>
    <script src="../src/app3.js"></script>
    <script src="../src/app2.js"></script>
    <script src="../src/main.js"></script>
    
</body>
</html>