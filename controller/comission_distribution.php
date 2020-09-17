<?php
if(isset($_SESSION['user']['token']))
{
      $obj = new Utils();
      $data['purches_id'] = $persone_id;
    //   print_r($data);
	  $url ='/api_list/purche_commission_log';
	//   $data = array();
	  $token = $_SESSION['user']['token'];
      $response = $obj->callAPI("POST",$url,json_encode($data),$token);
      $ProductList_Array = json_decode($response['result'],true);
}
else{
    $path = 'login.php';
    header("Location: ".$path);
}


?>
