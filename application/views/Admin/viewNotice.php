<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<br>

			<center>
			<h2 >All Notice</h2>
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
      
      <th scope="col">Notice Title</th>
      <th scope="col">Body</th>
      <th scope="col">Times</th>
     
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
        $i=1;
        foreach ($allNotice as $p) {
        	# code...
       

  	 ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
       <td><?php echo $p->notice_title ?></td>
     
     
      <?php 
          $des = $p->notice_body;
          $descri = word_limiter($des, 5);

       ?>
      <td><?php echo $descri ?></td>
         <td><?php echo $p->time ?></td>
     
      <td><button class="btn btn-info"><a style="color:#ffff" href="<?php echo base_url('admin/editNotice/'.$p->notice_id) ?>">Edit</a></button></td>
      <td><button class="btn btn-danger"><a style="color:#ffff" href="<?php echo base_url('admin/deleteNotice/'.$p->notice_id) ?>">Delete</a></button></td>
      
    </tr>
<?php } ?>
  </tbody>
</table>
	</div>
</div>