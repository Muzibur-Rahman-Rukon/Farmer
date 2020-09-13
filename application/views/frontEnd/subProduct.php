</nav>
<br>
<br>

<div class="col-lg-12" style="background-color:#563d7c">
	<?php if($this->session->flashdata('msg')){ ?>
		<h2 class="text-center" style="color:white;text-align: center;padding-top: 25px;padding-bottom: 20px"><?php echo $this->session->flashdata('msg') ?> <br>
    দয়া করে আগামী ৭২ ঘন্টার ভিতরে আপনার ফসল সাথে নিয়ে<span style="color:red"> <?php echo $this->session->flashdata('un') ?></span> ইউনিয়ন কৃষি অফিসে যোগাযোগ করুন</h2>
	<?php } else{ ?>

	<h2 class="text-center" style="color:white;text-align: center;padding-top: 25px;padding-bottom: 20px">সরকারের কাছে ন্যায্য মূল্যে ফসল বিক্রয় করুণ</h2>
<?php } ?>
</div>
<div class="row">
	<?php if ($subProduct) {
    	foreach($subProduct as $p){


     ?>
	<div class="col-lg-4">
		<div class="card" style="margin:10px 10px 10px 10px">
  <img class="card-img-top"  src="<?php echo base_url('assets/img/'.$p->img) ?>" height="200px" alt="Card image cap">
  <div class="card-body">
    <a href="<?php echo site_url('home/farmerSellCart/'.$p->id) ?>"><h5 class="card-title text-center" style="color:white"><?php echo $p->subProduct_name ?></h5>
    </a>
   
  </div>
</div>
	</div>
<?php }
} 

 ?>
	
</div>
<style type="text/css">
	.card-body{
		background-color:#903110;
	}
	.card-body:hover{
         background-color: #4CAF50;
	}
</style>