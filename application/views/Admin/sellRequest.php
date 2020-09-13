<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<br>

			<center>
			<h2 >Farmer Sell</h2>
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
      <th scope="col" colspan="4">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
    if ($allsell) {
      
        $i=1;
        foreach ($allsell as $p) {
  $d=$this->modAdmin->fetchDivNameforFarmerOrderById($p->user_id);
  $name=$this->session->userdata('name');
  if (strcmp($d->division,$this->session->userdata('name'))==0) {
     
   

  	 ?>

    <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateBySellNumber($p->id);
       if ($d->request=='0') {

       ?>
       <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/changeFSrequestStatus/'.$p->id) ?>">Accept Request</a></button></td>

     <?php }  ?>
      
     

      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessSell/'.$p->id) ?>">Delete</a></button></td>
      
    </tr>
  <?php }elseif (strcmp($d->district,$this->session->userdata('name'))==0) {
    
  ?>
      <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateBySellNumber($p->id);
       if ($d->request=='0') {

       ?>
       <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/changeFSrequestStatus/'.$p->id) ?>">Accept Request</a></button></td>

     <?php }  ?>
      
     

      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessSell/'.$p->id) ?>">Delete</a></button></td>
      
    </tr>
<?php }elseif (strcmp($d->upozila,$this->session->userdata('name'))==0) {
  # code...
 ?>
     <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateBySellNumber($p->id);
       if ($d->request=='0') {

       ?>
       <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/changeFSrequestStatus/'.$p->id) ?>">Accept Request</a></button></td>

     <?php }  ?>
      
     

      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessSell/'.$p->id) ?>">Delete</a></button></td>
      
    </tr>
<?php }elseif (strcmp($d->unioun,$this->session->userdata('name'))==0) {
  # code...
 ?>
     <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateBySellNumber($p->id);
       if ($d->request=='0') {

       ?>
       <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/changeFSrequestStatus/'.$p->id) ?>">Accept Request</a></button></td>

     <?php }  ?>
      
     

      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessSell/'.$p->id) ?>">Delete</a></button></td>
      
    </tr>
<?php }elseif($this->session->userdata('state')==2){ ?>
      <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->user_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->product_name ?></td>
      <td><?php echo $p->quantity ?></td>
      <td><?php echo $p->total_price ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      <?php 
       
       $d=$this->modAdmin->chekStateBySellNumber($p->id);
       if ($d->request=='0') {

       ?>
       <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/changeFSrequestStatus/'.$p->id) ?>">Accept Request</a></button></td>

     <?php }  ?>
      
     

      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessSell/'.$p->id) ?>">Delete</a></button></td>
      
    </tr>
<?php } ?>
<?php } } ?>
  </tbody>
</table>
	</div>
</div>