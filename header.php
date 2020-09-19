<?php
require(__DIR__."/controller/utils.php");
session_start();
if(!isset($_SESSION['user']))
{
  header("Location: login.php");
}
if(!isset($_SESSION['menu']) || empty($_SESSION['menu']))
{
  $obj = new Utils();
  $url ='/api_list/menu';
  $data = array();
  $token = $_SESSION['user']['token'];
  $response = $obj->callAPI("POST",$url,json_encode($data),$token);
  if($response['code'] == 200)
  {
    $menu = (array) $response['result'];
  }
  $menu = (array) json_decode($menu['0']);
  $_SESSION['menu'] = $menu;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">