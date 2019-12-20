      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="../content/home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../user">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>User</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contact</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ProductList" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Product</span>
        </a>
        <div id="ProductList" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product List</h6>
            <a class="collapse-item" href="../product-item">Product Add Item</a>
            <a class="collapse-item" href="../product-materal">Product Add Materal</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../row-materal">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Row Materal</span></a>
      </li>
      <?php if ($_SESSION['user_role_id']==2 || $_SESSION['user_role_id']==1): ?>
        <li class="nav-item">
          <a class="nav-link" href="../supplier">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Supplier</span></a>
        </li>
      <?php else: ?>
      <?php endif ?>
     
      <li class="nav-item">
        <a class="nav-link" href="../customer">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Customer</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-bars"></i>
          <span>Oder</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Order List</h6>
            <?php if ($_SESSION['user_role_id']==2 || $_SESSION['user_role_id']==1): ?>
                 <a class="collapse-item" href="../supplier-oder">Supplier Order</a>
            <?php else: ?>
            <?php endif ?>
            <a class="collapse-item" href="../customer-order">Customer Order</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ReportList" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Report</span>
        </a>
        <div id="ReportList" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Report List</h6>
            <a class="collapse-item" href="../row-materal-report">Row Materal </a>
            <a class="collapse-item" href="../product-item-report">Product Item</a>
            <a class="collapse-item" href="../supplier-details-report">Supplier Details</a>
            <a class="collapse-item" href="../monthly-income-report">Monthly Income</a>
            <a class="collapse-item" href="../branch-selling-report">Branch Selling </a>
          </div>
        </div>
      </li>

