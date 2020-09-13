






      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>

                  <h4 class="font-weight-bold mb-0"><?php echo $this->session->userdata('name') ?></h4>
                </div>
                <div>
                    
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Registered Farmer</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <?php 
                    if ($this->session->userdata('state')==2) {
$count_farmer['farmer']=$this->modAdmin->numberOfRegistredFarmer();
                    }
                    elseif($this->session->userdata('state')==1){
$count_farmer['farmer']=$this->modAdmin->numberOfRegistredFarmerInDiv();
                    }elseif($this->session->userdata('state')==3){
$count_farmer['farmer']=$this->modAdmin->numberOfRegistredFarmerInDis();
                    }elseif($this->session->userdata('state')==4){
$count_farmer['farmer']=$this->modAdmin->numberOfRegistredFarmerInSubDis();
                    }elseif($this->session->userdata('state')==5){
$count_farmer['farmer']=$this->modAdmin->numberOfRegistredFarmerInUnioun();
                    }


       

   ?>
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo count($count_farmer['farmer']) ?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Sell Product By Farmer</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <?php 
       if ($this->session->userdata('state')==2) {
         $count_sellProduct['product']=$this->modAdmin->countSellProduct();
       }
       if($this->session->userdata('state')!=2){
       $count_sellProduct=$this->modAdmin->countFarmerSellByPlace();
       
     }
       
       
       

   ?>
        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
        if ($this->session->userdata('state')==2) {
          echo count($count_sellProduct['product']);
        }
        if ($this->session->userdata('state')!=2) {
         echo $count_sellProduct;
        }
          ?></h3>
                    <i class="ti-shift-left icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    
                  </div>  
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Buy Product By Farmer</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <?php 
       if ($this->session->userdata('state')==2) {
        $count_BuyProduct['product']=$this->modAdmin->countBuyProduct();
       }
       if($this->session->userdata('state')!=2){
       $countFarmerBuyByPlace=$this->modAdmin->countFarmerBuyByPlace();
       
     }
       

   ?>
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
                    if ($this->session->userdata('state')==2) {
          echo count($count_BuyProduct['product']);
        }
        if ($this->session->userdata('state')!=2) {
         echo $countFarmerBuyByPlace;
        }
                      ?></h3>
                    <i class="ti-shift-right icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Active Brances</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <?php 
      if ($this->session->userdata('state')==2) {
        $countActiveBranches['product']=$this->modAdmin->countActiveBranches();
      }
      if($this->session->userdata('state')!=2){
       $countActiveByPlace=$this->modAdmin->countActiveByPlace();
       
     }
       

   ?>
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
                    if ($this->session->userdata('state')==2) {
          echo count($countActiveBranches['product']);
        }
        if ($this->session->userdata('state')!=2) {
         echo $countActiveByPlace;
        }
                      ?></h3>
                    <i class="ti-world icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
               <?php 

$d=$this->modAdmin->showGraphOfAllProduct();
$a=$d->result_array();
foreach ($d->result() as $row) {
   $purchased[]=$row->sell_count;
   $date[]=$row->product_name;
 }
 foreach ($d->result() as $row) {
   $sold[]=$row->buy_count;
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
  <div id="chartContainer" style="height: 500px; width: 100%;"></div>
              
          </div>
           <script> 
    window.onload = function () { 
    
      var chart = new CanvasJS.Chart("chartContainer", { 
        animationEnabled: true, 
        title:{ 
          text: "Product Buy and Sell Statistics"
        },   
        axisY: { 
          title: "How Many Time Buy This", 
          titleFontColor: "#4F81BC", 
          lineColor: "#4F81BC", 
          labelFontColor: "#4F81BC", 
          tickColor: "#4F81BC"
        }, 
        axisY2: { 
          title: "How Many Time Sell This", 
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
          name: "Purchased(times)", 
          legendText: "Buy", 
          showInLegend: true,
          dataPoints:<?php echo json_encode($dataPoints, 
              JSON_NUMERIC_CHECK); ?> 
        }, 
        { 
          type: "column",  
          name: "Sold(times)", 
          legendText: "Sell", 
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