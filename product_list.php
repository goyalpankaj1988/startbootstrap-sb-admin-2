<?php 
include("header.php");

include("sidebar.php");
include(__DIR__."/controller/product_list.php");
$purchesar_id = $_GET['id'];
$purchesar_name = $_GET['name'];

// print_r($ProductList_Array);
foreach($ProductList_Array as $key=>$value){
  $ProductList_Array[$key]['unit']=0;
  $ProductList_Array[$key]['amount']=0;
}
?>
 <!-- Custom styles for this page -->
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link href="css/mlm.css" rel="stylesheet">


<script type="text/javascript">
  var dataJason = <?php echo json_encode($ProductList_Array); ?>;
  var purcheser_id = '<?php echo $purchesar_id; ?>';
  // for (i=0; i <=dataJason.lenth; )
</script>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include("topbar.html");?>
       
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Purchase for <?php echo $purchesar_name;?></h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Image</th>
                      <th>Quantity</th>
                      <th>MRP</th>
                      <th>DP</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tfoot>
                    
                  </tfoot>
                  <tbody>
                    <?php
                      foreach($ProductList_Array as $key=>$value){
                        $img_url = 'img/product/default_image.png';

                        // $files = readdir('img/product/100');
                        if(is_dir('img/product/'.$value['_id']))
                        {
                          $files =  preg_grep('/^([^.])/', scandir('img/product/'.$value['_id']));
                          foreach ($files as $key => $value_1) {
                            if($value_1)
                            {
                              $img_url = 'img/product/'.$value['_id'].'/'.$value_1;
                            }
                          }
                        }
                        
                       
                        // if(file_exists('img/product/'.$value['_id'].'/1.jpg'))
                        // {
                        //   $img_url = 'img/product/'.$value['_id'].'/1.jpg';
                        // }
                        echo "<tr class='tableDataG'><td>".$value['product_name']."</td>";
                        echo '<td style="width: 10%;"><img class="product-image" style="width: 100%;" src="'.$img_url.'" data-toggle="modal" data-target="#uproductImageModal"/></td>';
                        echo "<td>".$value['quantity']."</td>";
                        echo "<td>".$value['mrp']."</td>";
                        echo "<td id='".$value['_id']."_dp'>".$value['dp']."</td>";
                        echo "<td>".$value['type']."</td>";
                        echo "<td>".$value['status']."</td>";
                        echo '<td><a href="update_product.php?id='.$value['_id'].'&product_name='.$value['product_name'].'&mrp='.$value['mrp'].'&dp='.$value['dp'].'&type='.$value['type'].'&status='.$value['status'].'&quantity='.$value['quantity'].' " title="Update Product" >
                        <span class="icon fa-2x text-yellow-300">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shop-window" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                          </svg>
                          
                        </span>
                        
                        
                      </a></td></tr>';
                        
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!---/ .row ---->

        <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6" style="width: 50%">
         

          
        </div>
        <!-- /.col -->
        <div class="col-xs-6" style="width: 50%">
          <p class="lead"></p>

          
        </div>
        <!-- /.col -->
      </div>
      <!--- /.row --->
      <div class="row no-print">
      
         <div class="col-xs-12" style="width:50%">
         </div>
        <div class="col-xs-12" style="width:50%">
          
          <button type="button" class="btn btn-success pull-right" id="purchase_button" style="float:right; display:none"><i class="fa fa-credit-card"></i> Purchase
          </button>
          <!-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button -->
        </div>
      </div>
       <div class="modal fade" id="uproductImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="product_image">
        
      </div>
      
    </div>
  </div>
</div>

      <!------ /.no-print---->
      <div class="d-flex align-items-center" >
        <div class="spinner-border ml-auto" style="display:none" role="status" aria-hidden="true"></div>
      </div>
              
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     


<?php include("footer.php");?>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script src="js/application/create_purchase.js"></script>
