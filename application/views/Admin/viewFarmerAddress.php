<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<center>
				<div class="card" style="width: 18rem;">
					
  <img class="card-img-top" src="<?php echo base_url('assets/img/'.$product[0]['pic']) ?>" alt="Card image cap">

  
</div>
			</center>
		</div>
		<div class="col-lg-6">
			<ul class="list-group">
  <li class="list-group-item">Name</li>
  <li class="list-group-item">Division</li>
  <li class="list-group-item">District</li>
  <li class="list-group-item">Sub District</li>
  <li class="list-group-item">Unioun</li>
  <li class="list-group-item">Mobaile Number</li>
  <li class="list-group-item">NID Number</li>
</ul>
		</div>
		<div class="col-lg-6">
			<ul class="list-group">
				
  <li class="list-group-item"><?php echo $product[0]['name'] ?></li>
  <li class="list-group-item"><?php echo $product[0]['division'] ?></li>
  <li class="list-group-item"><?php echo $product[0]['district'] ?></li>
  <li class="list-group-item"><?php echo $product[0]['upozila'] ?></li>
  <li class="list-group-item"><?php echo $product[0]['unioun'] ?></li>
  <li class="list-group-item"><?php echo $product[0]['mobaile'] ?></li>
  <li class="list-group-item"><?php echo $product[0]['nidnumber'] ?></li>
  

</ul>
		</div>
		<div class="col-lg-12">
			<center>
				<button class="btn btn-primary"><a style="color:#ffff" href="<?php echo base_url('admin/farmerOrder') ?>">Ok Back</a></button>
			</center>
		</div>
	</div>
</div>