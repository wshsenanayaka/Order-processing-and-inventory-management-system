<!DOCTYPE html>
<html lang="en">
<?php 
    include('../include/check.php'); 
    include('../include/head.php'); 
?>

<!-- Custom styles for this page -->
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <?php include('../include/nav.php');  ?>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('../include/nav-1.php');  ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Customer Oder Tables</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;">DataTables</h6>
              <button type="button" class="btn btn-primary btn-sm" style="float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_AddCustOd">Add Customer Oder</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer Name</th>
                      <th>Payment Method</th>
                      <th>Total Cost</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                        $query = "SELECT A.id , B.name AS customerName , A.payment_method , A.totalAmt
                        FROM  customer_order A 
                        INNER JOIN  customer B 
                        ON A.cus_id = B.id";
                    
                        $result = mysqli_query($conn ,$query);
                        if(mysqli_num_rows($result) > 0){

                          while($row = mysqli_fetch_array($result))
                          {
                            echo '
                            <tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["customerName"].'</td>
                            <td>'.$row["payment_method"].'</td>
                            ';
                            if($row["payment_method"] == "Installment"){
                                $newCost = ($row["totalAmt"]/5);
                                echo '<td>'.$payment_method.'</td>';
                            }else if($row["payment_method"] =="Lottery Drawing"){
                                $newCost = ($row["totalAmt"]*(95/100));
                                echo '<td>'.$newCost.'</td>';
                            }else{
                              echo '<td>'.$row["totalAmt"].'</td>';
                            }
                            echo '
                            <td style="width: 150px;"><center><button type="button" class="btn btn-info btn-sm" onclick="AddCO('.$row["id"].')">Add Design</button></center></td>
                            <td style="width: 100px;"><center><button type="button" class="btn btn-danger btn-sm" onclick="ViewCO('.$row["id"].')">View</button></center></td>
                            </tr>
                            ';
                          }
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

      <!-- Footer -->
      <?php include('../include/footer.php');  ?>
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
  <?php include('../include/modal_logout.php');  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>


<!-- Modal -->
<div id="myModal_AddCustOd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Add Customer Oder</span></p></center>
        <form>
            <div class="form-group">

                <?php

                        $query ="SELECT id FROM customer_order ORDER BY id ASC";
                        $result =mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) == 0){
                        $idNext = 1;
                        }else{
                            while($row = mysqli_fetch_array($result))
                            {
                                $id =  $row['id'];
                                $idNext = $id+1;   
                            }
                        }
                ?>

                <div class="form-group">
                    <label for="nic">ID</label>
                    <input type="text" class="form-control" value="<?php echo $idNext; ?>" readonly>
                </div>
                <label for="exampleInputPassword1">Customer</label>
                <select class="form-control" id="customer">
                    <option value="">Select</option>
                    <?php

                        $queryCustomer = "SELECT * FROM  customer";
                        $resultCustomer = mysqli_query($conn ,$queryCustomer);
                        while($rowCustomer = mysqli_fetch_array($resultCustomer)){

                          echo '<option value="'.$rowCustomer['id'].'">'.$rowCustomer['name'].'</option>';
                        }
                    ?>

                </select>
            </div>
            <div class="form-group">
                    <label for="contactNo">Payment Method</label>
                    <select class="form-control" id="payment_method">
                      <option value="">Select</option>
                      <option value="Ready Cash">Ready Cash</option>
                      <option value="Installment">Installment</option>
                      <option value="Lottery Drawing">Lottery Drawing</option>
                  </select>
                </div>
            <button type="button" onclick="myFormAddMain()" id="addCustomerOderbtn" name="addCustomerOderbtn" class="btn btn-primary btn-sm">Submit</button>
        </form>
      </div>
      <div class="modal-footer" style="height: 40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->


