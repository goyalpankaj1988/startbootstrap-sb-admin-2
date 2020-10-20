<?php
session_start();
$msg_success = '';
$msg_error = '';
if(isset($_SESSION['msg_success'])){
  $msg_success = $_SESSION['msg_success'];
}
if(isset($_SESSION['msg_error'])){
  $msg_error = $_SESSION['msg_error'];
}

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  
  <title>User - Registration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/mlm.css" rel="stylesheet">
  <style type="text/css">
   

      .img-responsive {
          display: none;
        } 
        .green {
  color: #7CFC00;
}
      
        @media only screen and (max-device-width: 480px) {
      .img-responsive {
        display: block;
      }
      
    }
    label{
      width: 50%;
    }

    
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="d-none d-lg-block" style="margin-top: 10%;margin-left: 30%!important;"><a href="login.php"><img src="img/logo.JPG" style="width:50%;"></a></div>
               <div class="" style="margin-left: 20%!important;">
                <div class="p-5">
                  <div class="text-center">
                    <img class="img-responsive" src="img/logo.JPG" style="width:100%;" >
                    <h1 class="h4 text-gray-900 mb-4">Registration Form</h1>
                  </div>
  <form id="user" class="user" action="" method="POST" autocomplete="false">
  <input type="hidden" id="role" name="role" value="user">
  <input type="hidden" id="reference_hidden" name="reference_hidden" value="">
  <input type="hidden" id="valid_username" name="valid_username" value="false">
  <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Reference</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Personal details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-address" role="tab" aria-controls="pills-address" aria-selected="false">Address</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-neft" role="tab" aria-controls="pills-neft" aria-selected="false">NEFT</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="col-sm-10 mb-3 mb-sm-0">
      <input type="checkbox" id="age"/> I am at least 18 years old
    </div>
    <div class="mb-3 mb-sm-0" style="margin-left:.7rem;margin-bottom: .5rem!important;">
      <input type="checkbox" id="terms"> I accept all <a href="doc/termscondition.pdf" target="_blank">terms and conditions</a> to become a consultant
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
      <!-- <label for="exampleInputEmail1" class="text-dark">Search by reference user name</label> -->
      <input type="text" id="reference" name="reference" placeholder="reference user name"> 
      <a href="#" id="checkref">check reference</a>
      
      
      <div id="reference_list" style="display: none"></div>
    </div>
    <!-- <div class="col-sm-6 mb-3 mb-sm-0">
      <button type="button" class="btn btn-success">Next</button>
    </div> -->
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="mt-2">
      <label for="exampleInputEmail1" class="text-dark">First name</label>
      <input type="text" class="mr-2" id="fname" name="fname" placeholder="First Name">
      <label for="exampleInputEmail1" class="text-dark">Last name</label>
      <input type="text" id="lname" name="lname" placeholder="Last Name">
    </div>
    <div class="mt-2">
      <label for="exampleInputEmail1" class="text-dark">Email</label>
      <input type="email" class="mr-2" id="email" name="email" placeholder="Email Address">
      <span id="email_valid"></span>
      <label for="exampleInputEmail1" class="text-dark">DOB</label>
      <input type="date" id="dob" name="dob" placeholder="Date of Birth">
    </div>
    <div class="mt-2">
      <label for="exampleInputEmail1" class="text-dark">Password</label>
      <input type="password" class="mr-2" id="password" name="password" placeholder="Password">
      <label for="exampleInputEmail1" class="text-dark">Confirm password</label>
      <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
    </div>
    <div class="mt-2">
      <label for="exampleInputEmail1" class="text-dark">Mobile</label>
      <input type="number" class="mr-2" id="mobile" name="mobile" placeholder="Mobile">
    </div>
      
  </div>
  <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
    <div class="mt-2">
      <label for="exampleInputEmail1" class="text-dark">Address1</label>
      <input type="text"  id="address1" name="address1" placeholder="address line 1" required>
      <label for="exampleInputEmail1" class="text-dark">Address2</label>
      <input type="text" id="address2" name="address2" placeholder="address line 2">
    </div>
    <div class="mt-2">
      <label for="exampleInputEmail1" class="text-dark">Postal code</label>
      <input type="number"  id="zipcode" name="zipcode" placeholder="Postal code" required>
      <label for="exampleInputEmail1" class="text-dark">State</label>
      <select name="state" id="state">
                      <option value="">Select state</option>
                      <option value="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                      <option value="Assam">Assam</option>
                      <option value="Bihar">Bihar</option>
                      <option value="Chandigarh">Chandigarh</option>
                      <option value="Chhattisgarh">Chhattisgarh</option>
                      <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                      <option value="Daman and Diu">Daman and Diu</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Lakshadweep">Lakshadweep</option>
                      <option value="Puducherry">Puducherry</option>
                      <option value="Goa">Goa</option>
                      <option value="Gujarat">Gujarat</option>
                      <option value="Haryana">Haryana</option>
                      <option value="Himachal Pradesh">Himachal Pradesh</option>
                      <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                      <option value="Jharkhand">Jharkhand</option>
                      <option value="Karnataka">Karnataka</option>
                      <option value="Kerala">Kerala</option>
                      <option value="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="Maharashtra">Maharashtra</option>
                      <option value="Manipur">Manipur</option>
                      <option value="Meghalaya">Meghalaya</option>
                      <option value="Mizoram">Mizoram</option>
                      <option value="Nagaland">Nagaland</option>
                      <option value="Odisha">Odisha</option>
                      <option value="Punjab">Punjab</option>
                      <option value="Rajasthan">Rajasthan</option>
                      <option value="Sikkim">Sikkim</option>
                      <option value="Tamil Nadu">Tamil Nadu</option>
                      <option value="Telangana">Telangana</option>
                      <option value="Tripura">Tripura</option>
                      <option value="Uttar Pradesh">Uttar Pradesh</option>
                      <option value="Uttarakhand">Uttarakhand</option>
                      <option value="West Bengal">West Bengal</option>
                    </select>
    </div>
    <div class="mt-2">
      <label for="exampleInputEmail1" class="text-dark">Country</label>
      <select name="country" id="country" style="width:200px;">
        <option value="India" selected="selected">India</option>
      </select>
    </div>
    <!-- <div class="mt-2">
      <button type="button" class="btn btn-success">Next</button>
    </div> -->
      
  </div>
  <div class="tab-pane fade" id="pills-neft" role="tabpanel" aria-labelledby="pills-neft-tab">
    <div class="">
      <label for="exampleInputEmail1" class="text-dark">Account Number</label>
      <input type="number" id="account_number" name="account_number" placeholder="account number" required>
      <label for="exampleInputEmail1" class="text-dark">IFSC</label>
      <input type="text" id="ifsc" name="ifsc" placeholder="ifsc code" required>
    </div>
     <div class="mt-5">
     </div>
     <div class="mt-3">
     </div>
    <div class="mt-2">
      <button type="button" id="register" class="btn btn-success">Register</button>
    </div>
  </div>
