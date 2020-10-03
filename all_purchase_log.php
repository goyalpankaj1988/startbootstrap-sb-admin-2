<?php 
include("header.php");
?>
<script src="js/application/all_purchase_log.js">
  


</script>
<?php
include("sidebar.php");
$role = $_SESSION['user']['role'];
if($role=='admin')
{
  $start_date = date('Y-m-d');
  $end_date = date('Y-m-d');
  if(isset($_GET['start_date']))
  {
    $start_date = $_GET['start_date'];
  }
  if(isset($_GET['end_date']))
  {
    $end_date = $_GET['end_date'];
  }

}
include(__DIR__."/controller/all_purchase_log.php");
// print_r($ProductList_Array);exit;

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
        <h1 class="h3 mb-2 text-gray-800">Purchase log </span></h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <!-----<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>----->
          </div>
          <div class="card-body">
           <input type="hidden" name="role" id="role" value="<?php echo $role;?>">
            <?php if($role=='admin') { ?>
              <div class="card-header py-3">
                
                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs">

                      <label for="startdate" class="text-dark">Purchase Start Date</label>
                      <input type="date" id="startdate" name="startdate" class="form-control pull-right mr-2 ml-2" placeholder="Date start" value="<?php echo $start_date;?>">
                      <label for="enddate" class="text-dark">Purchase End Date</label>
                      <input type="date" id="enddate" name="enddate" class="form-control pull-right mr-2 ml-2" placeholder="Date end" value="<?php echo $end_date;?>">

                      
                      <div class="input-group-btn">
                        <button id="search" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                      
                    </div>
                    <div id="error"></div>
                  </div>

              </div> 
            <?php }?>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Purchased On</th>
                    <th>View Bill</th>
                    <th>Comission distribution</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Purchased On</th>
                    <th>View Bill</th>
                    <th>Comission distribution</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                
                  foreach($ProductList_Array as $key=>$value){
                    echo '<tr><td class="text-capitalize"><a href="user_network.php?id='.$value['purcheser_id']['_id'].'&name='.$value['purcheser_id']['name'].'" title="User network">'.$value['purcheser_id']['name'].'('.$value['purcheser_id']['user_serial_number'].')</a></td>';
                    
                    echo '<td>'.$value['amount'].'</td>';
                    echo '<td>'. date("d-M-Y H:i:s", strtotime($value['created_time'])).'</td>';
                    echo '<td >
                    <a href="view_bill.php?id='.$value['_id'].'" class="purchase-bill" purchase_id="'.$value['_id'].'"  title="View Bill">
                      <span class="icon fa-2x text-yellow-300">
                        
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-view-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                        </svg>
                        
                        <!-- <i class="fa-twitter-square"></i> -->
                      </span></a>
                  </td>';
                  echo '<td >
                    <a href="comission_distribution.php?id='.$value['_id'].'" title="View Comission distribution">
                      <span class="icon fa-2x text-yellow-300">
                        
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-view-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                        </svg>
                        
                        <!-- <i class="fa-twitter-square"></i> -->
                      </span></a>
                  </td></tr>';
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


<?php include("footer.php");?>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
