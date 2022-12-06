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

$insertModel = new parentModel($db);
$data = json_decode(file_get_contents("php://input"));
// $array = json_decode(json_encode($datas), true);
// $arr_data = explode("=>",$datas);
// $final_data = urldecode($arr_data[1]);
// $final_data2 = json_decode($final_data);
$datas = [
    'pro_id' => $data->pro_id,
    'tax' => $data->tax,
    'start_date' =>$data->start_date,
	'end_date' => $data->end_date
];
if($insertModel->insert($datas,'tax')){
        http_response_code(200);   
		echo json_encode(array("message" => "Tax was insert."));
	}else{    
		http_response_code(503);     
		echo json_encode(array("message" => "Unable to insert tax."));
	};

?>