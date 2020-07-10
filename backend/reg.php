<?php
    include('database.php');
    
    if(isset($_POST['id_user'])) {
        
        $id = $_POST['id_user'];
        $name = $_POST['name_user'];
        $last = $_POST['last_user'];
        $mail = $_POST['mail_user'];
        $phone = $_POST['phone_user'];
        $pass = $_POST['pass_user'];
        $pass_cod = password_hash($pass,PASSWORD_DEFAULT);
        
        if(strlen($id) != 10 ){
            echo 406;
            //Cedula Invalida
        }else{
            $longitud = strlen($id);
            $longitudAux = $longitud - 1;
            $total = 0;

            for ($i = 0; $i < $longitud; $i = $i + 1){
                if($i%2 === 0){
                    $aux = intval(substr($id,$i,1)) * 2;
                    if($aux > 9){
                        $aux = $aux - 9;
                    } 
                    $total = $total + $aux;
                }else{
                    $total = $total +  intval(substr($id,$i,1));
                }
            }
            if ($total % 10 === 0){
                $total = 0;
            }else{
                $total = 10 - $total%10;
            }
            if($total === intval(substr($id,$longitud,$longitud))){
                $query="INSERT INTO users VALUES ($id,'$name','$last','$mail',$phone,'$pass_cod',true)";
                $result=mysqli_query($conn,$query);
                echo 405;
                //Cedula valida
            }else{
                echo 406;
                //Cedula invalida
            }
        }
    }
?>