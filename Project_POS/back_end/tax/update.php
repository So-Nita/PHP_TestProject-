<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once('../config/databaseConnect.php');
include_once('../model/parentModel.php');
 
$database = new Database();
$db = $database->getConnection();

$updateModel = new parentModel($db);
$id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : "";
$data = json_decode(file_get_contents("php://input"));

$val = [
    'pro_id' => $data->pro_id,
    'tax' => $data->tax,
    'start_date' =>$data->start_date,
	'end_date' => $data->end_date,
];
if($updateModel->update($val,'tax',$id)){
        http_response_code(200);   
		echo json_encode(array("message" => "tax was updated."));
	}else{    
		http_response_code(503);     
		echo json_encode(array("message" => "tax to update items."));
	};

?>