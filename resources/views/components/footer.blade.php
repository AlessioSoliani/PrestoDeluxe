
<footer class="bg-body-tertiary mt-5">

    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-12 text-center mt-5">           

           @if(!Auth::check())  
           <div>
            <h3>{{__('ui.register')}}</h3>
            <a class="btn btn-outline-light lenguages" href="/register">{{__('ui.clickHere')}}</a>
          </div>                           
              
            @elseif((Auth::user() && Auth::user()->is_revisor))
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12">
                  {{__('ui.hello')}} {{auth()->user()->name}} {{__('ui.WelcomeToYourDeluxeArea')}}                
                </div>  
                </div>
              </div>
            </div>
            @else
            <div class="col-12 text-center mt-5">
              <h3>{{__('ui.becomeRevisor')}}</h3>
              <a class="btn btn-outline-light lenguages" href="{{route('become.revisor')}}">{{__('ui.clickHere')}}</a>
            </div>
            @endif
        </div>
    </div>



<footer class="mainfooter" role="contentinfo">
  <div class="footer-middle">
  <div class="container">
    <div class="row justify-content-center">
      <div class=" d-flex justify-content-center col-md-4 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Heading 1</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="#">Payment Center</a></li>
            <li><a href="#">Contact Directory</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">News and Updates</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>
      </div>
      <div class="d-flex justify-content-center col-md-4 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Heading 2</h4>
          <ul class="list-unstyled">
            <li><a href="#">Website Tutorial</a></li>
            <li><a href="#">Accessibility</a></li>
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Webmaster</a></li>
          </ul>
        </div>
      </div>
      <div class="d-flex justify-content-center col-md-4 col-sm-6">
        <!--Column1-->
        <div class=" footer-pad">
          <h4>Heading 3</h4>
          <ul class="list-unstyled">
            <li><a href="#">Parks and Recreation</a></li>
            <li><a href="#">Public Works</a></li>
            <li><a href="#">Police Department</a></li>
            <li><a href="#">Fire</a></li>
            <li><a href="#">Mayor and City Council</a></li>
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div>
      </div>
    	{{-- <div class="col-md-3">
            <ul class="social-network social-circle">
              <img class="img_logo" src="http://127.0.0.1:8000/facebook.png" alt="">
              <img class="img_logo" src="http://127.0.0.1:8000/X_twitter.png" alt="">
              <img class="img_logo" src="http://127.0.0.1:8000/instagram.png" alt="">
              <img class="img_logo" src="http://127.0.0.1:8000/linkedin.png" alt="">
              
            </ul>				
		  </div> --}}
    </div>
	{{-- <div class="row">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright 2018 - Company Name.  All rights reserved.</p>
		</div>
	</div> --}}


  </div>
  </div>
</footer>
  


<div class="styleColor mt-3 mb-1  text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h4 class=" mt-5 text-center">{{__('ui.social')}}</h4>
      </div>
    </div>
  </div>
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          data-mdb-ripple-init
          class="btn text-white btn-floating m-1"          
          href="#!"
          role="button"          
          ><img class="img_logo" src="http://127.0.0.1:8000/facebook.png" alt="">
        </a>
  
        <!-- Twitter -->
        <a
          data-mdb-ripple-init
          class="btn text-white btn-floating m-1"
          href="#!"
          role="button"
          ><img class="img_logo" src="http://127.0.0.1:8000/X_twitter.png" alt="">
        </a>
  
        <!-- instagram -->
        <a
          data-mdb-ripple-init
          class="btn text-white btn-floating m-1"
          href="#!"
          role="button"
          ><img class="img_logo" src="http://127.0.0.1:8000/instagram.png" alt="">
        </a>
  
  
        <!-- Linkedin -->
        <a
          data-mdb-ripple-init
          class="btn text-white btn-floating m-1"
          href="#!"
          role="button"
          ><img class="img_logo" src="http://127.0.0.1:8000/linkedin.png" alt="">
        </a>
        <!-- tik tok -->
        <a
          data-mdb-ripple-init
          class="btn text-white btn-floating m-1"
          href="#!"
          role="button"
          ><img class="img_logo" src="http://127.0.0.1:8000/TikTok.png" alt="">
        </a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center mb-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2024 deluxe@presto.it
      <a class="text-body" href=""></a>
    </div>
    <!-- Copyright -->
  </div>
</footer>