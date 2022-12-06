<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../db/database.php';
    include_once '../class/classes.php';

    $database = new Database();
    $db = $database->getConnect();

    $Item = new Items($db);
    $Item->id = (isset($_GET['id'])? $_GET['id']: null);
    
    $result = $Item->read();

    if($result->num_rows>0){
        $itemRecord = array();
        $itemRecord['$Item'] = array();
        while($Item = $result->fetch_assoc()){
            extract($Item);
            $itemDetails= array(
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'tax' => $tax,
                'discount' => $discount
            );
            array_push($itemRecord['$Item'],$itemDetails);
        }
        echo json_encode($itemRecord);
    }else{
        echo ("None");
    }

?>