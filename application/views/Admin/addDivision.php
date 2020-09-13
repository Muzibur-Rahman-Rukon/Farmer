<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6" style="margin-left: 200px;margin-top: 50px">
			<h2>Add Division</h2>
			<?php echo form_open_multipart('admin/adDivision','','') ?>
			<div class="form-group">
				<?php echo form_input('division_name','','class="form-congrol"'); ?>
			</div>
			
			<div class="form-group">
				<?php echo form_submit('Add Division','Add Division','class="btn btn-primary"'); ?>
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
	</div>
</div>