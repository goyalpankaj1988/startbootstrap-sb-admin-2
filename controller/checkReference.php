<?php
require(__DIR__."/utils.php");
session_start();
$reference_result = array();
$obj = new Utils();
$url ='/api_list/fetch_user';
$data['refernce_name'] = $_POST['refernce_name'];

$token = $_SESSION['user']['token'];
$response = $obj->callAPI("POST",$url,json_encode($data),$token);
if($response['code'] == 200)
{
	$result = json_decode($response['result'],true);
	foreach ($result as $key => $value) {
		$reference_result[$data['refernce_name']]['name'] = $value['name'];
		$reference_result[$data['refernce_name']]['id'] = $value['_id'];
		
	}
}
else
{
	$reference_result = array();
}
echo(json_encode($reference_result));

?>