<?php



class Utils
{
	private $back_url = 'http://localhost:3002';

	function getIP(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	function callAPI($method, $url, $data,$token = ''){
		$ip = $this->getIP();
		$url =$this->back_url.$url;
	   $curl = curl_init();
	   switch ($method){
	      case "POST":
	         curl_setopt($curl, CURLOPT_POST, 1);
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	         break;
	      case "PUT":
	         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
	         break;
	      default:
	         if ($data)
	            $url = sprintf("%s?%s", $url, http_build_query($data));
	   }
	   // OPTIONS:
	   curl_setopt($curl, CURLOPT_URL, $url);
	   
	    $header =  array(
	      'Content-Type: application/json',
		  'token: '.$token,
		  'ip: '.$ip
	   );
	   curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	   curl_setopt($ch, CURLOPT_TIMEOUT, 10); //timeout in seconds
	  
	   // EXECUTE:
	   try{
			$error = false;
			$result = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			switch ($httpcode) {
				case 423:
					$_SESSION['msg_error'] = 'Error Code : 423 please inform your admin.';
					$error = true;
					
				break;
				
				case 424:
					$_SESSION['msg_error'] = 'Unauthorized access';
					$error = true;
					
				break;
				
				case 401:
					$_SESSION['msg_error'] = 'Invalid request';
					$error = true;
					
				break;

				case 404:
					$_SESSION['msg_error'] = 'Page not found';
					$error = true;
					
				break;
				
				case 200:
					$error = false;
					
				break;
				

				
				default:
				$_SESSION['msg_error'] = 'Something is wrong';
				$error = true;
				


			} 
			curl_close($curl);
				
			if($error){
				header("Location: login.php");
				
			}
			else{
				$response =array();
				$response['code'] = $httpcode;
				$response['result'] = $result;
				return $response;
			}
	   
			

	   }
	   catch(Exception $e)
	   {
		$_SESSION['msg_error'] = 'Exception happened';
		header("Location: login.php");
	   }
	   
	   
	}

	


}



?>
