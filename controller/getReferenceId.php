<?php
require(__DIR__."/utils.php");
session_start();
if(isset($_SESSION['user']['token']))
{
	$reference_result = array();
	$obj = new Utils();
	$url ='/admin_api_list/search_user';
	$data['refernce_name'] = $_POST['refernce_name'];

	$token = $_SESSION['user']['token'];
	$response = $obj->callAPI("POST",$url,json_encode($data),$token);
	if($response['code'] == 200)
	{
		$result = json_decode($response['result'],true);
		foreach ($result as $key => $value) {
			$reference_result[$value['_id']] = $value['user_name'];
			
		}
	}
	
	  
}
else
{
	$reference_result = array();
}
echo(json_encode($reference_result));

?>