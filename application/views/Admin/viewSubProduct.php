<div class="container">
	<div class="row">
		<div class="col-lg-12" style="margin-top: 10px;margin-bottom: 10px">
			
		</div>
		<div class="col-lg-12">
      <?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
			<?php if($allSubProduct){ ?>
			<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Sub Product</th>
      <th scope="col">image</th>
      <th scope="col">Sell Price</th>
      <th scope="col">Buy Price</th>
      <th scope="col" colspan="2"><center>Action</center></th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  	$i=1;
     foreach($allSubProduct as $p){

  	 ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <?php 

       $product_name['Pname']=$this->modAdmin->fetchProductNameById($p->product_id);

   ?>
     
      <td><?php echo $product_name['Pname']->product_name ?></td>
      <td><?php echo $p->subProduct_name ?></td>
      <td><img width="80" height="80px" src="<?php echo base_url('assets/img/'.$p->img) ?>" alt="Card image cap"></td>
      <td><?php echo $p->sell_price ?></td>
      <td><?php echo $p->buy_price ?></td>
      <td><button class="btn btn-info"><a style="color: #ffff"  href="<?php echo site_url('admin/editSubProduct/'.$p->id) ?>">Edit</a></button></td><td><button class="btn btn-danger"><a style="color: #ffff"  href="<?php echo site_url('admin/deleteSubProduct/'.$p->id) ?>">Delete</a></button></td>
    </tr>
  <?php }
  } ?>
         
       
      
  
   
    
  </tbody>
</table>

		</div>
	</div>
</div>