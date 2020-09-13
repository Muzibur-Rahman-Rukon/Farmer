</nav>
<br>
<br>
<br>
<br>

<div class="col-lg-12" style="background-color:#563d7c">
	<h2 class="text-center" style="color:white;text-align: center;padding-top: 25px;padding-bottom: 20px">সরকারের কাছে ন্যায্য মূল্যে ফসল বিক্রয় করুণ</h2>
</div>
<div class="row">
	<?php if ($product) {
    	foreach($product as $p){


     ?>
	<div class="col-lg-4">
		<div class="card" style="margin:10px 10px 10px 10px">
  <img class="card-img-top"  src="<?php echo base_url('assets/img/'.$p->img) ?>" height="200px" alt="Card image cap">
  <div class="card-body">
    <a href="<?php echo site_url('home/fetch_subProduct/'.$p->id) ?>"><h5 class="card-title text-center" style="color:white"><?php echo $p->product_name ?></h5></a>
    
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

