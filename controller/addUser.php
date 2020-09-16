<?php
require(__DIR__."/utils.php");
session_start();
// $error = false;
// echo $path = __DIR__."\..\add_user.php";

if(isset($_SESSION['user']['token']))
{

	  $obj = new Utils();
	  $url ='/admin_api_list/add_user';
	  $data = $_POST;
	  $data['ref_id'] = $_POST['reference_hidden'];
	  $data['user_name'] =$_POST['email'];
	  $data['email_id'] =$_POST['email'];
	  $data['name'] = $data['fname'].$data['lname'];
	  $token = $_SESSION['user']['token'];
	  $response = $obj->callAPI("POST",$url,json_encode($data),$token);
	  if($response['code'] == 200)
	  {
	  	$result = json_decode($response['result'],true);
	  	echo 'success';

	  }
	  else
	  {
	  	echo 'fail';
	  }
	  	
}
else
{
	$error = true;
	echo 'fail';

}
	  
// header("Location: ../add_user.php");

?>