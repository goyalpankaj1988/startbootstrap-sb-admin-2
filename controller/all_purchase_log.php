<?php
if(isset($_SESSION['user']['token']))
{
      $obj = new Utils();
      $data['purcheser_id'] = $persone_id;
    //   print_r($data);
	  $url ='/admin_api_list/all_purches_history';
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
