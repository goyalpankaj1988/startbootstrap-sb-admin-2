<?php
require(__DIR__."/utils.php");

session_start();
if(isset($_SESSION['user']['token']))
{
    // print_r($_POST);
    // print_r($_FILES);
    // move_uploaded_file($_FILES["img"]["tmp_name"], $_FILES["img"]["name"]);

    $bin_string = file_get_contents($_FILES["img"]["tmp_name"]);
    $hex_string = base64_encode($bin_string);
    // var_dump($bin_string);
    // var_dump($hex_string);
    $data = array();
    $data['product_name'] = $_POST["product_name"];
    $data['quantity'] = $_POST["quantity"];
    $data['mrp'] = $_POST["mrp"];
    $data['dp'] = $_POST["dp"];
    $data['type'] = $_POST["type"];
    // $data['img'] = $hex_string;
    // print_r($data);
    // exit;
    $obj = new Utils();
    $url ='/admin_api_list/add_product';
    // $data = array();
    $token = $_SESSION['user']['token'];
    $response = $obj->callAPI("POST",$url,json_encode($data),$token);
    $product_id = json_decode($response['result'],true);
    
    
    
    
    $Path = "../img/product/".$product_id;
    if(file_exists("../img/product")){
        // echo $Path; exit;
        if(!file_exists($Path)){
            if(!mkdir($Path, 0777, true)){
                // $_SESSION['msg_error'] = 'File Created';
                // $path = '../add_product.php';
                // header("Location: ".$path);
            };
        }
        
    }
    
    $file = $_FILES['img']['name'];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $temp_name = $_FILES['img']['tmp_name'];
    $path_filename_ext = $Path.'/'.$filename.".".$ext;
    
    if (file_exists($path_filename_ext)) {
    // echo "Sorry, file already exists.";
    $_SESSION['msg_error'] = 'Sorry, images file already exists.';
    }else{
    move_uploaded_file($temp_name,$path_filename_ext);
    // echo "Congratulations! File Uploaded Successfully.";
    $_SESSION['msg_success'] = 'Product added successfully.';
    }
    
    
    $path = '../add_product.php';
    header("Location: ".$path);
    	
    
}
else{
    $_SESSION['msg_error'] = 'Invalid request.';
    $path = 'login.php';
    header("Location: ".$path);
}


?>
