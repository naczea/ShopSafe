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
        $pass2 = $_POST['pass2_user'];
        $pass2_cod = password_hash($pass2,PASSWORD_DEFAULT);
        

		if(ctype_alpha($name) === false){
			echo 407;	
		}else if(ctype_alpha($last) === false){
			echo 408;
		}else if(strlen($phone) != 10){
			echo 409;
		}else if($pass == "" || strlen($pass) < 8){
			echo 410;
		}else if($mail == "" || strpos($mail,"@") === false){
			echo 411;
		}else if(strlen($id) != 10 ){
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
                $query="INSERT INTO users VALUES ($id,'$name','$last','$mail',$phone,'$pass_cod','$pass2_cod',true)";
                $result=mysqli_query($conn,$query);
                //echo $pass2;
                echo 405;
                //Cedula valida
            }else{
                echo 406;
                //Cedula invalida
            }
        }
    }
?>