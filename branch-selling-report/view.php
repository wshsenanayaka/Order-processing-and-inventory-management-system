<!DOCTYPE html>
<html lang="en">
<?php 
    include('../include/check.php'); 
    include('../include/head.php'); 

    $id = $_GET['id'];

    $queryView= "SELECT * FROM  branch_selling_report WHERE id ='$id'";
    $resultView = mysqli_query($conn ,$queryView);
    $count =mysqli_num_rows($resultView);

    if($count>0){

    while($rowView = mysqli_fetch_array($resultView))
    {
            $startDate =$rowView['startDate'];
            $endDate =$rowView['endDate'];
            $reportTitle  =$rowView['reportTitle'];
    }
  }



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
          <h1 class="h3 mb-2 text-gray-800">Branch Selling Report View</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;">Report</h6>
              <button type="button" onclick="myFormGoBack()" class="btn btn-primary btn-sm"  style="float: right;" class="btn btn-info btn-lg" >Go Back</button>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col">
                    <label for="">Start Date - <span><b><?php echo $startDate; ?></b></span></label>

                  </div>
                  <div class="col">
                    <label for="">End Date  - <span><b><?php echo $endDate; ?></b></span></label>

                  </div>
                  <div class="col">
                    <label for="">Report Title  - <span><b><?php echo $reportTitle; ?></b></span></label>

                  </div>
                  <div class="col">
                  <label for=""> </label>
                    <button type="button" onclick="javascript:printDiv('printablediv');" class="btn btn-primary btn-sm" name="branchSellingbtn" id="branchSellingbtn" style="float: right;" class="btn btn-info btn-lg" >Report Print</button>
                  </div>
                </div>
              </form>
              <br>

              <?php

                    $queryView ="SELECT B.name AS cname ,C.name  AS branchName, A.payment_method AS cpayment_method , A.totalAmt AS ctotalAmt , A.id AS cid
                    FROM
                    customer_order A
                        INNER JOIN
                        customer B
                        ON A.cus_id = B.id 
                            INNER JOIN 
                            branch C
                        ON B.branchid = C.id  WHERE A.createDate BETWEEN '$startDate' AND '$endDate'";
                    $resultView = mysqli_query($conn ,$queryView);

                    ?>
                    <div id="printablediv">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Oder No.</th>
                            <th scope="col">Customer Order Name</th>
                            <th scope="col">Branch Name</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Payment Method</th>
                            </tr>
                        </thead>
                            <tbody>

                                <?php

                                        $count =mysqli_num_rows($resultView);

                                        if($count>0){

                                        while($rowView = mysqli_fetch_array($resultView))
                                        {
                                                $cid =$rowView['cid'];
                                                $cname =$rowView['cname'];
                                                $branchName =$rowView['branchName'];
                                                $cpayment_method =$rowView['cpayment_method'];
                                                $ctotalAmt  =$rowView['ctotalAmt'];
                                                echo ' <tr>';
                                                echo '<td>'.$cid.'</td>';      
                                                echo '<td>'.$cname.'</td>';      
                                                echo '<td>'.$branchName.'</td>';   
                                                echo '<td>'.$ctotalAmt.'</td>';     
                                                echo '<td>'.$cpayment_method.'</td>';                    
                                                echo ' </tr>';
                                        }


                                        }else{
                                                $not ="No Record Found";
                                                echo ' <tr>';
                                                echo  $not;               
                                                echo ' </tr>';
                                        
                                        }
                                    
                                ?>
                        
                            </tbody>
                        </table>
                    </div>
                    <br>
                    
                    <?php

              ?>
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
<script>



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

      function myFormGoBack(){

          window.location.href = 'index.php';

      }

    
</script>

