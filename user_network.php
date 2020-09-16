<?php 
include("header.php");
?>
<script src="js/application/user_network.js"></script>
<?php
include("sidebar.php");
if(count($_GET) > 0)
{

  if(isset($_GET['id']))
  {
     $id = $_GET['id'];
  }
  if(isset($_GET['name']))
  {
     $name = $_GET['name'];
  }
  include(__DIR__."/controller/user_network.php");

}

$layercount = 1;

?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        
         

        <!-- Begin Page Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $name;?>'s Network</h1>
          </div>

          <div class="row row_layer_1">
            <input type="hidden" id="layer" name="layer" value="1">
            <?php foreach($userNetworkArr as $key=>$value){
            ?>
            
            <div class="col-xl-3 col-md-6 mb-4 highlight <?php echo 'layer_'.$layercount;?>" layer="<?php echo $layercount;?>">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800 user_network text-capitalize" user_id="<?php echo $value['user_id']['_id'];?>" user_name="<?php echo $value['user_id']['name'];?>" layer_count="1"><?php echo $value['user_id']['name'];?></div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <!-- <span>User count - 2</span> -->
                      </div>

                    </div>
                    
                  </div>
                </div>
              </div>
            </div>


            <?php
            }?>
            </div> 
            <div class="layer_2">
            </div>
            <div class="layer_3">
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4 highlight_ajay">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" onclick="showNetwork('ajay',2)"><?php echo $value['user_id']['name'];?></div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 2</span>
                      </div>

                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Annual) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4 highlight_sarita">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" onclick="showNetwork('sarita',2)">Sarita Desai</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 4</span>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Tasks Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4 highlight_neha">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" onclick="showNetwork('neha',2)">Neha Mathur</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 0</span>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4 highlight_dilip">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" onclick="showNetwork('dilip',2)">Dilip singh</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 4</span>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>-->
          


          <!--- start of ajay's network---->
          <!-- <div id="ajay">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajay Pal's Network</h1>
          </div>

          <div class="row">

             Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rahul raj</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 2</span>
                      </div>

                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Annual) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Raman V</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 4</span>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div -->

            <!-- Tasks Card Example -->
            

            <!-- Pending Requests Card Example -->
            
        <!--- end of ajay's network---->
         <!--- start of sarita's network---->
         

            

            <!-- Earnings (Annual) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Amit behera</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 4</span>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Tasks Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Praveen kumar</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 0</span>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Shilpa singhi</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 4</span>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!--- end of dilip's network---->

        <!---start of 3rd layer---->
         <!--- start of mahesh's network---->
          <!-- <div id="mahesh">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mahesh dixit's Network</h1>
          </div>

          <div class="row">-->

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">K C Pal</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 2</span>
                      </div>

                    </div>
                    
                  </div>
                </div>
              </div>
            </div> --> 

            <!-- Earnings (Annual) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Amit behera</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 4</span>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Tasks Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Praveen kumar</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 0</span>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Shilpa singhi</div>
                      <div class="text-xs font-weight-bold text-primary mb-1">
                        <a href="">Transaction history</a><br/>
                        <a href="">Purchase history</a><br/>
                        <span>User count - 4</span>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  -->
        <!---end of third layer---->
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  
</body>

</html>
