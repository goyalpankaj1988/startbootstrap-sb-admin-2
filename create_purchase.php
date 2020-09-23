<?php 
include("header.php");

include("sidebar.php");
include(__DIR__."/controller/product_list.php");
$purchesar_id = $_GET['id'];
$purchesar_name = $_GET['name'];


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
                      <th>Unit</th>
                      <th>Amount</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="5" class="text-right">Total</th>
                      <th id="total_qnt">0</th>
                      <th id="total_amt">0</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      foreach($ProductList_Array as $key=>$value){
                        $img_url = 'img/product/eye_cream.jpg';
                        if(file_exists('img/product/'.$value['_id'].'/1.jpg'))
                        {
                          $img_url = 'img/product/'.$value['_id'].'/1.jpg';
                        }
                        echo "<tr class='tableDataG'><td>".$value['product_name']."</td>";
                        echo '<td style="width: 10%;"><img class="product-image" style="width: 50%;" src="'.$img_url.'" data-toggle="modal" data-target="#uproductImageModal"/></td>';
                        echo "<td>".$value['quantity']."</td>";
                        echo "<td>".$value['mrp']."</td>";
                        echo "<td id='".$value['_id']."_dp'>".$value['dp']."</td>";
                        echo '<td><span class="fa-2x text-success"><i class="far fa-plus-square  ml-1 fa-plus-square-td" data_id="'.$value['_id'].'" ></i></span><span class="ml-1 mr-1 fa-2x" id="'.$value['_id'].'_qnt">0</span><span class="fa-2x text-danger"><i class="far fa-minus-square  fa-minus-square-td" data_id="'.$value['_id'].'"></i></span></td>';
                        echo '<td><span class="amount" id="'.$value['_id'].'_amt">0</span></td></tr>';
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

          <div class="table-responsive">
            <table class="table text-right">
              <tbody><tr>
                <th style="width:50%">Total (INR):</th>
                <td id="total_amt_1">0</td>
              </tr>
              
            </tbody></table>
          </div>
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
