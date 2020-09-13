<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6" style="margin-left: 200px;margin-top: 50px">
			<h2>Add Panel User</h2>
			<br>
			<?php echo form_open_multipart('admin/addPanelUser','','') ?>
			<div class="form-group">
      <label for="sel1">Select Role</label>
      <select class="" id="division" name="panelUserType">
        <option>Select Role</option>
        <?php
    foreach($allPanel as $panel)
    {
     echo '<option value="'.$panel->panel_name.'">'.$panel->panel_name.'</option>';
    }
    ?>
      </select>
  </div>    <label for="sel1">Name Of The User</label>
			<div class="form-group">
				<?php echo form_input('name','Name','class="form-congrol"'); ?>
			</div>
			<label for="sel1">Password</label>
			<div class="form-group">
				<?php echo form_input('password','Password','class="form-congrol"'); ?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Add Panel','Add User','class="btn btn-primary"'); ?>
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