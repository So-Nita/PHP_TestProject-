<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/databaseConnect.php';
include_once '../model/parentModel.php';

$database = new Database();
$db = $database->getConnection();
 
$items = new parentModel($db);

$result = $items->read('product','tax','discount');

if($result->num_rows > 0){    
    $itemRecords=array();
    $itemRecords["price_sold"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
        extract($item); 
        $itemDetails=array(
            "id" => $id,
            "name" => $name,
			"price" => $price,	
            "tax_amount" => number_format(($tax/100)*$price, 2, '.', ','),
            "discount_amount" => number_format(($discount/100)*$price, 2, '.', ','),
            "price_sale_exclusively" => $price,
            "price_sale_inclusively" => $price+number_format(($tax/100)*$price, 2, '.', ',')-number_format(($discount/100)*$price, 2, '.', ',')
        ); 
       array_push($itemRecords["price_sold"], $itemDetails);
    }    
    http_response_code(200);     
    echo json_encode($itemRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No price_sold found.")
    );
} 