<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<br>

			<center>
			<h2 >Farmer's Complain</h2>
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
       <th scope="col">Complain</th>
       
     <!--  <th scope="col">Image</th> -->
      <th scope="col" colspan="4">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
        $i=1;
        foreach ($allorder as $p) {
        
  
  
  
 
     
?>

  

    <tr>
     
      <?php 

       $pro['Pname'] = $this->modAdmin->fetchFarmerNameById($p->farmer_id);
       if ($pro['Pname']) {
         
   ?>
     
      <td><?php echo $pro['Pname']->name ?></td>
    <?php } ?>
      <td><?php echo $p->body ?></td>
      <!-- <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td> -->
      
       

   
      <?php 
      if ($this->session->userdata('state')==2) {
        # code...
      
       ?>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmerSuccessDelivary/'.$p->id) ?>">Delete</a></button></td>
    
<?php } ?>
     
      
    </tr>

  <?php  ?>
<?php
  }
  ?>
  </tbody>
</table>
	</div>
</div>