<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<br>

			<center>
			<h2 >Available Product List</h2>
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
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Description</th>
      <th scope="col">Sell By Government</th>
      <th scope="col">Buy By Government</th>
      <th scope="col">Available</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
        $i=1;
        foreach ($allProduct as $p) {
        	# code...
       

  	 ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td>
      <td><?php echo $p->product_name ?></td>
      <?php 
          $des = $p->description;
          $descri = word_limiter($des, 5);

       ?>
      <td><?php echo $descri ?></td>
      <td><?php echo $p->sell_price ?></td>
      <td><?php echo $p->buy_price ?></td>
      <td><?php echo $p->sell_amount ?>  Kg</td>
      <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/editProduct/'.$p->id) ?>">Edit</a></button></td>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteProduct/'.$p->id) ?>">Delete</a></button></td>
      
    </tr>
<?php } ?>
  </tbody>
</table>
	</div>
</div>