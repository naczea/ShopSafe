<?php
    include('database.php');
    date_default_timezone_set('America/Guayaquil');
    $fecha = getdate();
    if($fecha['mon'] < 10){
        $fecha['mon'] = "0".$fecha['mon'];
    }
    $sql = new PDO('mysql: host=127.0.0.1; dbname=shopsafe_db; charset=UTF8','root','');
    $accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
    switch($accion){
        case 'agregar':
            $valA1 = rand(1,10);
            $valA2 = rand(1,10);
            $valA3 = chr(rand(ord('A'),ord('Z')));
            $valA4 = chr(rand(ord('A'),ord('Z')));
            $fecha1= $_POST['start'];
            $idstore = $_POST['id_s'];
            $ced = $_POST['id_c'];
            $top = 17;
            $end = $ced%100;
            $union1 = $top.$valA1.$valA2.$valA3.$valA4.$end;
            $sql1 = "SELECT * FROM store WHERE id_store=$idstore";
            $result = mysqli_query($conn,$sql1);
            $show = $result->fetch_assoc();
            $sep = explode("-",$show['horario_store']);
            $val = explode("-",$fecha1);
            $val = explode("-",$fecha1);
            $val2 = explode(" ",$fecha1);
            $val3 = explode(":",$val2[1]);
            $val4 = explode(":",$sep[0]);
                if($val4[1] == 0){
                        $horarioval="30";
                    }else{
                        $horarioval="00";
                    }
                    if($val3[1] <= 30){
                        $val3[1]=$horarioval;
                    }else{
                        $val3[0]=$val3[0]+1;
                        $val3[1]=$horarioval;
                    }
            $fechanueva=$val2[0]." ".$val3[0].":".$val3[1].":".$val3[2];
            $sentencia2 = $sql ->prepare('SELECT * FROM turn WHERE start=:star AND id_store=:id_store');
            $sentencia2 ->execute(array("star"=>$fechanueva,"id_store"=>$idstore));
            $resultado2 = $sentencia2 ->fetchAll(PDO::FETCH_ASSOC);
            $filas = $sentencia2->rowCount();
            $sql4 = "SELECT * FROM turn WHERE id_turn=$union1";
            $result6 = mysqli_query($conn,$sql4);
            while ($result6){
                $valA1 = rand(1,10);
                $valA2 = rand(1,10);
                $valA3 = chr(rand(ord('A'),ord('Z')));
                $valA4 = chr(rand(ord('A'),ord('Z')));
                $top = 17;
                $end = $ced%100;
                $union1 = $top.$valA1.$valA2.$valA3.$valA4.$end;
                $sql4 = "SELECT * FROM turn WHERE id_turn=$union1";
                $result6 = mysqli_query($conn,$sql4);
            }
            if($val[0] < $fecha['year'] ){
                echo 1;
            }else{
                if($val[1] < $fecha['mon'] && $val[0] == $fecha['year']){
                    echo 1;
                }else{
                    if(($val[2] >= $fecha['mday'] && $val[1] >= $fecha['mon']) || ($val[2] < $fecha['mday'] && $val[1] > $fecha['mon'] && $val[0] >= $fecha['year'])|| ($val[0] > $fecha['year'] )){
                        $sql1 = "SELECT * FROM store WHERE id_store=$idstore";
                        $result = mysqli_query($conn,$sql1);
                        $show = $result->fetch_assoc();
                        $sep = explode("-",$show['horario_store']);
                        $aforo = ($show['aforo_store']* 2) / 5;
                        if($val2[1] >= $sep[0] && $val2[1] <= $sep[1]){
                            if($filas < $aforo){
                                $val3 = explode(":",$val2[1]);
                                $val4 = explode(":",$sep[0]);
                                if($val4[1] == 0){
                                    $horarioval="30";
                                }else{
                                    $horarioval="00";
                                }
                                if($val3[1] <= 30){
                                    $val3[1]=$horarioval;
                                }else{
                                    $val3[0]=$val3[0]+1;
                                    $val3[1]=$horarioval;
                                }
                                if(!$result6){
                                    $fechanueva=$val2[0]." ".$val3[0].":".$val3[1].":".$val3[2];
                                    $sentencia = $sql->prepare("INSERT INTO turn (id_turn,id_user,id_store,title,descripcion,start,end,color,texColor) 
                                    VALUES (:id_turn,:id_user,:id_store,:title,:descripcion,:start,:end,:color,:texColor)");
                                    $respuesta = $sentencia ->execute(array(
                                        "id_turn" =>$union1,
                                        "id_user" =>$_POST['id_c'],
                                        "id_store" =>$_POST['id_s'],
                                        "title" =>$_POST['title'],
                                        "descripcion" =>$_POST['descripcion'],
                                        "start" =>$fechanueva,
                                        "end" =>$fechanueva,
                                        "color" =>$_POST['color'],
                                        "texColor" =>$_POST['textColor']
                                    ));
                                    //echo $filas;
                                    echo 2;
                                }
                            }else{
                                echo 8;
                            }
                        }else{
                            echo 7;
                        }
                        
                    }else{
                            echo 1;
                        }
                    }
                }  
            
            //echo json_encode($respuesta);
        break;
        case 'eliminar':
            $ced = $_POST['id_c'];
            $id_turno = $_POST['idc'];
            $sql1 = "SELECT * FROM turn WHERE id_turn=$id_turno";
            $result = mysqli_query($conn,$sql1);
            $show = $result ->fetch_assoc();
            if($ced == $show['id_user']){
                $respuesta =false;
                if(isset($_POST['id_c'])){
                    $sentencia = $sql->prepare("DELETE FROM turn WHERE id_turn=:ID");
                    $respuesta = $sentencia->execute(array("ID" =>$_POST['idc']));
                }
                echo 4;
            }else{
                echo 3;
            }
            
        break;
        case 'modificar':
            $fecha1= $_POST['start'];
            $val2 = explode(" ",$fecha1);
            $ced = $_POST['id_c'];
            $horario = $_POST['start'];
            $id_turno = $_POST['idc'];
            $idstore = $_POST['id_s'];
            $sql2 = "SELECT * FROM store WHERE id_store=$idstore";
            $result1 = mysqli_query($conn,$sql2);
            $show1 = $result1->fetch_assoc();
            $sep = explode("-",$show1['horario_store']);
            $sql1 = "SELECT * FROM turn WHERE id_turn=$id_turno";
            $result = mysqli_query($conn,$sql1);
            $show = $result->fetch_assoc();
            $val2 = explode(" ",$fecha1);
            $val3 = explode(":",$val2[1]);
            $val4 = explode(":",$sep[0]);
            if($val4[1] == 0){
                $horarioval="30";
            }else{
                $horarioval="00";
            }
            if($val3[1] <= 30){
                $val3[1]=$horarioval;
            }else{
                $val3[0]=$val3[0]+1;
                $val3[1]=$horarioval;
            }
            $fechanueva=$val2[0]." ".$val3[0].":".$val3[1].":".$val3[2];
            if($ced == $show['id_user']){
                if($val2[1]>= $sep[0] && $val2[1] <= $sep[1]){
                    $sentencia = $sql ->prepare("UPDATE turn SET title=:title, descripcion=:descripcion, start=:start, end=:end, color=:color,texColor=:texColor WHERE id_turn=:id_turn");
                    $respuesta = $sentencia->execute(array(
                        "id_turn" =>$_POST['idc'],
                        "title" =>$_POST['title'],
                        "descripcion" =>$_POST['descripcion'],
                        "start" =>$fechanueva,
                        "end" =>$fechanueva,
                        "color" =>$_POST['color'],
                        "texColor" =>$_POST['textColor']
                    ));
                    //echo json_encode($respuesta);
                    echo 5;
                }else{ 
                    echo 7;
                }
                
            }else{ 
                echo 6;
            } 
        break;
        default:
            $setencia = $sql ->prepare('SELECT * FROM turn');
            $setencia ->execute();
            $resultado = $setencia ->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
        break;
    }

?>