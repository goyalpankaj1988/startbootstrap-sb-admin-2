<?php
require(__DIR__."/utils.php");

session_start();
if(isset($_SESSION['user']['token']))
{
    print_r($_POST);
    $obj = new Utils();
    $url ='/admin_api_list/panding_amount_paid_payment';
    $data = array();
    $token = $_SESSION['user']['token'];
    $response = $obj->callAPI("POST",$url,json_encode($_POST),$token);
    // $ProductList_Array = json_decode($response['result'],true);
    echo $response['result'];
}
else{
    $path = 'login.php';
    header("Location: ".$path);
}


?>
