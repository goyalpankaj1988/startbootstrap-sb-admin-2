<?php
session_start();
if(isset($_SESSION['user']['token']))
{
    $obj = new Utils();
	  $url ='/api_list/user_list';
    $data = array();
    if($role == 'admin')
    {
      
      if(isset($_GET['start_date']) && isset($_GET['end_date']))
      {
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];
        $start_date_val = $start_date.' 00:00:00';
        $end_date_val = $end_date.' 23:59:59';

        $data = array('start_date' => date(DATE_ISO8601,strtotime($start_date_val)), 'end_date'=> date(DATE_ISO8601,strtotime($end_date_val)));
     }

    }

      
	  $token = $_SESSION['user']['token'];
      $response = $obj->callAPI("POST",$url,json_encode($data),$token);
      $ProductList_Array = json_decode($response['result'],true);
}
else{
    $_SESSION['msg_error'] = 'Invalid request.';
	
    $path = 'login.php';
    header("Location: ".$path);
}


?>
