<?php
session_start();
include(__DIR__."/controller/utils.php");
$obj = new Utils();
$url ='/admin_api_list/add_user';
// $data = array();
$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjoiYWRtaW58QWRtaW58NWY1Y2ZmZTY2ZmQyMTQzYTkxMDU4MDQ3fDo6MSIsImlhdCI6MTYwMDQyNTQxNSwiZXhwIjoxNjMxOTYxNDE1fQ.TBh7gHN7PnOH9tMXxzH3UuATTY6ZvIDvWFpxsNtHp8E';
$refID = ["5f7cc4b2fd92a4645c0c7091"];
$user = 4;
$total_user = 84;
$countUSer = 0;

while($countUSer<$total_user){
    $refID_id = array_shift($refID);
    for($i=0; $i<$user; $i++){
        
        if($countUSer<$total_user){
            $countUSer++;
           echo $a = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
            echo $b = substr(str_shuffle(str_repeat("0123456789", 5)), 0, 5);

            $name = $a.'_'.$b;
            $username = $a.'_'.$b.'@test.com';
           // echo $refID_id."\n";
            $data = array(
                "role" => "user",
                "status" => "Y",
                "earned_amonut" => 0,
                "paid_amonut" => 0,
                "first_purches" => "Y",
                "membar_count" => 0,
                "user_name" => $username,
                "ref_id" => $refID_id,
                "name" => $name,
                "address1" => "90",
                "mobile" => "8989898989",
                "zipcode" => "90",
                "state" => "Karnataka",
                "country" => "India",
                "account_number" => "9090",
                "ifsc" => "909",
                "password" => "12345",
                "__v" => 0
            );

            $response = $obj->callAPI("POST",$url,json_encode($data),$token);
            $ProductList_Array = json_decode($response['result'],true);
            //print_r($ProductList_Array);
            array_push($refID,$ProductList_Array['msg']);
            //echo "\n".$countUSer."\n"."oooooo=>".$i."\n";
            //print_r($refID);
        }
    }
}








?>
