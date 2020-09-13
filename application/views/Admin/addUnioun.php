<div class="content-wrapper">
  <div class="row padtop">
    
    <div class="col-md-6" style="margin-left: 200px;margin-top: 50px">
      <h2>Add Unioun</h2>
      <br>
      <?php echo form_open_multipart('admin/adUnioun','','') ?>
      <div class="form-group">
      <label for="sel1">Division</label>
      <select class="form-control" id="division" name="division">
        <option>Select Division</option>
        <?php
    foreach($division as $row)
    {
     echo '<option value="'.$row->id.'">'.$row->division_name.'</option>';
    }
    ?>
      </select>
  </div>
  <div class="">
      <label for="sel1">District</label>
      <select class="form-control" id="district" name="district">
        <option value="">Select District</option>
        
      </select>
  </div>
  <div class="form-group">
      <label for="sel1">Sub District</label>
      <select class="form-control" id="subDistrict" name="upozila">
        <option value="">Select Sub District</option>
        
      </select>
  </div>
 
      <div class="form-group">
        <label for="sel1">Unioun</label><br>
        <?php echo form_input('unioun_name','','class="form-congrol"'); ?>
      </div>
      
      <div class="form-group">
        <?php echo form_submit('Add Unioun','Add Unioun','class="btn btn-primary"'); ?>
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