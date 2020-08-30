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
                            <a href="#" class="prod__close" id="c12" onclick="ocultar('uiturn'), mostrar('turn__cont1'), mostrar('shop__cont1'), ocultar('turn__cont2'), ocultar('turn__cont2'), ocultar('turn__cont4')">Regresar<i class="fas fa-times-circle"></i></a>
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
                                            $('#descrip_ev').val(calEvent.descripcion);
                                            $('#id_turn').val(calEvent.id_turn);
                                            $('#titulo_ev').val(calEvent.title);
                                            $('#color_ev').val(calEvent.color);
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
                            <input type="text" id="hora_ev" name="horaEvento" class="form-control" placeholder="hh:mm:ss"> <br/>
                        </div>
                    </div>
                    <div class="form-group col-md-10">
                        <label>Descripcion: </label> 
                        <textarea id="descrip_ev" name="descripEvento" rows="3" class="form-control"></textarea> 
                    </div>
                    <label>Color: </label> 
                    <input type="color" value="#ff0000" id="color_ev" name="colorEvento"> 

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
                start:$('#fecha_ev').val()+" "+$('#hora_ev').val(),
                color:$('#color_ev').val(),
                descripcion:$('#descrip_ev').val(),
                textColor:"#FFFFFF",
                end:$('#fecha_ev').val()+" "+$('#hora_ev').val()
            }; 
        }
        function EnviarInfo(accion,objEvento){
            $.ajax({
                type:'POST',
                url:'evento.php?accion='+accion,
                data:objEvento,
                success:function(msg){
                    if(msg){
                        //alert(msg);
                        if(msg == 1){
                            alert("Fecha pasada vuelva a ingresar");
                        }else{
                            if(msg == 2){
                                $('#Web').fullCalendar('refetchEvents');
                                $('#modalEventos').modal('toggle');
                                alert("Turno ingresado correctamente");
                            }else{
                                if(msg == 3){
                                    alert("No es su evento");
                                }else{
                                    if(msg == 4){
                                        $('#Web').fullCalendar('refetchEvents');
                                        $('#modalEventos').modal('toggle');
                                        alert("Su turno a sido borrado");
                                    }else{
                                        if(msg == 5){
                                            $('#Web').fullCalendar('refetchEvents');
                                            $('#modalEventos').modal('toggle');
                                            alert("Su turno a sido actualizado");
                                        }else{
                                            if(msg == 6){
                                                alert("Este no es su turno");
                                            }else{
                                                if(msg == 7){
                                                    alert("Fuera de horario de la tienda");
                                                }else{
                                                    if(msg == 8){
                                                        alert("Turnos llenos, escoja otra hora (1 hora mas tarde)");
                                                    }else{
                                                        if(msg==9){
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
            <form id="editdatap" class="checkforms">
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
            <a href="#" onclick="ocultar('peredit')">Cerrar</a>
        </div>
        
    </div>

    <!-- ----------------------ACTIVIDAD RECIENTE-->

    <div class="activity" id="activityt">
        <div class="activityt__cont">
            <span>Actividad Reciente</span>
            <div class="ch__bord"></div>
            <div id="lol"><p></p></div>
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
            <div id="lol"><p></p></div>
            <div class="ch__coonf" id="ch__confirm2">
                <i class="far fa-check-circle"></i></br>
                <span>Cambios guardados</span>
            </div>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('sugui')">Cerrar</a>
        </div>
        
    </div>

    <!-- ----------------------ENCUESTA-->

    <div class="formui" id="formui">
        <div class="formui__cont">
            <span>Encuesta de calidad</span>
            <div class="ch__bord"></div>
            <div id="lol"><p></p></div>
            <div class="ch__coonf" id="ch__confirm2">
                <i class="far fa-check-circle"></i></br>
                <span>Cambios guardados</span>
            </div>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('formui')">Cerrar</a>
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
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="personal__data">
                            <span>Datos Personales</span>
                            <ul>
                                <li>Establecimiento: <?php echo $nombre; ?></li>
                                <li id="idpost">RUC: <?php echo $cedula; ?></li>
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
                            <span>No tiene turnos pendientes</span>
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
    <script src="../src/app.js"></script>
    <script src="../src/app2.js"></script>
    <script src="../src/main.js"></script>
    
</body>
</html>