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
			<center><h1 style="padding-top: 15px;padding-bottom: 10px">নোটিফিকেশন</h1></center>
			
		</div>
		<?php 
      if ($allNotification) {
        foreach ($allNotification as $row) {
          
     ?>
		<div class="col-lg-3"></div>
    <div class="col-lg-6">
      
      <div class="alert btn btn-info alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  অভিনন্দন, আপনি <span style="color:red;font-weight: bold"><?php echo $row->quantity ?></span> কেজি <span style="color:black;font-weight: bold"><?php echo $row->product_name ?></span> বিক্রি জন্য একটি অনুরোধ পাঠিয়েছিলেন যা গ্রহণ করা হয়েছে দয়া করে আগামী 72 ঘন্টার ভিতরে <span style="color:red;font-weight: bold"><?php echo $this->session->userdata('unioun') ?></span> ইউনিয়ন কৃষি অফিসে যোগাযোগ টাকা নিয়ে যোগাযোগ করুন
  
    
</div>

    </div>
    <div class="col-lg-3"></div>
  <?php }
  } ?>
		
		
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