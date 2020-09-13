</nav>

  <!-- Masthead -->
  <header class="masthd" style="background-image: url('assets/img/MR0136.jpg'); height: 100%">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-t-90 p-b-30">
        <form class="login100-form validate-form"  action="<?php echo site_url('home/permitlogin'); ?>" method="post">
        
          <span class="login100-form-title p-b-40">
            লগইন
          </span>

          

          <div class="text-center p-t-55 p-b-30">
            <span class="txt1">
              আপনার মোবাইল নম্বর দিয়ে লগইন করুন
            </span>
                  <?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>

          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="number" name="nidnumber" placeholder="আপনার মোবাইল নম্বর">
            
          </div>
         

          <div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
            <span class="btn-show-pass">
              <i class="fa fa fa-eye" onclick="myFunction()"></i>
            </span>
            <input class="input100" type="password" name="password" placeholder="পাসওয়ার্ড" id="myInput">
            <span class="focus-input100" ></span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
             লগইন
            </button>

            
          </div>
          <a class="" href="<?php echo base_url('home/rgisterpage') ?>">একাউন্ট খুলুন</a>
          
          
        </form>
      </div>
    </div>
  </div>
  
          
        </div>
        
      </div>
    </div>
  </header>
  <script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>