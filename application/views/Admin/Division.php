<div class="container">
	<div class="row">
		<div class="col-lg-12" style="margin-top: 10px;margin-bottom: 10px">
			<span style="margin-left: 50%">
				<button class="btn btn-info"><a style="color:white" href="<?php echo base_url('admin/addDivision') ?>">Add Division</a></button>
			</span>
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
			<?php if($division) ?>
			<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Division Name</th>
      <th scope="col" colspan="4">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  	$i=1;
     foreach($division as $p){

  	 ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $p->division_name ?></td>
      <td><button class="btn btn-info"><a style="color: #ffff" href="<?php echo site_url('admin/editDivision/'.$p->id) ?>">Edit</a></button> </td>
      <td><button class="btn btn-danger"><a style="color: #ffff"  href="<?php echo site_url('admin/DeleteDivision/'.$p->id) ?>">Delete</a></button></td>
      <?php 
       $div=$this->modAdmin->chekDivExistenceInAdmin($p->division_name,$p->id);
       $d=$this->modAdmin->chekStateByDivision($p->id,$p->division_name);
      
         
       
       if (count($div)==0) {
         # code...
      

   ?>
      <td><button class="btn btn-success"><a style="color: #ffff"  href="<?php echo site_url('admin/AddDivisionAsAdmin/'.$p->id) ?>">Give Access Of This Website</a></button></td>
    <?php } elseif ($d) {
      if ($d->state=='1') {
       
    
         
     ?>
      <td><button class="btn btn-success"><a style="color: #ffff" >Permission Still Running</a></button></td>
      <td><button class="btn btn-danger"><a style="color: #ffff"  href="<?php echo site_url('admin/abortAccess/'.$p->id) ?>">Deny Access</a></button></td>
    <?php } elseif ($d->state=='0') {
      # code...
    ?>
    <td><button class="btn btn-danger"><a style="color: #ffff">Permission is Denied</a></button></td>
    <td><button class="btn btn-success"><a style="color: #ffff"  href="<?php echo site_url('admin/givePermissionForAdmin/'.$p->id) ?>">Give Access</a></button></td>
  <?php }
  } ?>
    </tr>
<?php } ?>
    
  </tbody>
</table>

		</div>
	</div>
</div>