<?php
if(isset($_SESSION['user']['token']))
{
	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
	}
	
	$obj = new Utils();
	$url ='/api_list/user_network';
	$data = array('id'=>$id);
	$token = $_SESSION['user']['token'];
	$response = $obj->callAPI("POST",$url,json_encode($data),$token);
	$userNetworkArr = json_decode($response['result'],true);
}
else{

    $path = 'login.php';
    header("Location: ".$path);
}


?>
