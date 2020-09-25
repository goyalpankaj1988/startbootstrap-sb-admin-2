<?php 
include("header.php");
error_reporting(0);
?>
<script src="js/application/user_list.js">
  


</script>

<?php
include("sidebar.php");
include(__DIR__."/controller/user_list.php");
// print_r($ProductList_Array);

?>
 <!-- Custom styles for this page -->
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        
      <?php include("topbar.html");?>

       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User List</h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <!-----<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>----->
          </div>
          <div class="card-body">
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
            
            <!-- <div class="card-header py-3">
              
              <div class="box-tools">
                  <div class="input-group input-group-sm hidden-xs" style="width: 50%;">
                    <input type="text" name="table_search" class="form-control pull-right mr-2" placeholder="Search By Name">

                    
                  
                    <select name="filter" class="form-control pull-right" placeholder="">
                      <option value="All">All</option>
                      <option value="No">payment pending</option>
                      <option value="yes">payment complete</option>
                    </select>
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    
                  </div>
                </div>

            </div> -->
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Badge</th>
                    <th>Earned amount</th>
                    <th>Paid amount</th>
                    <th>Pending amount</th>
                    <th>Purchase</th>
                    <th>Purchase history</th>
                    <th>Joined On</th>
                    <?php if($_SESSION['user']['role']=='admin'){?>
                    <th>Reference by</th>
                    <?php }?>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Badge</th>
                    <th>Earned amount</th>
                    <th>Paid amount</th>
                    <th>Pending amount</th>
                    <th>Purchase</th>
                    <th>Purchase history</th>
                    <th>Joined On</th>
                    <?php if($_SESSION['user']['role']=='admin'){?>
                    <th>Reference by</th>
                    <?php }?>
                  </tr>
                </tfoot>
                <tbody>
		            <?php
               foreach($ProductList_Array as $key=>$value){
                    $Badge='';
                    if($value['membar_count']==4 && $value['member_count_level2']==16 && $value['member_count_level3']>20){
                      $Badge="Premimum Star";
                    }
                    elseif($value['member_count_level2']==16){
                      $Badge="Raising Star";
                    }
                    elseif($value['membar_count']==4){
                      $Badge="Lucky Star";
                    }
                    else{
                      $Badge='Star';
                    }
                    $pendingA = $value['earned_amonut'] - (float)$value['paid_amonut'];
		                $pendingA = round($pendingA,2);
                    echo '<tr><td class="text-capitalize"><a href="update_password.php?id='.$value['_id'].'" title="Change paswword"><i class="fa fa-lock" aria-hidden="true"></i></a><img class="mr-2 ml-1 userinfo" title = "User details" mobile="'.$value['mobile'].'" email_id="'.$value['email_id'].'"
                    address1="'.$value["address1"].'" address2="'.$value["address2"].'" name="'.$value["name"].'" zip="'.$value['zipcode'].'" state="'.$value['state'].'" country="'.$value['country'].'" account="'.$value['account_number'].'" ifsc="'.$value['ifsc'].'" data-toggle="modal" data-target="#userdetailsModal" src="img/select-user.png" style="height: 16px;width: 16px;" ></img><a href="user_network.php?id='.$value['_id'].'&name='.$value['name'].'" title="User network">'.$value['name'].'('.$value['user_serial_number'].')</a></td>';
                    echo '<td>'.$Badge.'</td>';
                    echo '<td ><a href="comission_log.php?id='.$value['_id'].'&name='.$value['name'].' " title = "Comission log">'.$value['earned_amonut'].'</a></td>';
                    echo '<td ><a href="payment_log.php?id='.$value['_id'].'&name='.$value['name'].'" title = "Payment log">'.$value['paid_amonut'].'</a></td>';
                    echo '<td >';
                    if($_SESSION['user']['role']=='admin' && $value['first_purches']=='Y' && $pendingA>0){
                      echo '<a href="add_payment.php?id='.$value['_id'].'&name='.$value['name'].'&amount='.$pendingA.'&account_number='.$value['account_number'].'&ifsc='.$value['ifsc'].'" title="Pay"><span class="icon  text-balck-300">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gift-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3z"/>
                        <path d="M15 7v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7h6zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9H2.5z"/>
                      </svg>
                      <!-- <i class="fa-twitter-square"></i> -->
                    </span></a>';
                    }
                    echo '<span class="ml-1">'.$pendingA.'</span>';
                    // if($_SESSION['user']['role']=='admin'){
                    //   echo '</a>';
                    // }
                    echo '</td>';
                    // if($_SESSION['user']['role']=='admin'){
                      echo '<td>
                    <a href="create_purchase.php?id='.$value['_id'].'&name='.$value['name'].' " title="Create purchase" >
                      <span class="icon fa-2x text-yellow-300">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shop-window" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        
                      </span>
                      
                      
                    </a>
                    </td>';
                    
                    // }
                    echo '<td><a href="purchase_log.php?id='.$value['_id'].'&name='.$value['name'].'" title="Purchase history" >
                    <span class="icon  text-yellow-300">
                      
                      
                      <i class="fas fa-history"></i>
                      <!-- <i class="fa-twitter-square"></i> -->
                    </span></a><span class="ml-1" title="Total Purchase Amonut">'.$value['total_purchase_amonut'].'</span></td>';
                    echo '<td>'. date("d-M-Y H:i:s", strtotime($value['created_time'])).'</td>';
                    if($_SESSION['user']['role']=='admin'){
                    echo '<td class="text-capitalize"><a href="user_network.php?id='.$value['user_ref_id']['_id'].'&name='.$value['user_ref_id']['name'].'" title="User network" >'.$value['user_ref_id']['name'].'('.$value['user_ref_id']['user_serial_number'].')</a></td>';
                   }
                    echo '</tr>';
                  }
                ?> 
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <div class="modal fade" id="userdetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>

<div class="modal fade" id="userupdatedetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="user_update_details">
        
      </div>
      
    </div>
  </div>
</div>


<?php include("footer.php"); ?>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
