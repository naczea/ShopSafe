<?php
    include('database.php');
    //include('principal.php');
    $sql = new PDO('mysql: host=127.0.0.1; dbname=shopsafe_db; charset=UTF8','root','');
   // 
    $accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
   //$id_user =$_GET['id'];
    switch($accion){
        case 'agregar':
            
            $sentencia = $sql->prepare("INSERT INTO turn (id_turn,id_user,id_store,title,descripcion,start,end,color,texColor) 
            VALUES (:id_turn,:id_user,:id_store,:title,:descripcion,:start,:end,:color,:texColor)");
            $respuesta = $sentencia ->execute(array(
                "id_turn" =>$_POST['idc'],
                "id_user" =>$_POST['id_c'],
                "id_store" =>$_POST['id_s'],
                "title" =>$_POST['title'],
                "descripcion" =>$_POST['descripcion'],
                "start" =>$_POST['start'],
                "end" =>$_POST['end'],
                "color" =>$_POST['color'],
                "texColor" =>$_POST['textColor']
            ));
            echo json_encode($respuesta);
        break;
        case 'eliminar':
            $respuesta =false;
            if(isset($_POST['id_c'])){
                $sentencia = $sql->prepare("DELETE FROM turn WHERE id_turn=:ID");
                $respuesta = $sentencia->execute(array("ID" =>$_POST['id_c']));
            }
            echo json_encode($respuesta);
        break;
        case 'modificar':
            $sentencia = $sql ->prepare("UPDATE turn SET title=:title, descripcion=:descripcion, start=:start, end=:end, color=:color,texColor=:texColor WHERE id_turn=:id_turn");
            $respuesta = $sentencia->execute(array(
                "id_turn" =>$_POST['id_c'],
                "title" =>$_POST['title'],
                "descripcion" =>$_POST['descripcion'],
                "start" =>$_POST['start'],
                "end" =>$_POST['end'],
                "color" =>$_POST['color'],
                "texColor" =>$_POST['textColor']
            ));
            echo json_encode($respuesta);
        break;
        default:
            $setencia = $sql ->prepare('SELECT * FROM turn');
            $setencia ->execute();
            $resultado = $setencia ->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
        break;
    }

?>