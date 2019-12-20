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
          <h1 class="h3 mb-2 text-gray-800">Branch Selling Report</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;">Report</h6>
              <button type="button" onclick="myFormReporView()" class="btn btn-primary btn-sm"  style="float: right;" class="btn btn-info btn-lg" >Report View</button>
            </div>
            <div class="card-body">
              <form>
              <?php if ($_SESSION['user_role_id']==2 || $_SESSION['user_role_id']==1): ?>
                <div class="row">
                  <div class="col">
                    <label for="">Start Date</label>
                    <input type="date" class="form-control" id="startDate">
                  </div>
                  <div class="col">
                    <label for="">End Date</label>
                    <input type="date" class="form-control" id="endDate">
                  </div>
                  <div class="col">        
                      <label for=""> </label>
                      <button type="button" onclick="myFormReport()" class="btn btn-primary btn-sm" name="branchSellingbtn" id="branchSellingbtn" style="float: right;" class="btn btn-info btn-lg" >Report Generate</button>
                  </div>
                            
                </div>
                <?php else: ?>
                <?php endif ?>
              </form>
              <br>
             
                <div id="show_report">

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


  <!-- Modal -->
<div id="myModal_ReportTitel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Branch Selling Report</span></p></center>
        <form>
            <div class="form-group">
                <label for="reportTitle">Report Title</label>
                <input type="text" class="form-control" id="reportTitle"  placeholder="Enter Report Title">
            </div>
            <button type="button" onclick="myFormReportT()" id="addReportTbtn" name="addReportTbtn" class="btn btn-primary btn-sm">Submit</button>
        </form>
      </div>
      <div class="modal-footer" style="height: 40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->

<!-- ----------------------------------------------------------------------------------------------------------------- -->

  <!-- Modal -->
  <div id="myModal_ReportView" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Branch Selling Report View</span></p></center>
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Report Title</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                        $query = "SELECT * FROM branch_selling_report ";

                        $result = mysqli_query($conn ,$query);
                        if(mysqli_num_rows($result) > 0){

                          while($row = mysqli_fetch_array($result))
                          {
                            echo '
                            <tr>
                            <td style="width: 1px!important;">'.$row["id"].'</td>
                            <td>'.$row["reportTitle"].'</td>
                            <td style="width: 1px!important;"><center><button type="button" class="btn btn-info btn-sm" onclick="viewPage('.$row["id"].')">View</button></center></td>
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
      <div class="modal-footer" style="height: 40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->


</body>

</html>
<script>

  function myFormReport(){

    var startDate =document.getElementById('startDate').value;
    var endDate =document.getElementById('endDate').value;
    var branchSellingbtn =document.getElementById('branchSellingbtn').name;

    $.ajax({
          url:"../controller/branch-selling-report.php",
          method:"POST",
          data:{startDate:startDate,endDate:endDate,branchSellingbtn:branchSellingbtn},
          success:function(data){
           
            $('#show_report').html(data);
          
          }
     });
   }

   function printDiv(divID)
    {
      $('#all').modal('hide');
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
          "<html><head><title></title></head><body>" +
          divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }

    function titelForm(){

        $('#myModal_ReportTitel').modal('show');

    }

    function myFormReportT(){

      var startDate =document.getElementById('startDate').value;
      var endDate =document.getElementById('endDate').value;
      var reportTitle =document.getElementById('reportTitle').value;
      var addReportTbtn =document.getElementById('addReportTbtn').name;

      $.ajax({
            url:"../controller/branch-selling-report.php",
            method:"POST",
            data:{startDate:startDate,endDate:endDate,reportTitle:reportTitle,addReportTbtn:addReportTbtn},
            success:function(data){
            
              $('#myModal_ReportTitel').modal('hide');
              alert(data);
              location.reload();
            
            }
      });
      }

      function myFormReporView(){

        $('#myModal_ReportView').modal('show');

      }
      function viewPage(id){

          window.location.href = 'view.php?id='+id;

      }

    
</script>

