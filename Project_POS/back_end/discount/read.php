<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/databaseConnect.php';
include_once '../model/parentModel.php';

$database = new Database();
$db = $database->getConnection();
 
$items = new parentModel($db);

$result = $items->read('product','dicount');

if($result->num_rows > 0){    
    $itemRecords=array();
    $itemRecords["discount"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
        extract($item); 
        
        $itemDetails=array(
            'id' => $tax_id,
            'name' => $name,
            'discount' => $discount,
            "dis_amount" => number_format(($discount/100)*$price, 2, '.', ','), 
            'start_date' =>$start_date,
            'end_date' => $end_date
        ); 
       array_push($itemRecords["discount"], $itemDetails);
    }    
    http_response_code(200);     
    echo json_encode($itemRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No discount found.")
    );
} 