<?php

include("header.php");


include("sidebar.php");


?>
<script src="vendor/jquery/jquery.min.js"></script>

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
                <h1 class="h4 text-gray-900 mb-4">Update Product <?php echo $_GET['product_name']?></h1>
              </div>
              <form class="user" action="controller/update_product.php" id="add_product" method="post" enctype="multipart/form-data">
              <?php 

                if(isset($_SESSION['msg_success']))
                {
                    echo '<div class="alert alert-success" role="alert">';
                    echo $_SESSION['msg_success'];
                    unset($_SESSION['msg_success']);
                    echo '</div>';
                }
                if(isset($_SESSION['msg_error']))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $_SESSION['msg_error'];
                    unset($_SESSION['msg_error']);
                    echo '</div>';
                }

                ?>

                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Product Name *</label>
                  <input type="hidden" class="form-control form-control-user" id="product_id" name="product_id" value="<?php echo $_GET['id']?>" required>
                  
                  <input type="text" class="form-control form-control-user" id="product_name" name="product_name" placeholder="Product Name" value="<?php echo $_GET['product_name']?>" required>
                  
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">quantity *</label>
                  <input type="text" class="form-control form-control-user" id="quantity" name="quantity" placeholder="quantity" value="<?php echo $_GET['quantity']?>" required>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">MRP *</label>
                  <input type="number" class="form-control form-control-user" id="mrp" min="0"  name="mrp" placeholder="MRP" value="<?php echo $_GET['mrp']?>" required>
                  
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">DP *</label>
                  <input type="number" class="form-control form-control-user" id="dp" min="0"  name="dp" placeholder="DP" value="<?php echo $_GET['dp']?>" required>

                </div>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="radio" name="type" id="inlineRadio1" value="paid" <?php echo ($_GET['type'] == "paid" ? 'checked="checked"': ''); ?> required>
                  <label class="form-check-label" for="inlineRadio1">Paid Prodcut</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="free" <?php echo ($_GET['type'] == "free" ? 'checked="checked"': ''); ?> required>
                  <label class="form-check-label" for="inlineRadio2">Free Prodcut</label>
                </div>
                
                </br>
                </br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="radio" name="status" id="inlineRadio1" value="active" <?php echo ($_GET['status'] == "active" ? 'checked="checked"': ''); ?> required>
                  <label class="form-check-label" for="inlineRadio1">Product Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="inactive" <?php echo ($_GET['status'] == "inactive" ? 'checked="checked"': ''); ?> required>
                  <label class="form-check-label" for="inlineRadio2">Product Inactive</label>
                </div>
                <small id="emailHelp" class="form-text text-muted">If you don't want show this product to user, you can Inactive this .</small>
                  
                <br/>
                
                
                <div class="form-group custom-file">
                  <input type="file" name="img" accept="image/*" class="custom-file-input" id="validatedCustomFile" value="" >
                  <label class="custom-file-label" for="validatedCustomFile">Choose Product image...</label>
                  <small id="emailHelp" class="form-text text-muted">If you want to chnage image of product in that case only uploda image else don't do anything with this field.</small>
                  
                </div>
                
                <!-- <div class="form-group">
                  <label for="exampleInputEmail1">Remark *</label>
                  <textarea type="text" class="form-control form-control-user" id="remark_id" name="remark" placeholder="Remark" required></textarea>
                </div> -->
                </br>
                </br>
                <button type="submit" id="register" class="btn btn-success float-right">Update Product</button> 
                
              </form>
              <div class="d-flex align-items-center" >
        <div class="spinner-border ml-auto" style="display:none" role="status" aria-hidden="true"></div>
      </div>
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
     <script src="js/application/add_product.js"></script>