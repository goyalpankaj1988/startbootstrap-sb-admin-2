<?php 
include("header.php");

include("sidebar.php");
$persone_id = $_GET['id'];
$persone_name = $_GET['name'];
include(__DIR__."/controller/payment_log.php");
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
        <h1 class="h3 mb-2 text-gray-800">Payment log for <?php echo $persone_name; ?></h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <!-----<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>----->
          </div>
          <div class="card-body">
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
                    <th>Paid Amount</th>
                    <th>Paid On</th>
                    <th>Transaction id</th>
                    <th>Remark</th>
                    <th>Account Number</th>
                    <th>IFSC</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Paid Amount</th>
                    <th>Paid On</th>
                    <th>Transaction id</th>
                    <th>Remark</th>
                    <th>Account Number</th>
                    <th>IFSC</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                
                  foreach($ProductList_Array as $key=>$value){
                    echo '<tr><td>'.$value['amount'].'</td>';
                    echo '<td>'. date("d-M-Y H:i:s", strtotime($value['created_time'])).'</td>';
                    echo '<td>'.$value['miscellaneous'][0]['transaction'].'</td>';
                    echo '<td>'.$value['miscellaneous'][0]['remark'].'</td>';
                    echo '<td>'.$value['miscellaneous'][0]['account_number'].'</td>';
                    echo '<td>'.$value['miscellaneous'][0]['ifsc'].'</td></tr>';
                    
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
