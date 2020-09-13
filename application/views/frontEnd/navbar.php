
</head>

<body id="page-top">

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-2" id="mainNav" style="background-color: #1abc9c;" >
    <div class="container">
      
      <span class="spanh1">চাষী</span>
            
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Home') ?>" style="color:#fff">হোম
</a>
          </li>
          
          
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Home/priceList') ?>" style="color:black">দ্রব্য মূল্যের তালিকা</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Home/khobor') ?>" style="color:#fff">খবর</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Home/bazer') ?>" style="color:black">বাজার</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Home/bajer') ?>" style="color:#fff">বাজার</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Home/communication') ?>" style="color:#fff">অনুসন্ধান</a>
          </li>
          
          
         <?php if ($this->session->userdata('id')) { ?>
          <li style="margin-top: -2%;padding-right: 8px; ">
            <a href="<?php echo base_url('home/farmerMessenger') ?>" class="fb-ic">      
 <i class="fab fa-facebook-messenger" style="color: black;font-size: 30px">
   <div style="margin-top:-150%;margin-left: 30%;color:white;font-weight: bold">
     <?php 
   $chkUnreadMessage=$this->modUser->chkUnreadMessage();
                 if (count($chkUnreadMessage)>0) {
    echo count($chkUnreadMessage);
  }else{
    echo "0";
  }
 ?>
   </div>
 </i>
</a>
          </li>
   <li style="margin-top: -2%">
        <a  href="<?php echo base_url('home/allNotification') ?>" class="fb-ic">      
 <i class="fa fa-bell" style="color: black;font-size: 30px">
   <div style="margin-top:-150%;margin-left: 30%;color:white;font-weight: bold">
     <?php 
   $countUserNotification=$this->modUser->countUserNotification();
   if (count($countUserNotification)>0) {
    echo count($countUserNotification);
  }else{
    echo "0";
  }
 ?>
   </div>
 </i>
</a>
   </li>

            <li class="nav-item nav-profile dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <i class="fa fa-user-circle-o" style="color: black;font-size: 30px"></i>
      </a>
      <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url('Home/logout') ?>" style="color:black">লগআউট</a>
        <a class="dropdown-item" href="<?php echo base_url('Home/profile') ?>" style="color:black">প্রফাইল</a>
      </div>
    </li>
         <?php } else{ ?>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Home/login') ?>" style="color:#fff">লগইন</a>
          </li>



         <?php } ?>

          
        </ul>
      </div>
    </div>
    <style type="text/css">
  
.spanh1 {
  font-size: 72px;
  color: #fff;
}


    </style>