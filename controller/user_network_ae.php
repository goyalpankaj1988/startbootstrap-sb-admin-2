<?php
require(__DIR__."/utils.php");
session_start();
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
	if($response['code'] == 200)
    {
    	$userNetworkArr = json_decode($response['result'],true);
		$count = count($userNetworkArr);
		$usrArr =  array();
		if($count > 0)
		{
			foreach ($userNetworkArr as $key => $value) {
				$userDetails['id'] = $value['user_id']['_id'];
				$userDetails['name'] = $value['user_id']['name'];
				$usrArr[] = $userDetails;
			}
		}	
		$usrArr['user_count'] = $count;
    }
    else
    {
    	$usrArr['user_count'] = 0;
    }

	
	
	
}
else{

    $usrArr['user_count'] = 0;
}
echo json_encode($usrArr);


?>