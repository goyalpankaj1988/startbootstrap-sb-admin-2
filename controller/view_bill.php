<?php
if(isset($_SESSION['user']['token']))
{
      $obj = new Utils();
      $data['purches_id'] = $purchase_id;
    //   print_r($data);
	  $url ='/api_list/purche_bill';
	//   $data = array();
	  $token = $_SESSION['user']['token'];
      $response = $obj->callAPI("POST",$url,json_encode($data),$token);
      $purchaseBillArr = json_decode($response['result'],true);
      
}
else{
    session_destroy();
    $path = 'login.php';
    header("Location: ".$path);
}


?>
