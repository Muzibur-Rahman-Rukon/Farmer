
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html" style="margin-left: 30%"><?php 
         if ($this->session->userdata('state')=='2') {
           echo 'Office Name: '.$this->session->userdata('name');
           echo '<br>';

           echo $this->session->userdata('name');
         }
         elseif ($this->session->userdata('state')=='1') {
           echo 'Office Name: Divisional Office';
           echo '<br>';
           echo $this->session->userdata('name');
         }
         elseif ($this->session->userdata('state')=='3') {
           echo 'Office Name: District Office';
           echo '<br>';
           echo $this->session->userdata('name');
         }
         elseif ($this->session->userdata('state')=='4') {
           echo 'Office Name: Sub-District Office';
           echo '<br>';
           $d=$this->modAdmin->fgfg($this->session->userdata('subDistrict_id'));
           echo $this->session->userdata('name');
           echo '<br>';
           echo $d->subDistrict_name;
         }
         elseif ($this->session->userdata('state')=='5') {
           echo 'Office Name: Union Office';
           echo '<br>';
           echo $this->session->userdata('name');
         }
         ?></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url('assets/Admin/images/logo-mini.svg'); ?>" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" href="<?php echo base_url('admin/showMessage') ?>" >
              <i class="ti-email mx-0"></i>
              <?php 
          $chkUnreadMessage=$this->modAdmin->chkUnreadMessage();
          if (count($chkUnreadMessage)>0) {
            # code...
         
               ?>
               <span style="font-weight: bold;color: black" class="count"><?php echo count($chkUnreadMessage); ?></span>
             <?php } ?>
            </a>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="ti-bell mx-0"></i>
             
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item" href="<?php echo base_url('admin/sellRequest') ?>">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="ti-signal mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Farmer's Sell</h6>
                  <?php 
      
        $countPendingSellRequest=$this->modAdmin->countPendingSellRequest();
     
      if($this->session->userdata('state')!=2){
       $count_sellRequestProduct=$this->modAdmin->countFarmerSellRequestByPlace();
       
     }
      if ($this->session->userdata('state')==2) {
       
      
      if (count($countPendingSellRequest)>0) {
        # code...
     
                   ?>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    <?php echo count($countPendingSellRequest) ?> Request Still Pending.
                  </p>
                <?php }
                } else{ ?>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    <?php echo $count_sellRequestProduct; ?>
                    Request Still Pending.
                  </p>
                <?php } ?>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="ti-shopping-cart bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Farmer's Buy</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Farmer's Buy
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img height="60%"  src="<?php echo base_url('assets/Admin/Special/images/LogoMakr_2gooz7.png') ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="<?php echo base_url('Admin/logout') ?>">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/deshboard') ?>">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if ($this->session->userdata('state')!=5) {
          
           ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Branches</span>
              <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <?php if ($this->session->userdata('state')!==4) {
                  # code...
                 ?>
                 <?php if ($this->session->userdata('state')==2) {
              # code...
             ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/Division') ?>">Division</a></li>
              <?php } ?>
               <?php if ($this->session->userdata('state')<=2) {
             
             ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/District') ?>">District</a></li>
              <?php } ?>
              <?php if ($this->session->userdata('state')<4) {
             
             ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/SubDistrict') ?>">Sub District</a></li>
              <?php } ?>
            <?php } ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/Unioun') ?>">Unioun</a></li>

              </ul>
            </div>
          </li>
        <?php } ?>
        <?php 
  if ($this->session->userdata('state')==2) {
    # code...
  
         ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addProduct') ?>">Add Product</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addSubProduct') ?>">Add Sub Product</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewProduct') ?>">View Product</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewSubProduct') ?>">View Sub Product</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/productRequest') ?>">Product Request</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-info menu-icon"></i>
              <span class="menu-title">News</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addNews') ?>">Add News</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewNews') ?>">View News</a></li>
               

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-flag-alt-2"></i>
              <span class="menu-title">&nbsp&nbsp&nbsp&nbsp&nbsp Notice</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addNotice') ?>">Add Notice</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewNotice') ?>">View Notice</a></li>
               

              </ul>
            </div>
          </li>
          <?php } ?>
                    
          <?php
          if ($this->session->userdata('state')==4) {
             # code...
           
           ?>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                
                
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/productRequest') ?>">Product Request</a></li>

              </ul>
            </div>
          </li>
         <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Admin/viewFarmer') ?>">
              <i class="ti-gallery menu-icon"></i>
              <span class="menu-title">View Farmer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-folder menu-icon"></i>
              <span class="menu-title">Government Bazar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                

                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('Admin/farmerOrder') ?>">Farmer's Order</a></li>
       
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('Admin/farmerSell') ?>">Farmer's Sell</a></li>
                
              </ul>
            </div>
          </li>
          <?php
          if ($this->session->userdata('state')<5) {
             # code...
           
           ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Admin/complainBox') ?>">
              <i class="ti-gallery menu-icon"></i>
              <span class="menu-title">Complain Box</span>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>






