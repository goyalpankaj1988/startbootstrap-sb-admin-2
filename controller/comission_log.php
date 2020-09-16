<?php
if(isset($_SESSION['user']['token']))
{
      $obj = new Utils();
      $data['agent_id'] = $persone_id;
    //   print_r($data);
	  $url ='/api_list/user_commission_history';
	//   $data = array();
	  $token = $_SESSION['user']['token'];
      $response = $obj->callAPI("POST",$url,json_encode($data),$token);
      $ProductList_Array = json_decode($response['result'],true);
}
else{
    $path = 'login.html';
    header("Location: ".$path);
}


?>