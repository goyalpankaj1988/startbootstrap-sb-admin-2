<?php
session_start();
if(isset($_SESSION['user']['token']))
{
    $obj = new Utils();
	  $url ='/api_list/user_list';
    $data = array();
    if($role == 'admin')
    {
      
      if(!empty($start_date_value) && !empty($end_date_value))
      {
        $start_date_param = $_GET['start_date_param'];
        $end_date_param = $_GET['end_date_param'];
        $start_date_val = $start_date_param.' 00:00:00';
        $end_date_val = $end_date_param.' 23:59:59';

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
