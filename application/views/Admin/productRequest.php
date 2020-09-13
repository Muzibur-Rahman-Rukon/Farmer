<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<br>

			<center>
			<h2 >All Product Request</h2>
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
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
        $i=1;
        if ($allProduct) {
          # code...
        
        foreach ($allProduct as $p) {
        	# code...
       
        
  	 ?>
     <?php 
     if ($this->session->userdata('state')==4) {
       $d=$this->modAdmin->fetchDivNameforFarmerOrderById($p->user_id);

      if (strcmp($d->upozila, $this->session->userdata('name'))==0) {
         # code...
       
      ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $p->product_name ?></td>
      <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td>
      <?php 
          $des = $p->description;
          $descri = word_limiter($des, 5);

       ?>
      <td><?php echo $descri ?></td>
      <?php 
      if ($this->session->userdata('state')==2) {
        if ($p->requestToSac=='1') {
          # code...
        
      
       ?>
      <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/addProduct') ?>">Add</a></button></td>
    <?php
    } }else{
if ($p->requestToSac=='0') {
     ?>

      <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/sendProductRequestToSec/'.$p->id) ?>">Send Request To Secretariat</a></button></td>
    <?php
}
     } ?>
     <?php 
      if ($this->session->userdata('state')==2) {
        # code...
      
      ?>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteProductRequest/'.$p->id) ?>">Delete</a></button></td>
    <?php } ?>
      
    </tr>
  <?php }
  }elseif($this->session->userdata('state')==2){
       if ($p->requestToSac=='1') {
         # code...
       
  ?>
  <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $p->product_name ?></td>
      <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td>
      <?php 
          $des = $p->description;
          $descri = word_limiter($des, 5);

       ?>
      <td><?php echo $descri ?></td>
      <?php 
      if ($this->session->userdata('state')==2) {
        if ($p->requestToSac=='1') {
          # code...
        
      
       ?>
      <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/addProduct') ?>">Add</a></button></td>
    <?php
    } }else{
if ($p->requestToSac=='0') {
     ?>

      <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/sendProductRequestToSec/'.$p->id) ?>">Send Request To Secretariat</a></button></td>
    <?php
}
     } ?>
     <?php 
      if ($this->session->userdata('state')==2) {
        # code...
      
      ?>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteProductRequest/'.$p->id) ?>">Delete</a></button></td>
    <?php } ?>
      
    </tr>
<?php }
}
 ?>
<?php
} } ?>
  </tbody>
</table>
	</div>
</div>