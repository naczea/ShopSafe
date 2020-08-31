<?php
    include('database.php');

    $search = $_POST['id'];

    if(!empty($search)){
        $query = "SELECT * FROM store WHERE id_store = $search";
        $result = mysqli_query($conn,$query);
        if(!$result) {
            die('Query Failed'. mysqli_error($conn));
        } 
        
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'name_store' => $row['name_store'],
                'adress_store' => $row['adress_store'],
                'type_store' => $row['type_store'],
                'horario_store' => $row['horario_store'],
                'logo_store' => base64_encode($row['logo_store'])
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring; 
    }
?>