
<footer class="bg-body-tertiary mt-5">

    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-12 text-center mt-5">           

           @if(!Auth::check())  
           <div>
            <h3>{{__('ui.register')}}</h3>
            <a class="btn btn-outline-warning" href="/register">{{__('ui.clickHere')}}</a>
          </div>                           
              
            @elseif((Auth::user() && Auth::user()->is_revisor))
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12">
                  hello {{auth()->user()->name}} welcome to your deluxe area                
                </div>  
                </div>
              </div>
            </div>
            @else
            <div class="col-12 text-center mt-5">
              <h3>Diventa revisore</h3>
              <a class="btn btn-outline-light" href="{{route('become.revisor')}}">clicca quì</a>
            </div>
            @endif
        </div>
    </div>

<div class="bg-body-tertiary mt-3 mb-1  text-center">
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