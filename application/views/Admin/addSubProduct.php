<div class="container">
  <div class="row">
    <div style="margin-top:30px;margin-left: 150px;">
    <!--Material textarea-->

  <?php echo form_open_multipart('Admin/sunProductAdd','','') ?>
  <h2>Add Sub Product</h2>
  <br>
  <br>
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
    <label>Select Product</label>
    
      <select class="" id="division" name="product_id">
        <option>Select Product</option>
        <?php
    foreach($allProduct as $p)
    {
     echo '<option value="'.$p->id.'">'.$p->product_name.'</option>';
    }
    ?>
      </select>
</div>
<div class="form-group">
    <label>Sub Product Name</label>
    <input type="" name="subProduct_name" class="form-control">
</div>
 <label for="pic">Image</label>
  <div class="form-group">
        <?php echo form_upload('img','',''); ?>
      </div>
<div class="form-group">
    <label>Sell Product By Government</label>
    <input type="text" name="sell_price" class="form-control">
</div>
<div class="form-group">
    <label>Buy Product By Government</label>
    <input type="text" name="buy_price" class="form-control">
</div>


<div class="form-group">
        <?php echo form_submit('Add Panel','Post News','class="btn btn-primary"'); ?>
      </div>
      



</div>
  </div>
</div>