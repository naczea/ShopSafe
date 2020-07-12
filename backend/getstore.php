<?php
    include('database.php');
    
    $query = "SELECT * FROM store WHERE turn_store = true";
    $result = mysqli_query($conn,$query);

    if(!$result) {
        die('Query Failed'. mysqli_error($conn));
    } 

    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'name_store' => $row['name_store']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring; 
?>