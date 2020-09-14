<?php
require(__DIR__."/utils.php");
session_start();
if(isset($_SESSION['user']['token']))
{

	  $obj = new Utils();
	  $url ='/admin_api_list/add_user';
	  $data = $_POST;
	  $data['ref_id'] = '5f5cffe66fd2143a91058047';
	  $data['user_name'] =$_POST['email'];
	  $data['email_id'] =$_POST['email'];
	  $data['name'] = $data['fname'];
	  $token = $_SESSION['user']['token'];
	  $response = $obj->callAPI("POST",$url,json_encode($data),$token);
	  var_dump($response);
}


?>