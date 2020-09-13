</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<script>
    function AddReadMore() {
        //This limit you can set after how much characters you want to show Read More.
        var carLmt = 500;
        // Text to show when text is collapsed
        var readMoreTxt = " ... আরো পড়ুন";
        // Text to show when text is expanded
        var readLessTxt = " ছোট করুন";
 
 
        //Traverse all selectors with this class and manupulate HTML part to show Read More
        $(".addReadMore").each(function() {
            if ($(this).find(".firstSec").length)
                return;
 
            var allstr = $(this).text();
            if (allstr.length > carLmt) {
                var firstSet = allstr.substring(0, carLmt);
                var secdHalf = allstr.substring(carLmt, allstr.length);
                var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
                $(this).html(strtoadd);
            }
 
        });
        //Read More and Read Less Click Event binding
        $(document).on("click", ".readMore,.readLess", function() {
            $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
        });
    }
    $(function() {
        //Calling function after Page Load
        AddReadMore();
    });
    
    	jQuery(document).ready(function() {
  jQuery('.dropdate').on('click', function(event) {
    jQuery(this).closest('.content').find('.cdropdate').toggle();
  });
});
</script>

    
    <style>
    .addReadMore.showlesscontent .SecSec,
    .addReadMore.showlesscontent .readLess {
        display: none;
    }
 
    .addReadMore.showmorecontent .readMore {
        display: none;
    }
 
    .addReadMore .readMore,
    .addReadMore .readLess {
        font-weight: bold;
        margin-left: 2px;
        color: blue;
        cursor: pointer;
        background-color: white;
        border:none;
    }
 
    .addReadMoreWrapTxt.showmorecontent .SecSec,
    .addReadMoreWrapTxt.showmorecontent .readLess {
        display: block;
    }
    </style>
<div>
	<div class="row" style="margin-bottom: 50px">
		<div class="col-lg-2"></div>
		<div class="col-lg-8 twod">
			<center>
				<h1>নোটিশ</h1>
			</center>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-2"></div>
		<div class="col-lg-8 card">
			<br>
			<?php if ($notice) {
      foreach($notice as $n){


     ?>
			<ul>
				<li><i class="fas fa-bell "></i><a href="" style="font-size: 17px"> <?php echo $n->notice_title ?></a></li>
				
			</ul>
		<?php }
		} ?>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-12">
			<br>
			<center>
				<h1 style="margin-top: 20px;margin-bottom: 20px">সর্বশেষ খবর</h1>
				</center>
		</div>
		<?php if ($allNews) {
      foreach($allNews as $p){


     ?>
		<div class="col-lg-2">

		</div>
		
			<div class="col-lg-8 card">
				
			
				<img src="<?php echo base_url('assets/img/'.$p->img) ?>" style="height: 230px">

				<h4 style="font-weight: bold;margin-top: 5px;margin-bottom: 5px"><?php echo $p->news_title ?></h4>
				<?php   
				$original_string = $p->news_body;
				$limited_string = word_limiter($original_string , 80, '');
				$rest_of_string = trim(str_replace($limited_string, "", $original_string)); 


				/*$string=$p->news_body;
				$string=word_limiter($string,100);
				$rest_of_string = trim(str_replace($string, " ",$p->news_body));*/
				?>
				
				<span class="addReadMore showlesscontent"><?php echo $rest_of_string ?>

				</span>

				


<hr>
<div class='content'>
	<?php 

       $count_like=$this->modUser->count_post_like($p->id);

   ?>

  <span style="cursor: pointer;" onclick="like_post(<?php echo $p->id ?>)" ><i style="font-size: 25px" class="far fa-thumbs-up"></i></span>
  <span id="likeCount-<?php echo $p->id ?>"><?php echo sizeof($count_like) ?></span>
  <?php if ($this->session->userdata('id')) {
    # code...
  ?>
  <button style="margin-left: 25%" class="dropdate"><label><h3>মন্তব্য</h3></a></label></button>

  <div class="cdropdate defhide">

   
  	 <?php if ($comment) {
      foreach($comment as $c){
      	if (($c->news_id)==($p->id)) {
      		
      	
        

     ?>
 
<table class="table fullcomment">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><?php echo $c->user_name ?></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><?php echo $c->comment ?></td>
     
    </tr>
   
  </tbody>
</table>
  
  <?php }
} } ?> 
  
    <div class="form-group">
        	
    <span id="success_message-<?php echo $p->id ?>"></span>
     <div class="form-group">
    <input type="hidden" name="post_id" id="post_id" value="<?php echo $p->id ?>">
     </div>
     <div class="form-group">
      <textarea name="message" id="message-<?php echo $p->id ?>" class="form-control" placeholder="Message" rows="3"></textarea>
      <span id="message_error<?php echo $p->id ?>" class="text-danger"></span>
     </div>
     <div class="form-group">
      <input readonly onclick="addComment('<?php echo $p->id ?>');return false;" name="contact" id="contact" class="btn btn-info" value="পাঠান">
     </div>
   </div>
       
        <div class="show_last_com" id="show_last_com"></div>


       
    
  </div>
<?php } ?>

</div>

				
				
				<span><br>
					<br></span>
			</div>
			<div class="col-lg-2">
				
			</div>
		<?php }
		} ?>
			
			
			
			
		
	</div>
	

</div>
<style type="text/css">
	.cdropdate{
		display: none;
	}
</style>

<style type="text/css">
	
	.twod{
		box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>
<script type="text/javascript">
  function like_post(post_id){
      $.ajax({
        method:"POST",
        url:"<?php echo base_url('home/like_post') ?>",
        data:{post_id:post_id},
        cache:false,
        success:function(val){
          $('#likeCount-'+post_id).html(val);
          
        }

      });
  }
</script>

<script type="text/javascript">
  function addComment(post_id){
    var msg = $('#message-'+post_id).val();
    if(msg != '')
  {
    $.ajax({
    url:"<?php echo base_url(); ?>home/commentSubmit",
    method:"POST",
    data:{msg:msg,post_id:post_id},
    
    success:function(data)
    {
      
     $('#success_message-'+post_id).html(data);
     $('textarea[name=message').val('');
     

     
    }
   });
  }
  else
  {
   alert("Comment Can't be empty");
  }
  }
</script>
