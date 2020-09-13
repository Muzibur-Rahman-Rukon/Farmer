</nav>
<br>
<br>
<br>
<br>
<style type="text/css">
	.moreZoom:hover {
   transform: scale(1.5);
}
.img-style{
   	border-color: #666 #1c87c9;
      border-image: none;
      border-radius: 0 0 0 0;
      border-style: solid;
      border-width: 5px;
   }
   .hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  position: absolute;
  overflow: hidden;
  width: 80%;
  height: 80%;
  left: 10%;
  top: 10%;
  border-bottom: 1px solid #FFF;
  border-top: 1px solid #FFF;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: scale(0,1);
  -ms-transform: scale(0,1);
  transform: scale(0,1);
}

.hovereffect:hover .overlay {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="linear" slope="0.6" /><feFuncG type="linear" slope="0.6" /><feFuncB type="linear" slope="0.6" /></feComponentTransfer></filter></svg>#filter');
  filter: brightness(0.6);
  -webkit-filter: brightness(0.6);
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 17px;
  background-color: transparent;
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,-100%,0);
  transform: translate3d(0,-100%,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,100%,0);
  transform: translate3d(0,100%,0);
}

.hovereffect:hover a, .hovereffect:hover p, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
   
</style>
<div style="background-color: #007bff;">
    <div class="container">
      <div class="row py-4 d-flex align-items-center">
        <div class="col-md-12 col-lg-12 text-center text-md-left mb-4 mb-md-0">
         <center> <h3 class="mb-0" style="color: white"><?php echo $product['product_name'] ?>র বিস্তারিত তথ্য</h3></center>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
  		<div class="col-lg-12">
  			<center><h5 style="margin-top: 15px;margin-bottom: 10px">ছবি</h5></center>
  			
  		</div>
  		<div class="col-lg-3"></div>
  		<div class="col-lg-6">
  		<img class="moreZoom " id="change-image" src="<?php echo base_url('assets/img/'.$product['img']) ?>">
  			
  		</div>
  		<div class="col-lg-3"></div>
  		<div class="col-lg-3 hovereffect" style="margin-top:50px;margin-bottom: 20px">
  		<img style="height: 200px" class="card-img-top red-button img-style img-responsive" src="<?php echo base_url('assets/img/'.$product['img1']) ?>">
  		</div>
  		<div class="col-lg-3 hovereffect" style="margin-top: 50px;margin-bottom: 20px">
  		<img style="height: 200px" class="card-img-top black-button img-style img-responsive" src="<?php echo base_url('assets/img/'.$product['img2']) ?>">
  		</div>
  		<div class="col-lg-3 hovereffect" style="margin-top: 50px;margin-bottom: 20px">
  		<img style="height: 200px" class="card-img-top blue-button img-style img-responsive" src="<?php echo base_url('assets/img/'.$product['img3']) ?>">
  		</div>
  		
  		<div class="col-lg-3 hovereffect" style="margin-top: 50px;margin-bottom: 20px">
  		<img style="height: 200px" class="card-img-top yellow-button img-style img-responsive" src="<?php echo base_url('assets/img/'.$product['img4']) ?>">
  		</div>
      <div class="col-lg-12">
        <center><h5 style="margin-top: 15px;margin-bottom: 10px">পণ্যের বিবরণ</h5></center>
        <p style="color:#4F81BC;margin-bottom: 20px "><?php echo $product['description'] ?></p>
        
      </div>

 <?php 

$d=$this->modUser->showGraphById($product['id']);
$a=$d->result_array();
foreach ($d->result() as $row) {
   $purchased[]=$row->buy_price;
   $date[]=$row->date;
 }
 foreach ($d->result() as $row) {
   $sold[]=$row->sell_price;
 }

 for ($i=0;$i<count($a);$i++) {
  $dataPoints[] = 
    array("label"=> $date[$i], "y"=> $purchased[$i]);
 }
 for ($i=0;$i<count($a);$i++) {
  $dataPoints2[] = 
    array("label"=> $date[$i], "y"=> $sold[$i]);
 }

?>
	<div id="chartContainer" style="height: 300px; width: 100%;"></div> 
 <div class="col-lg-6" style="margin-top: 20px;margin-bottom: 20px">
   <button class="btn" style="background-color:#4F81BC;color:white; ">ক্রয় করুন</button>
 </div>
 <div class="col-lg-6" style="margin-top: 20px;margin-bottom: 20px">
    <button class="btn float-right" style="background-color: #C0504E;color:white"><a style="color: white" href="<?php 
       if($this->session->userdata('id')){
         echo site_url('home/farmerSellCart/'.$product['id']);    
       } else{
        echo site_url('home/login');
       }
     ?>">বিক্রয় করুন</a></button>
 </div>

  	</div>
  </div>
  <script type="text/javascript">
  	jQuery(document).ready(function($){

$('.black-button').on({
     'click': function(){
         $('#change-image').attr('src',$(this).attr('src'));
     }
 });
 
$('.red-button').on({
     'click': function(){
           $('#change-image').attr('src',$(this).attr('src'));
     }
 });

 
$('.blue-button').on({
     'click': function(){
          $('#change-image').attr('src',$(this).attr('src'));
     }
 });

 
$('.yellow-button').on({
     'click': function(){
          $('#change-image').attr('src',$(this).attr('src'));
     }
 });
});

  </script>
   
  </script> 
  <script> 
    window.onload = function () { 
    
      var chart = new CanvasJS.Chart("chartContainer", { 
        animationEnabled: true, 
        title:{ 
          text: "ক্রয় ও বিক্রয় মূল্যের গ্রাফ"
        },   
        axisY: { 
          title: "ক্রয় মূল্য", 
          titleFontColor: "#4F81BC", 
          lineColor: "#4F81BC", 
          labelFontColor: "#4F81BC", 
          tickColor: "#4F81BC"
        }, 
        axisY2: { 
          title: "বিক্রয় মূল্য", 
          titleFontColor: "#C0504E", 
          lineColor: "#C0504E", 
          labelFontColor: "#C0504E", 
          tickColor: "#C0504E"
        },   
        toolTip: { 
          shared: true 
        }, 
        legend: { 
          cursor:"pointer", 
          itemclick: toggleDataSeries 
        }, 
        data: [{ 
          type: "column", 
          name: "Purchased", 
          legendText: "ক্রয়", 
          showInLegend: true,
          dataPoints:<?php echo json_encode($dataPoints, 
              JSON_NUMERIC_CHECK); ?> 
        }, 
        { 
          type: "column",  
          name: "Sold", 
          legendText: "বিক্রয়", 
          axisYType: "secondary", 
          showInLegend: true, 
          dataPoints:<?php echo json_encode($dataPoints2, 
              JSON_NUMERIC_CHECK); ?> 
        }] 
      }); 
      chart.render(); 
      
      function toggleDataSeries(e) { 
        if (typeof(e.dataSeries.visible) === "undefined"
              || e.dataSeries.visible) { 
          e.dataSeries.visible = false; 
        } 
        else { 
          e.dataSeries.visible = true; 
        } 
        chart.render(); 
      } 
    
    } 
  </script> 

  