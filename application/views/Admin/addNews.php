<div class="container">
  <div class="row">
    <div style="margin-top:30px;margin-left: 150px;">

  <?php echo form_open_multipart('Admin/newsAdd','','') ?>
  <h2>Add News</h2>
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
    <label>News Title</label>
    <input type="text" name="news_title" class="form-control">
</div>


   <label for="pic">Image</label>
  <div class="form-group">
        <?php echo form_upload('img','',''); ?>
      </div>


<div class="form-group">
    <i class="ti-pencil-alt2 menu-icon"></i>
  <label for="exampleFormControlTextarea1">News Body</label>
  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="news_body"></textarea>
</div>

<div class="form-group">
        <?php echo form_submit('Add News','Add News','class="btn btn-primary"'); ?>
      </div>
      



</div>
  </div>
</div>