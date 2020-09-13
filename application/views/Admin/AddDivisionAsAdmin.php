<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-2" style="margin-left: 150px;margin-top: 30px">
			<h2>Give Access</h2>
			<?php echo form_open_multipart('admin/divisionadmin','','') ?>
<input name="division_id" type="hidden" value="<?php echo $division[0]['id']; ?>">
			
			<div class="form-group">
				<label>Division Name</label><br>
				<?php echo form_input('division_name',$division[0]['division_name'],'class="form-congrol"'); ?>
			</div>
			<div class="form-group">
				<label>User Name</label><br>
				<?php echo form_input('username',$division[0]['division_name'],'class="form-congrol"'); ?>
			</div>
			<div class="form-group">
				<label>Password</label><br>
				<?php echo form_input('password','','class="form-congrol"'); ?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Give Access','Give Access','class="btn btn-primary"'); ?>
			</div>
			<div>
      <?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
    </div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>