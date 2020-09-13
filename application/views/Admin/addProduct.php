<div class="container">
  <div class="row">
    <div style="margin-top:30px;margin-left: 150px;">
    <!--Material textarea-->

  <?php echo form_open_multipart('Admin/productAdd','','') ?>
  <h2>Add Product</h2>
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
<input name="addedBy" type="hidden" value="<?php echo $this->session->userdata('name') ?>">
<div class="form-group">
    <label>Product Name</label>
    <input type="text" name="product_name" class="form-control">
</div>
   <label for="pic">Image</label>
  <div class="form-group">
        <?php echo form_upload('img','',''); ?>
      </div>
      <label for="pic">Image-1</label>
  <div class="form-group">
        <?php echo form_upload('img1','',''); ?>
      </div><label for="pic">Image-2</label>
  <div class="form-group">
        <?php echo form_upload('img2','',''); ?>
      </div><label for="pic">Image-3</label>
  <div class="form-group">
        <?php echo form_upload('img3','',''); ?>
      </div><label for="pic">Image-4</label>
  <div class="form-group">
        <?php echo form_upload('img4','',''); ?>
      </div>


<div class="form-group">
    <i class="ti-pencil-alt2 menu-icon"></i>
<label for="exampleFormControlTextarea1">Product Description</label>
  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="description"></textarea>
</div>
<div class="form-group">
    <label>Sell Product By Government</label>
    <input type="text" name="sell_price" class="form-control">
</div>
<div class="form-group">
    <label>Amount Of Available Sell Product</label>
    <input type="number" name="sell_amount" class="form-control">
</div>
<div class="form-group">
    <label>Buy Product By Government</label>
    <input type="text" name="buy_price" class="form-control">
</div>
<div class="form-group">
        <?php echo form_submit('Add Product','Add Product','class="btn btn-primary"'); ?>
      </div>
      



</div>
  </div>
</div>