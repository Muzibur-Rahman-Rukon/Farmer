<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<br>

			<center>
			<h2 >Farmer's Order</h2>
			<?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
		</center>
		<br>
		</div>
		
		
		<table class="table table-bordered">

  <thead>
    <tr>
   
       <th scope="col">Name</th>
       <th scope="col">product_name</th>
       <th scope="col">product_quantity</th>
       <th scope="col">total_price</th>
     <!--  <th scope="col">Image</th> -->
      <th scope="col" colspan="4">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
        $i=1;
        foreach ($allorder as $p) {
        
  $d=$this->modAdmin->fetchDivNameforFarmerOrderById($p->user_id);
  $name=$this->session->userdata('name');
  
  
 
     
?>

  <?php if (strcmp($d->division,$this->session->userdata('name')) == 1) {
    
    ?>

    <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->product_quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateByOrderNumber($p->id);
       if ($d->status=='0') {

       ?>
       <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/changeDelivaryStatus/'.$p->id) ?>">Delivary Incomplite</a></button></td>

     <?php } else{ ?>
      <td><button class="btn btn-success"><a style="color:#ffff" href="#">Delivary Complite</a></button></td>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessDelivary/'.$p->id) ?>">Delete</a></button></td>
     <?php } ?>

      <td><button class="btn btn-success"><a style="color:#ffff" href="<?php echo base_url('admin/viewFarmerAddress/'.$p->user_id) ?>">View Farmer Address</a></button></td>
      
    </tr>
    <?php
  }elseif (strcmp($d->district,$this->session->userdata('name')) == 0) {
    ?>
       <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->product_quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateByOrderNumber($p->id);
       if ($d->status=='0') {

       ?>
       <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/changeDelivaryStatus/'.$p->id) ?>">Delivary Incomplite</a></button></td>

     <?php } else{ ?>
      <td><button class="btn btn-success"><a style="color:#ffff" href="#">Delivary Complite</a></button></td>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessDelivary/'.$p->id) ?>">Delete</a></button></td>
     <?php } ?>

      <td><button class="btn btn-success"><a style="color:#ffff" href="<?php echo base_url('admin/viewFarmerAddress/'.$p->user_id) ?>">View Farmer Address</a></button></td>
      
    </tr>
    <?php
  } elseif (strcmp($d->upozila,$this->session->userdata('name'))== 0) {
   ?>
          <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->product_quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateByOrderNumber($p->id);
       if ($d->status=='0') {

       ?>
       <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/changeDelivaryStatus/'.$p->id) ?>">Delivary Incomplite</a></button></td>

     <?php } else{ ?>
      <td><button class="btn btn-success"><a style="color:#ffff" href="#">Delivary Complite</a></button></td>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessDelivary/'.$p->id) ?>">Delete</a></button></td>
     <?php } ?>

      <td><button class="btn btn-success"><a style="color:#ffff" href="<?php echo base_url('admin/viewFarmerAddress/'.$p->user_id) ?>">View Farmer Address</a></button></td>
      
    </tr>
   <?php
  } elseif (strcmp($d->unioun,$this->session->userdata('name')) == 0 ) {
    ?>
    <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->product_quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateByOrderNumber($p->id);
       if ($d->status=='0') {

       ?>
       <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/changeDelivaryStatus/'.$p->id) ?>">Delivary Incomplite</a></button></td>

     <?php } else{ ?>
      <td><button class="btn btn-success"><a style="color:#ffff" href="#">Delivary Complite</a></button></td>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessDelivary/'.$p->id) ?>">Delete</a></button></td>
     <?php } ?>

      <td><button class="btn btn-success"><a style="color:#ffff" href="<?php echo base_url('admin/viewFarmerAddress/'.$p->user_id) ?>">View Farmer Address</a></button></td>
      
    </tr>
    <?php
  } elseif($this->session->userdata('state')==2){ ?>
        <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->product_quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateByOrderNumber($p->id);
       if ($d->status=='0') {

       ?>
       <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/changeDelivaryStatus/'.$p->id) ?>">Delivary Incomplite</a></button></td>

     <?php } else{ ?>
      <td><button class="btn btn-success"><a style="color:#ffff" href="#">Delivary Complite</a></button></td>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessDelivary/'.$p->id) ?>">Delete</a></button></td>
     <?php } ?>

      <td><button class="btn btn-success"><a style="color:#ffff" href="<?php echo base_url('admin/viewFarmerAddress/'.$p->user_id) ?>">View Farmer Address</a></button></td>
      
    </tr>
  <?php } ?>
<?php
  }
  ?>
  </tbody>
</table>
	</div>
</div>