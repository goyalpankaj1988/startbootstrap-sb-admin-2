<?php
require(__DIR__."/utils.php");
session_start();
$error = true;
$obj = new Utils();
$url ='/api_list/validate_email';
$data['user_email'] = $_POST['user_email'];

$token = '';
$user_result = false;
$response = $obj->callAPI("POST",$url,json_encode($data),$token);
if($response['code'] == 200)
{
	$result = json_decode($response['result'],true);
	if(count($result) == 0 && !isset($result[0]['_id']))
	  	{

	  		$user_result = true;
	  		
	  		$error = false;
	  	}
	  	else
	  	{
	  		$error = false;
	  	}
}
else
{
	$error = true;
}
$responsearr = array();
$responsearr['available'] = $user_result;
$responsearr['error'] = $error;
echo(json_encode($responsearr));

?>