<?php
include_once("../model/handle_list_number.php");
include_once("../model/get_info_customer.php");

$json_data = file_get_contents('php://input');
$data = json_decode($json_data);

$list_nums = getNumberCustomers();

// return array 
$res = fil_number($data->number,$list_nums);


$json_res = json_encode($res);
header('Content-Type: application/json');

echo $json_res;
?>