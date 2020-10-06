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
// print_r($userNetworkArr);exit;

?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        
        <?php include("topbar.html");?>

        <!-- Begin Page Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-capitalize"><?php echo $name;?>'s Network</h1>
          </div>

          <div class="row row_layer_1">
           <?php if(count($userNetworkArr) > 0){?>
              <input type="hidden" id="layer" name="layer" value="1">
              <?php foreach($userNetworkArr as $key=>$value){
              ?>
              
              <div class="col-xl-3 col-md-6 mb-4 highlight layerdiv <?php echo 'layer_'.$layercount;?>" layer="<?php echo $layercount;?>">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                       
                        <div class="row no-gutters align-items-center">
                          <div class="h5 font-weight-bold text-gray-800 col mr-2 user_network text-capitalize"
                              user_id="<?php echo $value['user_id']['_id'];?>" user_name="<?php echo $value['user_id']['name'];?>" layer_count="1"><?php echo $value['user_id']['name'];?>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-user userinformation fa-2x text-gray-300" mobile="<?php echo $value['user_id']['mobile'];?>" email_id="<?php echo $value['user_id']['email_id'];?>" joined_on="<?php echo date("d-M-Y H:i:s", strtotime($value['user_id']['created_time']));?>" member_count="<?php echo $value['user_id']['membar_count'];?>" data-toggle="modal" data-target="#basicExampleModal"></i>
                          </div>
                        </div>
                      
                        <div class="text-xs font-weight-bold text-primary mb-1">
                          <a  href="<?php echo 'payment_log.php?id='.$value['user_id']['_id'].'&name='.$value['user_id']['name'];?>">Transaction history</a><br/>
                          <a href="<?php echo 'purchase_log.php?id='.$value['user_id']['_id'].'&name='.$value['user_id']['name'];?>">Purchase history</a><br/>
                          <span>User count : <?php echo $value['user_id']['membar_count'];?></span>
                        </div>

                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>


              <?php
              }
            }
            else
            {?>
              <div class="col-xl-3 col-md-6 mb-4 highlight layerdiv <?php echo 'layer_'.$layercount;?>" layer="<?php echo $layercount;?>">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800 user_network text-capitalize" >No user Found</div>
                      

                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <?php }
            ?>
            </div> 
            <!-- <div class="layer_2">
            </div>
            <div class="layer_3">
            </div> -->
            
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
<div class="modal fade" id="userinfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="user_details">
        
      </div>
      
    </div>
  </div>
</div
     

      <?php include("footer.php");?>
