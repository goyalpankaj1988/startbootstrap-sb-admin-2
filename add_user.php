<?php

include("header.php");
?>


<script src="js/application/add_user.js"></script>
<?php

include("sidebar.php");

?>
<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script>
  $(document).ready (function(){
              // $("#alert-success").hide();
              $("#register").click(function() {
                alert("herr");
                 //  $("#alert-success").fadeTo(2000, 2000).slideUp(500, function(){
                 // $("#alert-success").slideUp(500);
                 //  });
                 $("#alert-success").show(); // use slide down for animation
                // setTimeout(function(){ $("#alert-success").fadeIn("slow"); }, 600);
                return false
              });
   });
</script> -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include("topbar.html");?> 
         

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Create user</h1> -->
          <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-2 d-none d-lg-block"></div>
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an User!</h1>
              </div>
              <form id="user" class="user" action="" method="POST" autocomplete="false">
                <input type="hidden" id="role" name="role" value="user">
                <input type="hidden" id="reference_hidden" name="reference_hidden" value="">
                <input type="hidden" id="valid_username" name="valid_username" value="false">
                <div class="alert alert-success" style="display:none;" role="alert">
  This is a success alert—check it out!
</div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user required" id="fname" name="fname" placeholder="First Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="lname" name="lname" placeholder="Last Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user required" id="email" name="email" placeholder="Email Address" required>
                  <span id="email_valid"></span>
                  <a href="#" class="ml-2" id="validateemail">check avalability</a>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user required" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user required" id="cpassword" name="cpassword" placeholder="Repeat Password" required>
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user required" id="reference" name="reference" placeholder="reference from" autocomplete="off" required>
                    <div id="reference_list" style="display: none"></div>
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user required" id="mobile" name="mobile" min="10" maxlength="10" placeholder="mobile" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user required" id="account_number" name="account_number" placeholder="account number" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user required" id="ifsc" name="ifsc" placeholder="ifsc code" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user required" id="address1" name="address1" placeholder="address line 1" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="address2 " placeholder="address line 2">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user required" id="zipcode" name="zipcode" placeholder="Postal code" required>
                  </div>
                  <div class="col-sm-6">
                    <!-- <input type="text" class="form-control form-control-user" id="state " placeholder="State"> -->
                    <select name="state" id="state" class="form-control required">
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
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <!-- <input type="text" class="form-control form-control-user" id="country" placeholder="Country"> -->
                    <select name="country" id="country" class="form-control" required>
                      <option value="India" selected="selected">India</option>
                    </select>
                  </div>
                 
                </div>
                
                <button type="button" id="register" class="btn btn-primary btn-user btn-block">Register Account</button> 
                <hr>
                
                
              </form>
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div> -->
          </div>
          <div class="col-lg-2 d-none d-lg-block"></div>
        </div>
      </div>
    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include("footer.php");?>