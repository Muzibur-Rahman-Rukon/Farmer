</nav>

  <!-- Masthead -->
 
    <!-- <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase font-weight-bold" style="color:white;text-shadow: 2px 1px">সরকার নির্ধারিত মূল্যে আপনার ফসল কেনা-বেচা করুণ,
কৃষি বান্ধব সরকার গঠনে সহায়তা করুণ।</h1>
          <center><hr class="divider my-6"></center>
        </div>
        <div class="col-lg-8 align-self-baseline">
         
 <?php if (!$this->session->userdata('id')) {
 ?>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo base_url('home/rgisterpage') ?>">একাউন্ট খুলুন</a>
        <?php } ?>
        </div>
      </div>
    </div> -->
   
<div class="container">
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10%"></div>
    <div class="col-lg-12" style="background-color: white">
      <center>
        <h2 style="padding-top: 30px;color: black">সরকার নির্ধারিত দামে সকল কৃষিজাত পণ্য কেনা-বেচা করা হয়</h2>
      </center>
    </div>
    <div class="col-lg-12" >
      <span style="margin-left: 90%">
        <?php if (!$this->session->userdata('id')) {
 ?>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo base_url('home/rgisterpage') ?>">একাউন্ট খুলুন</a>
        <?php } ?>
      </span>
    </div>
   <?php
                        if(isset($product)){
                          $count=0;
                          $flash_count=0;
                          $beg=0;
                            foreach ($product as $row){
                              $count++;
                                ?>
                                <div class="col-lg-3">
              <div class="product-carousel">

                                <div class="single-product" style="border: 1px solid black">
                                    <div class="product-f-image">
                <img style='height:250px; width:300px' src="<?php echo base_url()?>assets/img/<?php echo $row->img ?>" alt="">
                                        <div class="product-hover">
                                            <a href="<?php echo base_url('Home/bajer')?>" class="add-to-cart-link" ><i class="fas fa-info"></i> বাজার</a>
                                        </div>
                                    </div>
                                    <div class="card" style="">
  <ul class="list-group list-group-flush"><a href="<?php echo base_url('Home/bajer')?>">
  <li class="list-group-item" style="border: 1px solid black;color:black;cursor: pointer;"><center><?php echo $row->product_name ?></center></li></a>

 
    
  </ul>
</div>
                                </div>
                                </div>
      </div>
    <?php }
    } ?>
 <div class="col-lg-12" style="background-color: white">
      <center>
        <h2 style="padding-top: 30px;color: black">সরকারি উদ্যোগে কৃষি বিষয়ক সর্বশেষ খবর</h2>
        </center>
        </div>
        <div class="col-lg-12" >
      <span style="margin-left: 90%">
        <?php if (!$this->session->userdata('id')) {
 ?>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo base_url('home/rgisterpage') ?>">একাউন্ট খুলুন</a>
        <?php } ?>
      </span>
    </div>
        <?php
                        if(isset($news)){
                          $count=0;
                          $flash_count=0;
                          $beg=0;
                            foreach ($news as $row){
                              $count++;
                                ?>
                                <div class="col-lg-3">
              <div class="product-carousel">

                                <div class="single-product" style="border: 1px solid black">
                                    <div class="product-f-image">
                <img style='height:250px; width:300px' src="<?php echo base_url()?>assets/img/<?php echo $row->img ?>" alt="">
                                        <div class="product-hover">
                                            <a href="<?php echo base_url('Home/khobor')?>" class="add-to-cart-link" >
                      <i class="fas fa-newspaper"></i> খবর</a>
                                        </div>
                                    </div>
                                    <div class="card" style="">
  <ul class="list-group list-group-flush"><a href="<?php echo base_url('Home/khobor')?>">
  <li class="list-group-item" style="border: 1px solid black;color:black;cursor: pointer;"><center><?php
    $des = $row->news_title;
          $descri = word_limiter($des, 5);
   echo $descri ?></center></li></a>

 
    
  </ul>
</div>
                                </div>
                                </div>
      </div>
    <?php }
    } ?>
    <div class="col-lg-12" style="margin-top:1%;margin-bottom: 5%"></div>  
    
  </div>
</div>
