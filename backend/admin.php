<?php
include('database.php');
//include('evento.php');
//include('login.php');
session_name('calendario2');
session_start();
$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$direccion = $_SESSION['dir'];
$correo = $_SESSION['mail'];
$horario = $_SESSION['horario'];
$aforo = $_SESSION['aforo'];
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
                    <input type="text" id="fecha_ev" name="fechaEvento" readonly> <br/>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label>Titulo:</label> 
                            <input type="text" id="titulo_ev" name="tituloEvento" class="form-control" placeholder="Titulo de la cita" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hora: </label> 
                            <input type="time" id="hora_ev" name="horaEvento" class="form-control" placeholder="hh:mm:ss" readonly> <br/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--
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
    -->
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
    <!-- ----------------------SUGENERENCIAS-->

    <div class="sugui" id="sugui2">
        <div class="sugui__cont">
            <span>Buzón de Sugerencias</span>
            <div class="ch__bord"></div>
            <div class="cont__sugui">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdliPzEPJrE_hrS3JCSkOhU7PUuJ0Qtj8mykaxdX3p-CR1wew/viewform?embedded=true" width="640" height="402" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
            </div>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('sugui2'), mostrar('checkout2'), mostrar('Web')">Cerrar</a>
        </div>
        
    </div>

    <!-- ----------------------ENCUESTA-->

    <div class="formui" id="formui2">
        <div class="formui__cont">
            <span>Encuesta de Calidad</span>
            <div class="ch__bord"></div>
            <div class="cont__formui">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSegNvkFG79DudjLbGfo9eJJxz6nvSTNfbrIPuaZ3UbCi5-SWA/viewform?embedded=true" width="700" height="520" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
            </div>
            <div class="ch__bord"></div>
            <a href="#" onclick="ocultar('formui2'), mostrar('checkout2'), mostrar('Web')">Cerrar</a>
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
                <a href="#" id="checkout2" onclick="nueva3()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </nav>
    </header>

<!-- **************************INFORMACION ****************************************-->
    <main class="actions" id="main_principal">
        <div class="info2">
            <div class="info__personal">
                <div class="cont">
                    <div class="personal">
                        <div class="personal__img">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="personal__data">
                            <span>Información</span>
                            <ul>
                                <li>Local: <?php echo $nombre; ?></li>
                                <li>RUC: <?php echo $id; ?></li>
                                <li>Mail: <?php echo $correo; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info__que">
                <div class="cont__que">
                    <h2>Mas Opciones</h2>
                    <a href="#" id="p102" onclick="mostrar('sugui2'), ocultar('checkout2'), ocultar('Web')">Sugerencias y Recomendaciones</a>
                    <a href="#" id="p103" onclick="mostrar('formui2'), ocultar('checkout2'), ocultar('Web')">Encuestas y formularios</a>
                </div>
            </div>
        </div>

<!-- ******************  OPCIONES *************************************** -->
        <div class="op">

<!--------------------------TURNOS ---------------TURNOS---------TURNOS----------------->

            <div class="op__turn2">
                <div class="cont__turn" id="turncont__general">

<!--********************** CONTENEDOR 1-->
                    <div class="cont1" id="turn__cont1">
                        <div class="cont1">
                            <div class="cont1__cont">
                                <div class="container">
                                    <div class="row">
                                    <div class="col"></div>
                                    <div class="col-7"><div id="Web"></div></div>
                                    <div class="col"></div>
                                    <div class="botons">    
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