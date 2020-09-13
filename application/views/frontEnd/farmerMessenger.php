</nav>
<br>
<br>i
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-12">
			<center><h1 style="padding-top: 15px;padding-bottom: 10px">বার্তা</h1></center>
			
		</div>
		
		<div class="col-lg-3">
<h6 style="padding-top: 15px;padding-bottom: 10px">কর্তৃপক্ষের সকল মেসেজ</h6>
			<?php if ($allMessage) {
				foreach ($allMessage as $p) {
					if (!empty($p->reply_by)) {
			 ?>
			<div class="card">
  <div  style="cursor:pointer;" onclick="showMessageById('<?php echo $this->session->userdata('id') ?>','<?php echo $p->reply_by ?>');return false;" class="card-header">
  	<i class="fas fa-users" style="font-size: 20px;"></i>
  	&nbsp&nbsp&nbsp&nbsp
   <?php echo $p->reply_by; ?>

  </div>
  <div class="card-body">
    <p class="card-text" style="cursor:pointer;" onclick="showMessageById('<?php echo $this->session->userdata('id') ?>','<?php echo $p->reply_by ?>');return false;"><?php echo $p->message ?></p>
  </div>
</div>
<?php }
}
}
 ?>
		</div>
		<div class="col-lg-7"  id="success_message"></div>
		<div class="col-lg-2">
			<h6 style="padding-top: 15px;padding-bottom: 10px">আপনি যাদেরকে মেসেজ দিতে পারবেন</h6>
		<div class="card">
			<div  style="cursor:pointer;" onclick="showMessageById('<?php echo $this->session->userdata('id') ?>','<?php echo $this->session->userdata('unioun') ?>');return false;" class="card-header">
  	<i class="fas fa-users" style="font-size: 20px;"></i>
  	&nbsp&nbsp&nbsp&nbsp
   <?php echo $this->session->userdata('unioun'); ?>

  </div>
		</div>
		</div>
		<div class="col-lg-3"></div>
		<div class="col-lg-7">
			<div class="input-group">
              
              <input  type="text" class="form-control" id="message" name="message" placeholder="মেসেজ পাঠান" aria-label="search" aria-describedby="search">
              <div onclick="replyMessage('<?php echo $this->session->userdata('id') ?>');return false;" class="input-group-prepend hover-cursor btn btn-primary" id="navbar-search-icon">মেসেজ পাঠান
              </div>
            </div>
		</div>
		<div class="col-lg-2"></div>
		
		
			</div>
			<br>
			<br>
			<br>
</div>
<script type="text/javascript">
  function showMessageById(sender_id,reply_by){
    var msg = sender_id;
    var reply_by = reply_by;
    if(msg != '')
  {
    $.ajax({
    url:"<?php echo base_url(); ?>home/specificUserMessage",
    method:"POST",
    data:{msg:msg,reply_by:reply_by},
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
	function replyMessage(id){
		var sender_id = id;
		var reply_by = $('#reply_by').val();
		var message = $('#message').val();
		if (message !='') {
			$.ajax({
				url:"<?php echo base_url(); ?>home/replyUserMessage",
				method:"POST",
				data:{reply_by:reply_by,sender_id:sender_id,message:message},
				success:function(data)
			    {
			     $('#success_message').html(data);
			    }
			});
		}
		else
  {
   alert("যাকে মেসেজ পাঠাতে চান সেখানে ক্লিক করুন");
  }
	}
</script>