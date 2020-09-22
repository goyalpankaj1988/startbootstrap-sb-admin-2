<?php
require(__DIR__."/utils.php");
session_start();
// $error = false;
// echo $path = __DIR__."\..\add_user.php";
// print_r($_POST);exit;
if(isset($_SESSION['user']['token']))
{

	  $obj = new Utils();
	  $url ='/admin_api_list/add_user';
	  $data = $_POST;
	  $data['ref_id'] = $_POST['reference_hidden'];
	  $data['user_name'] =$_POST['email'];
	  $data['email_id'] =$_POST['email'];
	  $data['name'] = $data['fname'].' '.$data['lname'];
	  $token = $_SESSION['user']['token'];
	  $response = $obj->callAPI("POST",$url,json_encode($data),$token);
	  $_SESSION['msg_success'] = 'User added done successfully.';
    
}
else{
	$_SESSION['msg_error'] = 'Invalid request.';
	$path = 'login.php';
	header("Location: ".$path);
}
?>