</div>



</div>
</form>
<div class="d-flex align-items-center" >
        <div class="spinner-border ml-auto" style="display:none" role="status" aria-hidden="true"></div>
      </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
   
  $(function () 
  {
    
    $('#register').on("click", function(){
      $('.spinner-border').show();
      $('#register').prop('disabled', true);
      var age_confirm = $('#age').is(":checked");
      var terms = $('#terms').is(":checked");

      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var email_hidden = $('#valid_username').val();
      var dob = $('#dob').val();
      var password = $('#password').val();
      var cpassword = $('#cpassword').val();

      var address1 = $('#address1').val();
      var address2 = $('#address2').val();
      var zipcode = $('#zipcode').val();
      var state = $('#state :selected').val();
      var country = $('#country :selected').val();

      var account_no = $('#account_number').val();
      var ifsc = $('#ifsc').val();
      var mobile = $('#mobile').val();
      var msg = '';
      if(age_confirm == false)
      {

          msg += 'Please confirm age'+'\n';
      }
      if(terms == false)
      {

          msg += 'Please accept terms and conditions'+'\n';
      }
      if($("#reference_hidden").val() == '')
      {

          msg += 'Please provide valid reference'+'\n';
      }
      if(fname == '')
      {
          msg += 'Please provide first name'+'\n';
      }
      if(lname == '')
      {
          msg += 'Please provide last name'+'\n';
      }
      if($('#email').val() == '')
      {
        msg += 'Please provide valid email'+'\n';
      }
      if($('#valid_username').val() == 'false')
      {
          msg += 'Email already exists'+'\n';
      }
      if(password == '' || cpassword == '')
      {
          msg += 'Please provide password and confirm password'+'\n';
      }
      if(password != cpassword)
      {
          msg += 'Password and confirm password should be same'+'\n';
      }
      if(address1 == '')
      {
          msg += 'Please provide address1'+'\n';
      }
      if(address2 == '')
      {
          msg += 'Please provide address2'+'\n';
      }
      if(zipcode == '')
      {
          msg += 'Please provide postal code'+'\n';
      }
      if(state === '')
      {
          msg += 'Please provide state'+'\n';
      }
      if(dob === '')
      {
          msg += 'Please provide date of birth'+'\n';
      }
      else
      {
        var currentYear = (new Date).getFullYear();
        var arr = dob.split('-');
        var diff = currentYear - arr[0];
        if(diff < 18)
        {
          msg += 'You should be at lease 18 years old to be consultant'+'\n';
        }

      }
      // if(account_no == '')
      // {
      //     msg += 'Please provide account number'+'\n';
      // }
      // if(ifsc === '')
      // {
      //     msg += 'Please provide IFSC'+'\n';
      // }
      if(mobile == '' || mobile.length != 10)
      {
          msg += 'Please provide 10 digit mobile number'+'\n';
      }
      if(msg != '')
      {
        $('.spinner-border').hide();
         $('#register').prop('disabled', false);
        alert(msg);
      }
      else
      {
        var form = $("#user");
        var url = "controller/userRegistration.php";
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                    window.location.href ='login.php';
                   
               }
             });
        
      }
      // var form = $("#user");
      //   var url = "controller/userRegistration.php";
      //   $.ajax({
      //          type: "POST",
      //          url: url,
      //          data: form.serialize(), // serializes the form's elements.
      //          success: function(data)
      //          {
      //           // window.location.href ='login.php';            
                   
      //          }
      //        });

      
    });
  });

  $("#checkref").click(function(event){
    var ref_name =$("#reference").val(); 
    $("#reference_hidden").val('');
    // if(ref_name.length >= 3)
    // {
      
      $.ajax({
            url:"controller/checkReference.php",
            data: { 
            "refernce_name": ref_name
          },
            type: "POST",
            success:function(response) {
                var obj = jQuery.parseJSON(response);
                console.log(obj);
                var html = '';
                if ( obj.length == 0 ) {
                console.log("NO DATA!");
                html +=  '<span style="color:black;">Invalid Reference</span>' ;
                
            }
            else
            {
              $.each(obj, function(key,value) {
                html +=  '<span style="color:black;">Reference name : '+value.name+'</span>' ;
                $("#reference_hidden").val(value.id);
              });

            }
          
          
          $("#reference_list").empty();
          $("#reference_list").append(html);
          $("#reference_list").show();
            }
        });
    // }
       
  });
$("#email").change(function(event){
    var email =$("#email").val(); 
    $('#valid_username').val(false);
    $('#email_valid').html('');
    $("#email").removeClass('border border-danger');
    $.ajax({
            url:"controller/validateuseremail.php",
            data: { 
            "user_email": email
          },
            type: "POST",
            success:function(response) {
               var obj = jQuery.parseJSON(response);
               if(obj.available == true)
               {
                  $('#email_valid').html('&#10004;');
                  $('#valid_username').val(true);
                  
               }
               else
               {
                  $('#email_valid').html('&#10060;');
               }
                
            }
      });
       
  });
  </script>
</body>

</html>
