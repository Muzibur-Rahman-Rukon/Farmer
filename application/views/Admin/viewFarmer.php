<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<br>

			<center>
			<h2 >All Registered Farmer</h2>
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
       <th scope="col">Name</th>
       <th scope="col">Division</th>
       <th scope="col">District</th>
       <th scope="col">Sub District</th>
       <th scope="col">Unioun</th>
       <th scope="col">Mobaile</th>
       
      <th scope="col">Image</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
        $i=1;
        if ($allFarmer) {
          # code...
        
        foreach ($allFarmer as $p) {
        	# code...
       

  	 ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $p->name ?></td>
      <td><?php echo $p->division ?></td>
      <td><?php echo $p->district ?></td>
      <td><?php echo $p->upozila ?></td>
      <td><?php echo $p->unioun ?></td>
      <td><?php echo $p->mobaile ?></td>
      
      <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->pic) ?>" alt="Card image cap"></td>

   
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteFarmer/'.$p->id) ?>">Delete</a></button></td>
      
    </tr>
<?php } 
}
?>
  </tbody>
</table>
	</div>
</div>