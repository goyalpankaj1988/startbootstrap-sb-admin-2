<?php
require("utils.php");

$obj = new Utils();
$url ='/login';

$data = array('username'=>$_POST['email'],'password'=>$_POST['password']);
$response = $obj->callAPI("POST",$url,json_encode($data));
$resultarr = (array) json_decode($response['result']);

$message = 'login successful';
switch($response['code'])
{
	case '200':
		
		if(isset($resultarr['jwt_toket']) && !empty($resultarr['jwt_toket']) && !is_null($resultarr['jwt_toket']))
		{
			session_start();
			$_SESSION['user']['name'] = $resultarr['name'];
			$_SESSION['user']['role'] = $resultarr['role'];

			$_SESSION['user']['token'] = $resultarr['jwt_toket'];
			$path = '../user_list.php';
		}
		break;	
	case '424':
	default:
		if(isset($resultarr['error']))
		{
			if(!empty($resultarr['error']))
			{
				$message = $resultarr['error'];
			}

		}
		$path = 'login.php';




}
header("Location: ".$path);

?>