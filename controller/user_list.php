<?php
if(isset($_SESSION['user']['token']))
{
      $obj = new Utils();
	  $url ='/api_list/user_list';
	  $data = array();
	  $token = $_SESSION['user']['token'];
      $response = $obj->callAPI("POST",$url,json_encode($data),$token);
      $ProductList_Array = json_decode($response['result'],true);
}
else{
    $path = 'login.php';
    header("Location: ".$path);
}


?>
