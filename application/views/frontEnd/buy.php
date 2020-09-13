</nav>
<br>
<br>


<div class="col-lg-12" style="background-color: #1abc9c;height: 120px">
	<center>
    <?php if($this->session->flashdata('msge')){ ?>
    <h2 class="text-center" style="color:white;text-align: center;padding-top: 20px;padding-bottom: 20px"><?php echo $this->session->flashdata('msge') ?> <br>
    দয়া করে আগামী ৭২ ঘন্টার ভিতরে<span style="color:red"> <?php echo $this->session->flashdata('un') ?></span> কৃষি অফিসে যোগাযোগ করুন</h2>
  <?php } else{ ?>

  <h2 style="padding-top: 30px;color: #ffff">নিচের সকল পণ্যের দাম গণপ্রজাতন্ত্রী বাংলাদেশ সরকার কর্তৃক নির্ধারিত</h2>
<?php } ?>
		
	</center>
</div>
<div class="container">
<div class="row">

<div class="col-lg-12">বাজারের ব্যাগ<i class="fas fa-hand-point-right"></i><a href="<?php echo site_url('home/cart') ?>"><i class="fas fa-shopping-cart" style="font-size: 28px"></a></i></div>

	<?php if ($product) {
    	foreach($product as $p){


     ?>
	
	<div class="col-lg-3 card" style="margin: 15px 0px 0px 0px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    
		<!-- <div class="card" style="width: 18rem;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"> -->
  <img class="card-img-top" id="img" height="200px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" id="pn" style="color:#228B22"><center ><?php echo $p->product_name; ?></center></h5>
    <?php 
         $string=$p->description;
         $string=word_limiter($string, 15);

     ?>
    <p class="card-text" id="des"><?php echo $string ?></p>
  </div>
  <h5 class="card-title" id="price"><center>দাম<span style="color:#800000"><?php echo $p->sell_price; ?></span>টাকা মাএ</center></h5>
  <div class="card-body">
  	
    <span style="margin-left: 40%"><a href="<?php echo site_url('home/CartById/'.$p->id) ?>" class="btn btn-primary btn-sm icon">কিনুন</a></span>
   
   <!--  <button class="SeeMore2">See More</button> -->
  </div>
<!-- </div> -->
</div>



<?php }
} 

 ?>
 </div>
 <script>
   $('.icon').click(function(){
        var $this = $(this);
        $this.toggleClass('icon');
        if($this.hasClass('icon')){
                    
        } else {
            $this.text('জমা হয়েছে');
        }
    });

</script>
  </div>
 


	
