<?php

include("header.php");


include("sidebar.php");
$purchesar_id = $_GET['id'];
$purchesar_name = $_GET['name'];
$paying_amount = $_GET['amount'];


?>
<script src="vendor/jquery/jquery.min.js"></script>
<script>
  var purcheser_id = '<?php echo $purchesar_id; ?>';
  var paying_amount = '<?php echo $paying_amount; ?>';
</script>

<link rel="stylesheet"
          href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        
         

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
                <h1 class="h4 text-gray-900 mb-4">Paying amount for <?php echo $purchesar_name; ?> </h1>
              </div>
              <form class="user" action="controller/add_payment.php" id="add_payment">
                <div class="alert alert-success" style="display:none;" role="alert">
                 This is a success alert—check it out!
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Amount *</label>
                  <input type="number" class="form-control form-control-user" id="pay_amount" min="0" max="<?php echo $paying_amount; ?>"  step=".01" name="amount" placeholder="Pay amount" value="<?php echo $paying_amount; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Transaction id *</label>
                  <input type="text" class="form-control form-control-user" id="transaction_id" name="transaction" placeholder="Transaction id" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Remark *</label>
                  <textarea type="text" class="form-control form-control-user" id="remark_id" name="remark" placeholder="Remark" required></textarea>
                </div>
                
                <button type="submit" id="register" class="btn btn-success float-right">Pay amount</button> 
                
              </form>
              <!-- <hr> -->
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
     <script src="js/application/add_payment.js"></script>