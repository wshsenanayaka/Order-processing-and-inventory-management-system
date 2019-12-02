<!DOCTYPE html>
<html lang="en">

<?php include('../include/head.php');  ?>

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
          <h1 class="h3 mb-2 text-gray-800">User Tables</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;">DataTables</h6>
              <button type="button" class="btn btn-primary btn-sm" style="float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_Adduser">Add User</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>NIC</th>
                      <th>Branch</th>
                      <th>Role</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>942291983v</td>
                      <td>Edinburgh</td>
                      <td>Admin</td>
                     
                      <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_Edituser">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm" onclick="myFunction()">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>942201983v</td>
                      <td>Denikade</td>
                      <td>Manger</td>
                  
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>942281983v</td>
                      <td>Bothalegama</td>
                      <td>Operator</td>
                    
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>942991983v</td>
                      <td>Edinburgh</td>
                      <td>Manger</td>
                  
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>942291883v</td>
                      <td>Denikade</td>
                      <td>Admin</td>
                    
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>942297983v</td>
                      <td>Bothalegama</td>
                      <td>Operator</td>
                     
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Herrod Chandler</td>
                      <td>942261983v</td>
                      <td>Bothalegama</td>
                      <td>Operator</td>
                   
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Rhona Davidson</td>
                      <td>944291983v</td>
                      <td>Denikade</td>
                      <td>Admin</td>

                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Colleen Hurst</td>
                      <td>942297983v</td>
                      <td>Bothalegama</td>
                      <td>Manger</td>
                    
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Sonya Frost</td>
                      <td>942391983v</td>
                      <td>Edinburgh</td>
                      <td>Operator</td>
                     
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Jena Gaines</td>
                      <td>922291983v</td>
                      <td>Bothalegama</td>
                      <td>Admin</td>
                     
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Quinn Flynn</td>
                      <td>942221983v</td>
                      <td>Edinburgh</td>
                      <td>Manger</td>
                  
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Charde Marshall</td>
                      <td>922291983v</td>
                      <td>Bothalegama</td>
                      <td>Admin</td>

                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Haley Kennedy</td>
                      <td>945291983v</td>
                      <td>Bothalegama</td>
                      <td>Manger</td>

                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                      <td>Tatyana Fitzpatrick</td>
                      <td>942691983v</td>
                      <td>Bothalegama</td>
                      <td>Admin</td>
                   
                      <td><button type="button" class="btn btn-info btn-sm">Edit</button></td>
                      <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                   
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
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
<div id="myModal_Adduser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Add User</span></p></center>
        <form>
            <div class="form-group">
                <label for="nic">NIC</label>
                <input type="text" class="form-control" id="nic"  placeholder="Enter NIC">
            </div>
            <div class="form-group">
                <label for="contactNo">Contact No</label>
                <input type="text" class="form-control" id="contactNo"  placeholder="Enter Contact Number">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username"  placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Branch</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="">Select</option>
                    <option value="denikade">Denikade</option>
                    <option value="Bothalegama">Bothalegama</option>
                    <option value="bothalegama">Bothalegama</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">User Role</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="manger">Manger</option>
                    <option value="operator">Operator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
      </div>
      <div class="modal-footer" style="height: 40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!-- Modal -->
<div id="myModal_Edituser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Edit User</span></p></center>
        <form>
            <div class="form-group">
                <label for="nic">NIC</label>
                <input type="text" class="form-control" id="nic"  placeholder="Enter NIC">
            </div>
            <div class="form-group">
                <label for="contactNo">Contact No</label>
                <input type="text" class="form-control" id="contactNo"  placeholder="Enter Contact Number">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username"  placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Branch</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="">Select</option>
                    <option value="denikade">Denikade</option>
                    <option value="Bothalegama">Bothalegama</option>
                    <option value="bothalegama">Bothalegama</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">User Role</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="manger">Manger</option>
                    <option value="operator">Operator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
      </div>
      <div class="modal-footer" style="height: 40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
 
  function myFunction(){

      alert('Are you sure you want to delete this record?')
  }

</script>

