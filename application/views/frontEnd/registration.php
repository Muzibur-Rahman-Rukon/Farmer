</nav>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row">
    
  
<div class="col-md-2"></div>
<div class="col-md-7 st">
  <center><h2 style="margin-top:2%">নিবন্ধন ফরম</h2></center>
  <?php if($this->session->flashdata('class')): ?>
    <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">
      
  <span style="margin-left: 180px">
    <?php echo $this->session->flashdata('message'); ?>
  </span>
  
    </div>
    
<?php endif; ?>
<form style="margin-bottom: 5%" action="<?php echo site_url('home/registration'); ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">আপনার নাম</label>
    <input type="text" class="form-control" id="text" name="name">
    <div class="text-danger"><?=form_error('name')?></div>
  </div>
  <div class="form-group">
      <label for="sel1">বিভাগ</label>
      <select class="form-control" id="division" name="division">
        <option>বিভাগ বাছাই করুণ</option>
        <?php
    foreach($division as $row)
    {
     echo '<option value="'.$row->id.'">'.$row->division_name.'</option>';
    }
    ?>
      </select>
  </div>
  <div class="form-group">
      <label for="sel1">জেলা</label>
      <select class="form-control" id="district" name="district">
        <option value="">জেলা বাছাই করুণ</option>
        
      </select>
  </div>
  <div class="form-group">
      <label for="sel1">উপজেলা</label>
      <select class="form-control" id="subDistrict" name="upozila">
        <option value="">উপজেলা বাছাই করুণ</option>
        
      </select>
  </div>
  <div class="form-group">
      <label for="sel1">ইউনিয়ন
</label>
      <select class="form-control" id="unioun" name="unioun">
        
        <option value="">ইউনিয়ন বাছাই করুণ</option>
        
      </select>
  </div>
  <div class="form-group">

    <label for="pic">মোবাইল নম্বর</label>
    <input type="tel" class="form-control" id="mobaile" name="mobaile">

  </div>

  <div class="form-group">
    <label for="pwd">জাতীয় পরিচয় পএ নম্বর</label>
    <input type="number" class="form-control"  id="pwd" name="nidnumber" value="<?php echo set_value('nidnumber'); ?>" />
    <div class="text-danger"><?php echo form_error('nidnumber'); ?></div></br>
  </div>
  <div class="form-group">

    <label for="pic">আপনার ছবি</label>
    <input type="file" class="form-control" id="pic" name="pic">

  </div>
  <div class="form-group">
    <label for="pwd">পাসওয়ার্ড</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">জমা দিন</button>
</form>

</div>
<div class="col-md-3"></div>
<script>
$(document).ready(function(){
 $('#division').change(function(){
  var division_id = $('#division').val();
  if(division_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>home/fetch_district",
    method:"POST",
    data:{division_id:division_id},
    success:function(data)
    {
     $('#district').html(data);
     $('#subDistrict').html('<option value="">উপজেলা বাছাই করুণ</option>');
    }
   });
  }
  else
  {
   $('#district').html('<option value="">Select State</option>');
   $('#subDistrict').html('<option value="">উপজেলা বাছাই করুণ</option>');
  }
 });

 $('#district').change(function(){

  var district_id = $('#district').val();
  if(district_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>home/fetch_subDistrict",
    method:"POST",
    data:{district_id:district_id},
    success:function(data)
    {
     $('#subDistrict').html(data);
     $('#unioun').html('<option value="">ইউনিয়ন বাছাই করুণ</option>');
    }
   });
  }
  else
  {
   $('#subDistrict').html('<option value="">উপজেলা বাছাই করুণ</option>');
  }
 });

 $('#subDistrict').change(function(){

  var subDistrict_id = $('#subDistrict').val();
  if(subDistrict_id != '')
  {

   $.ajax({
    
    url:"<?php echo base_url(); ?>home/fetch_unioun",
    method:"POST",
    data:{subDistrict_id:subDistrict_id},
    success:function(data)
    {
     $('#unioun').html(data);
    }
   });
  }
  else
  {
   $('#unioun').html('<option value="">ইউনিয়ন বাছাই করুণ</option>');
  }
 });
 
});
</script>
</div>
</div>
<style type="text/css">
  .st{
    box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    
    }

  }
</style>
