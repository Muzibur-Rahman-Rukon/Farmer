</nav>
<br>
<br>
<br>
<br>
<br>
<div class="col-lg-12" style="background-color: #fff;height: 100px">
  <center>
     <?php if ($this->session->flashdata('class')){ ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <p style="font-weight: bold;color: black">
     <?php echo $this->session->flashdata('message');  ?>দয়া করে আগামী <span style="color:red;font-weight: bold">72</span> ঘন্টার ভিতরে <span style="color: red;font-weight: bold"><?php echo $this->session->flashdata('un');  ?></span> ইউনিয়ন কৃষি অফিসে যোগাযোগ <span style="color: red;font-weight: bold"><?php echo $this->session->flashdata('taka');  ?></span> নিয়ে যোগাযোগ করুন
  </p>
 
  
    
</div>
              
            <?php } else{ ?>
  <h2 style="padding-top: 30px;color: black">নিচের সকল পণ্যের দাম গণপ্রজাতন্ত্রী বাংলাদেশ সরকার কর্তৃক নির্ধারিত</h2>
<?php } ?>
  </center>
</div>

<div class="container">
	<div class="row">
    <div class="col-lg-3"></div>
<div class="col-lg-6">
 
</div>
<div class="col-lg-3"></div>
	
			
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
                                            <a href="<?php echo base_url('home/details/'.$row->id)?>" class="add-to-cart-link" ><i class="fas fa-eye"></i>বিস্তারিত</a>
                                        </div>
                                    </div>
                                    <div class="card" style="">
  <ul class="list-group list-group-flush">
  <li class="list-group-item" style="border: 1px solid black;color:black;cursor: pointer;"><center><?php echo $row->product_name ?></center></li>
  <li class="list-group-item" style="border: 1px solid black;color:black"><span style="font-weight: bold;margin-left: -7%">ক্রয় মূল্য <?php echo $row->buy_price ?> ৳</span><span style="margin-left:7%;font-weight: bold;color:black">বিক্রয় মূল্য <?php echo $row->sell_price ?> ৳</span>
    
                                    	</li>
  <?php 
  $d=$this->modUser->checkStockForBajer($row->id);
  if ($d->sell_amount>0) {
     
   ?>
   <li class="card-body btn btn-primary btn-lg btn-block" style="border: 1px solid black">
    <a class="btn" style="color:white;border: 1px solid white;" href="<?php
     if($this->session->userdata('id')){
        echo site_url('home/CartById/'.$row->id);
     } else{
      echo site_url('Home/login');
     }
      ?>" class="card-link btn">কিনুন</a>
    <a class="btn" style="color:white;border: 1px solid white;margin-left: 20%" href="<?php
     if($this->session->userdata('id')){
        echo site_url('home/farmerSellCart/'.$row->id);
     } else{
      echo site_url('Home/login');
     }
      ?>" class="card-link">বিক্রি করুন</a>
    </li>
 <?php }else{ ?>
  <li class="card-body btn btn-primary btn-lg btn-block" style="border: 1px solid black">
    <a class="btn" style="color:white;border: 1px solid red;" href="" class="card-link btn">নাই</a>
    <a class="btn" style="color:white;border: 1px solid white;margin-left: 20%" href="<?php
     if($this->session->userdata('id')){
        echo site_url('home/farmerSellCart/'.$row->id);
     } else{
      echo site_url('Home/login');
     }
      ?>" class="card-link">বিক্রি করুন</a>
    </li>
 <?php } ?>
    
  </ul>
</div>
                                </div>
                                </div>
			</div>
			<?php 
			if ($count%3==0) {
				
			 ?>
			 <div class="col-lg-3">
			 	<?php 
  $coun=$this->modUser->insertOrderCount($this->session->userdata('id')); 
        if ($flash_count==0 && $coun>0) {
         
        if ($this->session->userdata('id')) {
  
			 		 ?>
			 		 <div class="card" style="margin-top: 16%">
  <div class="card-header">
   <center><h3>বাজারের ব্যাগ</h3></center>
  </div>
  <div class="card-body" style="background-color: white">
    <p class="card-text" style="color:black">আপনি <span style="color:black;font-size: 25px;font-weight: bold;">
      <?php $flash_count++;
      $beg++; 
      echo $coun; ?>
    </span> টি পণ্য পছন্দ করেছেন
    <br>
    <center>
  <a style="margin-top: 8px" href="<?php echo site_url('home/cart') ?>" class="card-link btn btn-primary">দেখুন</a>
  </center>
    
  </div>
</div>
			 <?php 
			}
      } else if($beg==0){

       ?>
       <div class="card" style="margin-top: 16%">
  <div class="card-header">
   <center><h3>বাজারের ব্যাগ</h3></center>
  </div>
  <div class="card-body" style="background-color:#1abc9c">
    <p class="card-text" style="color:white;font-weight: bold;font-size: 15px">আপনি এখনো পর্যন্ত কোন পণ্য কিনে নি</p>
  </div>
</div>
     <?php $beg++;
   } ?>
			 	
			 </div>
			<?php } ?>
                                <?php
                            }
                        }
                        ?>
</div>
</div>