<?php
require(__DIR__."/utils.php");

session_start();
if(isset($_SESSION['user']['token']))
{
    
    $obj = new Utils();
    $url ='/api_list/update_password';
    $data = array();
    $token = $_SESSION['user']['token'];
    $response = $obj->callAPI("PUT",$url,json_encode($_POST),$token);
    
    if($response['result'])
    {
    	$result = json_decode($response['result'],true);
    	if(isset($result['msg']) && ($result['msg'] == 'success'))
    	{
    		$msg = 'successfully';
    		$_SESSION['msg_success'] = 'Password updated successfully.';
    	}
    }
    
    
}
else{
	$_SESSION['msg_error'] = 'Invalid request.';
    $path = 'login.php';
    header("Location: ".$path);
}


?>
