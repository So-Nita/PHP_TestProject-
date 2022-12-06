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
 
$deleteModel = new parentModel($db);
$id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : "";
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($id)) {
	if($deleteModel->delete('tax',$id)){    
		http_response_code(200); 
		echo json_encode(array("message" => "Tax was deleted."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to delete tax."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to delete tax. Data is incomplete."));
}
?>