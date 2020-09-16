<?php
require(__DIR__."/utils.php");
session_start();
$user_result = false;
if(isset($_SESSION['user']['token']))
{

	  $obj = new Utils();
	  $url ='/admin_api_list/search_user';
	  $data['refernce_name'] = $_POST['user_name'];
	  
	  $token = $_SESSION['user']['token'];
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