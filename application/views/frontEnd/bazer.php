</nav>
<br>
<br><br>
<br>

<div class="row">
	<div class="col-lg-1" style="margin-top:20px"></div>
	<div class="col-lg-4 btn btn-warning" style="margin-top:20px"><a style="color:black;font-weight: bold" href="<?php if($this->session->userdata('id')){
				echo base_url('home/buy');
			} else{
				echo base_url('home/login');
			} ?>">ক্রয় করুন</a></div>
	<div class="col-lg-2" style="margin-top:20px"></div>
	<div class="col-lg-4 btn btn-info" style="margin-top:20px"><a style="color:white;font-weight: bold" href="<?php if($this->session->userdata('id')){
				echo base_url('home/bkroy');
			} else{
				echo base_url('home/login');
			} ?>">বিক্রয় করুন</a></div>
	<div class="col-lg-1" style="margin-top:20px"></div>
	
		<div class="col-lg-12"><center ><h2 style="padding-top: 20px;padding-bottom: 20px">সর্বোচ্চ বিক্রিত পণ্য</h2></center></div>
		<?php if ($fOrder) {
      foreach($fOrder as $p){


     ?>
<div class="col-lg-4" style="background-color:#90EE90">
     
		<div class="card" style="margin:5px 5px 5px 5px">

  <img class="card-img-top"  height="200px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap">
  <div class="card-body">
  	<center> <h5 style="color:#6B8E23;font-weight: bold" class="card-title"><?php echo $p->product_name ?></h5></center>
   
   
    
  </div>
</div>
</div>
<?php } } ?>
<div class="col-lg-12"><center ><h2 style="padding-top: 20px;padding-bottom: 20px">সর্বোচ্চ ক্রয় কৃত পণ্য</h2></center></div>
		<?php if ($fSell) {
      foreach($fSell as $p){


     ?>
<div class="col-lg-4" style="background-color:#90EE90">
     
		<div class="card" style="margin:5px 5px 5px 5px">

  <img class="card-img-top"  height="200px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap">
  <div class="card-body">
  	<center> <h5 style="color:#6B8E23;font-weight: bold;" class="card-title"><?php echo $p->product_name ?></h5></center>
   
   
    
  </div>
</div>
</div>
<?php } } ?>


	


	
	
	
</div>