<!--------------------------------------------------------- Modal Add RM--------------------------------------------------------- -->
<div id="myModal_CO" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Add Customer Oder Details</span></p></center>
        <form>
            <div class="form-group">
                <div class="form-group">
                    <label for="nic">Customer Oder ID</label>
                    <input type="text" class="form-control"  id="customer_order_id"readonly>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Product Item</label>
                <select class="form-control" id="item_id" >
                    <option value="">Select</option>
                    <?php

                        $queryItem = "SELECT * FROM  item";
                        $resultItem = mysqli_query($conn ,$queryItem);
                        while($rowItem = mysqli_fetch_array($resultItem)){

                          echo '<option value="'.$rowItem['id'].'">'.$rowItem['name'].'</option>';
                        }
                    ?>
                </select>
                </div>

                <div id="show_view_catalog">

                </div>

                <div class="form-group">
                    <label for="contactNo">Quantity</label>
                    <input type="text" class="form-control" id="quantity" onkeyup="myFunction()" placeholder="Enter Quantity">
                </div>

                <div id="show_view_unitPrice">
                  
                </div>

                
            </div>
            <button type="button" onclick="myFormAdd()" id="addCustomerOderItembtn" name="addCustomerOderItembtn" class="btn btn-primary btn-sm">Submit</button>
        </form>
      </div>
      <div class="modal-footer" style="height: 40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->

<div id="show_view">

</div>



<script>

  function ViewCO(id){

  $.ajax({
          url:"../controller/customer-order.php",
          method:"POST",
          data:{"View_id":id},
          success:function(data){
            $('#show_view').html(data);
            $('#myModal_COView').modal('show');
          }
    });
  }


  function AddCO(id){
  
    $('#myModal_CO').modal('show');
    $('#customer_order_id').val(id);
  }



  function myFormAddMain(){

    var customer =document.getElementById('customer').value;
    var payment_method =document.getElementById('payment_method').value;
    var addCustomerOderbtn =document.getElementById('addCustomerOderbtn').name;

    $.ajax({
          url:"../controller/customer-order.php",
          method:"POST",
          data:{customer:customer,payment_method:payment_method,addCustomerOderbtn:addCustomerOderbtn},
          success:function(data){
          
            $('#myModal_AddCustOd').modal('hide');
            alert(data);
            location.reload();
          }
    });
  }


  function myFormAdd(){

    var customer_order_id =document.getElementById('customer_order_id').value;
    var item_id =document.getElementById('item_id').value;
    var catalog =document.getElementById('catalog').value; 
    var quantity =document.getElementById('quantity').value;
    var unitPrice =document.getElementById('unitPrice').value;
    var total = Number(quantity) * Number(unitPrice)
    var addCustomerOderItembtn =document.getElementById('addCustomerOderItembtn').name;

    $.ajax({
          url:"../controller/customer-order.php",
          method:"POST",
          data:{customer_order_id:customer_order_id,item_id:item_id,catalog:catalog,quantity:quantity,unitPrice:unitPrice,total:total,addCustomerOderItembtn:addCustomerOderItembtn},
          success:function(data){
           
            $('#myModal_CO').modal('hide');
            alert(data);
            location.reload();
          }
     });
   }


   $('#item_id').on('change', function() {

      $.ajax({
            url:"../controller/customer-order_copy1.php",
            method:"POST",
            data:{item_id:this.value},
            success:function(data){
              $('#show_view_catalog').html(data);
            }
      });

    });

     function myFunction(){

      var sitem_id =document.getElementById('item_id').value;
      var catalog =document.getElementById('catalog').value;
      
      $.ajax({
            url:"../controller/customer-order_copy.php",
            method:"POST",
            data:{catalog:catalog,sitem_id:sitem_id},
            success:function(data){
              $('#show_view_unitPrice').html(data);
            }
      });


     }
     
     function customerApproval(item_id,quantity,customer_order_id,unit_prize,customer_order_item_id){

      var customerApprovalbtn ="customerApprovalbtn";

      $.ajax({
            url:"../controller/customer-order.php",
            method:"POST",
            data:{item_id:item_id,quantity:quantity,customer_order_id:customer_order_id,unit_prize:unit_prize,customer_order_item_id:customer_order_item_id,customerApprovalbtn:customerApprovalbtn},
            success:function(data){
            
              $('#myModal_COView').modal('hide');
              alert(data);
              location.reload();
            }
      });

    }






     
  

</script>

