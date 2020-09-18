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
				$usrInfo = $value['user_id'];
				$userDetails['id'] = $usrInfo['_id'];
				$userDetails['name'] = $usrInfo['name'];
				$userDetails['mobile'] = $usrInfo['mobile'];
				$userDetails['email_id'] = $usrInfo['email_id'];
				$userDetails['membar_count'] = $usrInfo['membar_count'];
				$userDetails['joined_on'] = date("d-M-Y H:i:s", strtotime($usrInfo['created_time']));
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