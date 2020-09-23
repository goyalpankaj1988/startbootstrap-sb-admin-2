<?php 
include("header.php");
?>
<script src="js/application/view_bill.js"></script>

<?php
include("sidebar.php");
$purchase_id = $_GET['id'];
include(__DIR__."/controller/view_bill.php");
$purchaseDetails = $purchaseBillArr[0]['purcheser_id'];
// print_r($purchaseBillArr);
?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        
         <?php include("topbar.html");?>

       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
        
          
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
          </div>
          
          <div class="card-body">
            <section class="invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="page-header">
                    
                    <!-- <i class="fa fa-globe"></i>  -->
                    AdminLTE, Inc.
                    <!-- <small class="text-right">Date: 2/10/2014</small> -->
                  </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $purchaseDetails['name']; ?></strong><br>
                    <?php echo $purchaseDetails['address1'];
                    if(isset($purchaseDetails['address2']))
                    {
                      echo $purchaseDetails['address2'];

                    }?><br>
                    <?php echo $purchaseDetails['zipcode'];?>,<?php echo $purchaseDetails['state'];?>,
                    <?php echo $purchaseDetails['country'];?><br>
                    Phone: <?php echo $purchaseDetails['mobile'];?><br>
                    Email: <?php echo $purchaseDetails['email_id'];?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <br>
                  
                  <b>Payment mode:</b> <?php echo $purchaseDetails['paymet_mode']=='offline'?"Paid Online":"COD";?><br>
                  <b>Purchase Id:</b> <?php echo $purchaseDetails['_id'];?><br>
                  <b>Purchase Time:</b> <?php echo date("d-M-Y H:i:s", strtotime($purchaseDetails['created_time']));?><br>
                  <!-- <b>Account:</b> <?php echo $purchaseDetails['account_number'];?> -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
        
              <!-- Table row -->
              <div class="row">
                <div class="col-xs-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>    
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal(INR)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $arr = array("dsdd");
                    foreach($purchaseBillArr[0]['item'] as $key=>$value){?>  
                    <tr>
                      <td style="margin-left:5px;"><?php echo $value['unit'].'  ';?></td>
                      <td style="margin-left:5px;"><?php echo $value['product_name'].'  ';?></td>
                      <td style="margin-left:5px;"><?php echo $value['_id'].'  ';?></td>
                      <td style="margin-left:5px;"><?php
                        if(isset($value['description']))
                        {
                          echo $value['description']; 
                        }
                        else
                        {
                          echo $value['product_name']; 
                        }

                      ?></td>
                      <td style="margin-left:5px;"><?php echo $value['amount'].'  '; ?></td>
                    </tr>
                    <?php  }?>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
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
                <td id="total_amt_1"><span class="font-weight-bold"><?php echo $purchaseBillArr[0]['amount']; ?></span></td>
              </tr>
              
            </tbody></table>
          </div>
        </div>
              
              
            </section>
          </div>
          <!-- this row will not appear when printing -->
              <div class="row no-print ml-2">
                <div class="col-xs-12 float-right">
                  <a href="#" onclick="PrintDiv()" target="_blank" class="btn btn-default" ><i class="fa fa-print"></i> Print</a>
                  
                </div>
              </div>
        </div>

      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php include("footer.php");?>