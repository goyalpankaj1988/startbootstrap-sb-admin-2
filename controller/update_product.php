<?php
require(__DIR__."/utils.php");

session_start();
if(isset($_SESSION['user']['token']))
{
    // print_r($_POST);
    // print_r($_FILES);
    
    
    // exit;
    // var_dump($hex_string);
    $data = array();
    $data['product_name'] = $_POST["product_name"];
    $data['quantity'] = $_POST["quantity"];
    $data['product_id'] = $_POST['product_id'];
    
    $data['mrp'] = $_POST["mrp"];
    $data['dp'] = $_POST["dp"];
    if($_POST["type"]!==""){
        $data['type'] = $_POST["type"];
    }
    else{
        $data['type'] ="paid";
    }
    if($_POST["status"]!==""){
        $data['status'] = $_POST["status"];
    }
    else{
        $data["status"] = "active";
    }
    $obj = new Utils();
    $url ='/admin_api_list/update_product';
    $token = $_SESSION['user']['token'];
    $response = $obj->callAPI("POST",$url,json_encode($data),$token);
    if($_FILES['img']['name']!=''){
        $Path = "../img/product/".$_POST['product_id'];
    
    
        // echo $Path; exit;
        if(file_exists($Path)){
            echo "file present\n";
            echo $Path."\n";
            if (is_dir($Path)) {
                if ($dh = opendir($Path)) {
                    while (($file = readdir($dh)) !== false) {
                        $filePath = $Path."/".$file;
                        unlink($filePath);
                        echo "filename: .".$file."<br />";
                    }
                    closedir($dh);
                }
            }
            if(!rmdir($Path)){
                echo "not able to delete";
                // $_SESSION['msg_error'] = 'File Created';
                // $path = '../add_product.php';
                // header("Location: ".$path);
            };
        }
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
        $_SESSION['msg_success'] = 'Product updated successfully.';
        }
        
    }
    else{
        $_SESSION['msg_success'] = 'Product added successfully.';
    }
    
    
    
    
    
    
    
    $path = '../product_list.php';
    header("Location: ".$path);
    	
    
}
else{
    $_SESSION['msg_error'] = 'Invalid request.';
    $path = 'login.php';
    header("Location: ".$path);
}


?>
