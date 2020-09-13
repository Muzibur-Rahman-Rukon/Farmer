<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-2" style="margin-left: 150px;margin-top: 30px">
			<h2>Edit Sub Product</h2>
			<?php echo form_open_multipart('admin/updateProduct','','') ?>
<input name="id" type="hidden" value="<?php echo $product[0]['id']; ?>">
			
			<div class="form-group">
				<label>Product Name</label><br>
				<?php echo form_input('product_name',$product[0]['subProduct_name'],'class="form-congrol"'); ?>
			</div>
			<div class="form-group">
				
				<img width="200px" height="150px" src="<?php echo base_url('assets/img/'.$product[0]['img']) ?>" alt="Card image cap">
			</div>
			<label for="pic">Image</label>
  <div class="form-group">
        <?php echo form_upload('img','',''); ?>
      </div>
			<div class="form-group">
				
			</div>
			<div class="form-group">
    <label>Sell Product By Government</label><br>
    <!-- <input type="text" name="sell_price" class="form-control"> -->
    <?php echo form_input('sell_price',$product[0]['sell_price'],'class="form-congrol"'); ?>
</div>
<div class="form-group">
    <label>Buy Product By Government</label><br>
   <!--  <input type="text" name="buy_price" class="form-control"> -->
    <?php echo form_input('buy_price',$product[0]['buy_price'],'class="form-congrol"'); ?>
</div>
			<div class="form-group">
				<?php echo form_submit('Update','Update','class="btn btn-primary"'); ?>
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