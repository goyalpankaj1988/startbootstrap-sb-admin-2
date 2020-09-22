<?php 
include("header.php");

include("sidebar.php");
$persone_id = $_GET['id'];
include(__DIR__."/controller/comission_distribution.php");
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
        <h1 class="h3 mb-2 text-gray-800">Comission distribution log </h1>
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
                    <th>Buyer Name</th>
                    <th>Buyer Level</th>
                    <th>Earned amount</th>
                    <th>Comission %</th>
                    <th>Purchased On</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Buyer Name</th>
                    <th>Buyer Level</th>
                    <th>Earned amount</th>
                    <th>Comission %</th>
                    <th>Purchased On</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                <?php
                  $array_count = count($ProductList_Array);
                  foreach($ProductList_Array as $key=>$value){
                    if($value['purchaser_level']==1){
                      $purchaser_level = 'Star';
                    }
                    elseif($value['purchaser_level']==2){
                      $purchaser_level = 'Raising Star';
                    }
                    else{
                      $purchaser_level = 'Lucky Star';
                    }
                    
                    echo '<tr><td class="text-capitalize">'.$value['agent_id']['name'].'</td>';
                    echo '<td >'.$purchaser_level.'</td>';
                    echo '<td >'.$value['commision_amount'].'</td>';
                    echo '<td >'.$value['commision_per'].'</td>';
                    echo '<td>'. date("d-M-Y H:i:s", strtotime($value['created_time'])).'</td>';
                  //   echo '<td  >
                  //   <a href="view_bill.php?id='.$value['purches_id'].'" title="View Bill">
                  //     <span class="icon fa-2x text-yellow-300">
                        
                  //       <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-view-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  //         <path fill-rule="evenodd" d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                  //       </svg>
                        
                  //       <!-- <i class="fa-twitter-square"></i> -->
                  //     </span></a>
                  // </td>';
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

     


<?php include("footer.php");?>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
