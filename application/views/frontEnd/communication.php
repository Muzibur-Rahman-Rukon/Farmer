</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<style type="text/css">
	
iframe {
  border-top: 3px solid rgba(72, 133, 237,1);
  border-bottom: 3px solid rgba(72, 133, 237,1);
  width: 100%;
  height: 75vh;
  margin-bottom: 2rem;
}
pre {
  background-color: rgba(0, 0, 0, .25);
  padding: 1rem;
  white-space: pre-wrap;
  word-wrap: break-word;
}

	form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #1abc9c;
  color: white;
  font-size: 25px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>

<div class="container">
<div class="row">
	<div class="col-lg-12">
		<form class="example" method="post" action="<?php echo base_url('home/uniounSearch') ?>">
  <input type="text" placeholder="ইউনিয়নের নাম দিয়ে খুঁজুন" name="searchByUnioun" id="searchByUnioun">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<br>
<?php if ($this->session->flashdata('district')){ ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <p>আমাদের সার্ভিসটি  <?php echo $this->session->flashdata('district'); ?>  জেলার <?php echo $this->session->flashdata('subDistrict_name'); ?> উপজেলার <?php echo $this->session->flashdata('unioun'); ?> ইউনিয়নে বর্তমানে চালু রয়েছে</p>
  
  
    
</div>
              
            <?php } elseif ($this->session->flashdata('distric')) {
            	# code...
             ?>
 <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <p>আমাদের সার্ভিসটি  <?php echo $this->session->flashdata('district'); ?>  জেলার, <?php echo $this->session->flashdata('subDistrict_name'); ?> উপজেলার <?php echo $this->session->flashdata('unioun'); ?> ইউনিয়নে বর্তমানে বন্ধ রয়েছে</p>
  
  
    
</div>
        <?php } elseif($this->session->flashdata('mes')){ ?>
     <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('mes') ?>
  
  
    
</div>
        <?php } ?>
        <h2>আপনার অভিযোগ</h2>
          <form method="post" action="<?php if(!$this->session->userdata('id')){
         echo base_url('home/login');
    }else{
   echo base_url('home/sendComplain');
  }
    ?>" enctype="multipart/form-data">
    <?php if ($this->session->flashdata('class')){ ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message') ?>
  
  
    
</div>
<?php } ?>
    

<input name="user_id" type="hidden" value="<?php echo $this->session->userdata('id') ?>">

<div class="form-group">
    <i class="ti-pencil-alt2 menu-icon"></i>

  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="body"></textarea>
</div>
  <div class="form-group">
        <?php echo form_submit('পাঠান','পাঠান','class="btn btn-primary"'); ?>
      </div>
  </form>
   
<!-- <iframe src="https://maps.google.com/maps?q=23.777176, 90.399452&z=15&output=embed" width="100%" height="350" frameborder="0" style="border:0"></iframe>
 --> <!-- <br />
 <small>
   <a 
    href="https://maps.google.com/maps?q='+data.lat+','+data.lon+'&hl=es;z=14&amp;output=embed" 
    style="color:#0000FF;text-align:left" 
    target="_blank"
   >
     See map bigger
   </a> -->
 </small>
<br>
<center><h2>পণ্য যুক্ত করার জন্য অনুরোধ প্রেরণ করুন</h2></center>
<span style="margin-left: 10%;margin-right: 10%;color:green">আমাদের বাজারে যে পণ্য গুলো আছে ওইগুলো বাদে যদি আপনার কাছে কোন পণ্য থাকে তাহলে ওইটা যুক্ত করার জন্য আমাদেরকে অনুরোধ পাঠাতে পারেন</span>


	<form method="post" action="<?php if(!$this->session->userdata('id')){
         echo base_url('home/login');
		}else{
	 echo base_url('home/sendMessage');
	}
	  ?>" enctype="multipart/form-data">
    <?php if ($this->session->flashdata('class')){ ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message') ?>
  
  
    
</div>
<?php } ?>
    <div class="form-group">
    <label>পণ্যের নাম</label>
    <input type="text" name="product_name" class="form-control">
    
</div>

<input name="user_id" type="hidden" value="<?php echo $this->session->userdata('id') ?>">
<label for="pic">পন্যের ছবি</label>
  <div class="form-group">
        <?php echo form_upload('img','',''); ?>
      </div>
<div class="form-group">
    <i class="ti-pencil-alt2 menu-icon"></i>
<label for="exampleFormControlTextarea1">পণ্যের বর্ণনা</label>
  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="description"></textarea>
</div>
  <div class="form-group">
				<?php echo form_submit('পাঠান','পাঠান','class="btn btn-primary"'); ?>
			</div>
	</form>
	</div>
	
</div>
</div>
<script type="text/javascript">
		$(document).ready(function(){

		    $('#searchByUnioun').autocomplete({
                source: "<?php echo site_url('home/get_autocomplete');?>",
     
                select: function (event, ui) {
                    $('[name="searchByUnioun"]').val(ui.item.label); 
                     
                }
            });

		});
	</script>