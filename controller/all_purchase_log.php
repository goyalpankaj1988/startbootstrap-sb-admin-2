<?php
if(isset($_SESSION['user']['token']))
{
    $obj = new Utils();

    $url ='/admin_api_list/all_purches_history';
    // $start_date = date('d-m-Y');
    // $end_date = date('d-m-Y');
    // if(isset($_GET['start_date']) && isset($_GET['end_date']))
    // {
    //   $start_date = $_GET['start_date'];
    //   $end_date = $_GET['end_date'];

    // }

    $start_date_val = $start_date.' 00:00:00';
    $end_date_val = $end_date.' 23:59:59';

    $data = array('start_date' => date(DATE_ISO8601,strtotime($start_date_val)), 'end_date'=> date(DATE_ISO8601,strtotime($end_date_val)));
    
    $token = $_SESSION['user']['token'];
    $response = $obj->callAPI("POST",$url,json_encode($data),$token);
    $ProductList_Array = json_decode($response['result'],true);
}
else{
    $path = 'login.php';
    header("Location: ".$path);
}


?>
