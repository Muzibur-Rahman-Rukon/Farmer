<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

  <div style="background-color: #1abc9c;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h5 class="mb-0" style="color: white">যোগাযোগ মাধ্যমে সংযুক্ত হোন!</h5>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4" style="color:white"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4" style="color:white"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4" style="color:white"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4" style="color:white"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text" style="color:white"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">কৃষক সেবা</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;background-color: #f4623a">
        <p style="color: black">167 নম্বরে পরামর্শের জন্য কল করুন</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">সেবাসমূহ</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;background-color: #f4623a">
        <p>
          <a href="#!" style="color:black">পণ্য ক্রয় করা হয়</a>
        </p>
        <p>
          <a href="#!" style="color:black">পণ্য বিক্রয় করা হয়</a>
        </p>
        <p>
          <a href="#!" style="color:black">কৃষি খবরে নির্ভরযোগ্য মাধ্যম</a>
        </p>
        

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">গুরুত্বপূর্ণ লিঙ্ক</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;background-color: #f4623a">
        <p>
          <a href="#!" style="color: black">কৃষি মন্ত্রণালয়</a>
        </p>
        <p>
          <a href="#!" style="color: black">উপ-পরিচালকের কার্যালয় কৃষি সম্প্রসারণ অধিদপ্তর</a>
        </p>
        <p>
          <a href="#!" style="color: black">কৃষি গবেষণা ইনস্টিটিউট</a>
        </p>
        

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold" style="color: black">যোগাযোগ</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;background-color: #f4623a">
        <p style="color: black">
          <i class="fas fa-home mr-3"></i> সচিবালয় আব্দুল গনি রোড বিল্ডিং নং 4 ঢাকা বাংলাদেশ</p>
        <p style="color: black">
          <i class="fas fa-envelope mr-3"></i>bdfarmer@gmail.com </p>
        <p style="color: black">
          <i class="fas fa-phone mr-3"></i> 16123</p>
        

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="background-color: black"> <span style="color: white">© This Project is only for Farmer</span></a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</div>
  </div>
  <script type="text/javascript">
  	$("main").addClass("pre-enter").removeClass("with-hover");
setTimeout(function(){
	$("main").addClass("on-enter");
}, 500);
setTimeout(function(){
	$("main").removeClass("pre-enter on-enter");
	setTimeout(function(){
		$("main").addClass("with-hover");
	}, 50);
}, 3000);

$("h1 a").click(function(){
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
	if ($(this).is("#link-signup")) {
		$("#form-login").removeClass("active");
		$("#intro-login").removeClass("active");
		setTimeout(function(){
			$("#form-signup").addClass("active");
			$("#intro-signup").addClass("active");
		}, 50);
	} else {
		$("#form-signup").removeClass("active");
		$("#intro-signup").removeClass("active");
		setTimeout(function(){
			$("#form-login").addClass("active");
			$("#intro-login").addClass("active");
		}, 50);
	}
});
  </script>
   