<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
	<h3 style="padding-top: 15px;padding-bottom: 10px">All Farmer'sMessages</h3>
			<?php if ($allMessage) {
				foreach ($allMessage as $p) {
$d=$this->modAdmin->fetchDivNameforFarmerOrderById($p->sender_id);	
if ($this->session->userdata('state')=='5') {

	

	if ($d->unioun==$this->session->userdata('name')) {
		
			 ?>
			<div class="card">
				<!-- onclick="showMessageById('<?php echo $this->session->userdata('id') ?>','<?php echo $p->reply_by ?>');return false;" -->
  <div onclick="showMessageById('<?php echo $p->sender_id ?>','<?php echo $d->name ?>');return false;" class="card-header">
  	<img class="rounded-circle" width="30" height="30" src="<?php echo base_url('assets/img/'.$d->pic) ?>" class="img-responsive">&nbsp&nbsp&nbsp&nbsp
   <?php echo $d->name; ?><span style="font-size: 25px;font-weight: bold;color: #f4623a">VS</span>  <?php echo $d->unioun; ?>

  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $p->message ?></p>
  </div>
</div>
<?php }
} else{ ?>
	<div class="card">
				<!-- onclick="showMessageById('<?php echo $this->session->userdata('id') ?>','<?php echo $p->reply_by ?>');return false;" -->
  <div onclick="showMessageById('<?php echo $p->sender_id ?>','<?php echo $d->name ?>');return false;" class="card-header">
  	<img class="rounded-circle" width="30" height="30" src="<?php echo base_url('assets/img/'.$d->pic) ?>" class="img-responsive">&nbsp&nbsp&nbsp&nbsp
   <?php echo $d->name; ?><span style="font-size: 25px;font-weight: bold;color: #f4623a">VS</span>  <?php echo $d->unioun; ?>

  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $p->message ?></p>
  </div>
</div>
<?php } 
}
}
 ?>
		</div>
		<div class="col-lg-8" id="success_message" >
		
		</div>
		<?php if ($this->session->userdata('state')==5): ?>
			<div class="col-lg-4"></div>
		<div class="col-lg-8">
			<div class="input-group">
              
              <input  type="text" class="form-control" id="message" name="message" placeholder="Reply now" aria-label="search" aria-describedby="search">
              <div onclick="replyMessage('<?php echo $this->session->userdata('name') ?>');return false;" class="input-group-prepend hover-cursor btn btn-primary" id="navbar-search-icon">Reply
              </div>
            </div>
		</div>
		<?php endif ?>
		
	</div>
</div>
<script type="text/javascript">
  function showMessageById(sender_id,sender_name){
    var msg = sender_id;
    var sender_name = sender_name;
    if(msg != '')
  {
    $.ajax({
    url:"<?php echo base_url(); ?>admin/specificUserMessage",
    method:"POST",
    data:{msg:msg,sender_name:sender_name},
    success:function(data)
    {
     $('#success_message').html(data);
    }
   });
  }
  else
  {
   alert("Comment Can't be empty");
  }
  }
</script>
<script type="text/javascript">
	function replyMessage(reply_by){
		var reply_by = reply_by;
		var reply_to = $('#sender_id').val();
		var message = $('#message').val();
		if (reply_to !='') {
			$.ajax({
				url:"<?php echo base_url(); ?>admin/replyUserMessage",
				method:"POST",
				data:{reply_by:reply_by,reply_to:reply_to,message:message},
				success:function(data)
			    {
			     $('#success_message').html(data);
			    }
			});
		}
		else
  {
   alert("Comment Can't be empty");
  }
	}
</script>