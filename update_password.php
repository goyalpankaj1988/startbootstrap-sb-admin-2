<?php

include("header.php");
?>


<script src="js/application/update_password.js"></script>
<?php

include("sidebar.php");
$id =$_GET['id'];
$error = true;
if(isset($_GET['error']))
{
	$error = $_GET['error'];
}
?>


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
                <h1 class="h4 text-gray-900 mb-4">Update password!</h1>
              </div>
              <form id="user" class="user_password" action="" method="POST">
                <input type="hidden" id="role" name="role" value="user">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $id;?>">
                <div class="alert alert-success" style="display:none;" role="alert">
					  This is a success alert—check it out!
					</div>
               
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1" class="text-dark">Password</label>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1" class="text-dark">Confirm Password</label>
                    <input type="password" class="form-control form-control-user" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                  </div>
                </div>

                
                <button type="submit" id="updatebtn" class="btn btn-success btn-user btn-block">Update password</button> 
                
              </form>
			<div class="d-flex align-items-center" >
				<div class="spinner-border ml-auto" style="display:none" role="status" aria-hidden="true"></div>
			</div>
              
          </div>
          
        </div>
      </div>
    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include("footer.php");?>