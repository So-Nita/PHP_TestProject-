<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../db/database.php';
    include_once '../class/classes.php';

    $database = new Database();
    $db = $database->getConnect();

    $Item = new Items($db);
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->name) && !empty($data->price) && !empty($data->discount) && !empty($data->tax)){
        $Item->name = $data->name;
        $Item->price = $data->price;
        $Item->discount = $data->discount;
        $Item->tax = $data->tax;

        if($Item->create()){
            http_response_code(201);
            echo json_encode(array("message" => "Item was created."));
        }else{
            http_response_code(503);
            echo json_encode(array("mesage"=>"Item cannot create."));
        }
    }
?>