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
          <h1 class="h3 mb-2 text-gray-800">Product Item Tables</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;">DataTables</h6>
              <button type="button" class="btn btn-primary btn-sm" style="float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_AddPI">Add Product Item</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                        $query = "SELECT * FROM  item";
                        
                        $result = mysqli_query($conn ,$query);
                        if(mysqli_num_rows($result) > 0){

                          while($row = mysqli_fetch_array($result))
                          {
                            echo '
                            <tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["name"].'</td>
                            <td style="width: 150px;"><center><button type="button" class="btn btn-info btn-sm" onclick="AddPD('.$row["id"].')">Add Design</button></center></td>
                            <td style="width: 100px;"><center><button type="button" class="btn btn-danger btn-sm" onclick="ViewPD('.$row["id"].')">View</button></center></td>
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
<div id="myModal_AddPI" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Add Product Item </span></p></center>
        <form>
            <div class="form-group">

                <?php

                        $query ="SELECT id FROM item ORDER BY id ASC";
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
                <div class="form-group">
                    <label for="nic">Product Name</label>
                    <input type="text" class="form-control" id="pname" placeholder="Enter Product Name">
                </div>
              
            </div>
            <button type="button" onclick="myFormAddMain()" id="addPIbtn" name="addPIbtn" class="btn btn-primary btn-sm">Submit</button>
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
<div id="myModal_Design" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Add Product Design</span></p></center>
        <form>
            <div class="form-group">
                <div class="form-group">
                    <label for="nic">Product ID</label>
                    <input type="text" class="form-control"  id="pid"readonly>
                </div>
                <div class="form-group">
                    <label for="contactNo">Catalog</label>
                    <input type="text" class="form-control" id="catalog"  placeholder="Enter Catalog">
                </div>
                <div class="form-group">
                    <label for="contactNo">Unit Price</label>
                    <input type="text" class="form-control" id="unit_price"  placeholder="Enter Unit Price">
                </div>
                <div class="form-group">
                    <label for="contactNo">Size</label>
                    <select class="form-control" id="size">
                      <option value="">Select</option>
                      <option value="Small">Small</option>
                      <option value="Medium">Medium</option>
                      <option value="Large">Large</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="contactNo">Item Stock</label>
                    <input type="text" class="form-control" id="item_stock"  placeholder="Enter Item Stock">
                </div>
                <div class="form-group">
                    <label for="contactNo">Min Level</label>
                    <input type="text" class="form-control" id="minLevel"  placeholder="Enter Min Level">
                </div>
            </div>
            <button type="button" onclick="myFormAdd()" id="addPDbtn" name="addPDbtn" class="btn btn-primary btn-sm">Submit</button>
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

  function ViewPD(id){

  $.ajax({
          url:"../controller/product-item.php",
          method:"POST",
          data:{"View_id":id},
          success:function(data){
            $('#show_view').html(data);
            $('#myModal_ViewPD').modal('show');
          }
    });
  }

  function AddPD(id){

    $('#myModal_Design').modal('show');
    $('#pid').val(id);
  }


  function myFormAdd(){

    var pid =document.getElementById('pid').value;
    var catalog =document.getElementById('catalog').value;
    var unit_price =document.getElementById('unit_price').value;
    var size =document.getElementById('size').value;
    var item_stock =document.getElementById('item_stock').value;
    var minLevel =document.getElementById('minLevel').value;
    var addPDbtn =document.getElementById('addPDbtn').name;

    $.ajax({
          url:"../controller/product-item.php",
          method:"POST",
          data:{pid:pid,catalog:catalog,unit_price:unit_price,size:size,item_stock:item_stock,minLevel:minLevel,addPDbtn:addPDbtn},
          success:function(data){
          
            $('#myModal_Design').modal('hide');
            alert(data);
            location.reload();
          }
    });
    }


  function myFormAddMain(){

    var pname =document.getElementById('pname').value;
    var addPIbtn =document.getElementById('addPIbtn').name;

    $.ajax({
          url:"../controller/product-item.php",
          method:"POST",
          data:{pname:pname,addPIbtn:addPIbtn},
          success:function(data){
           
            $('#myModal_AddPI').modal('hide');
            alert(data);
            location.reload();
          }
     });
   }



</script>

