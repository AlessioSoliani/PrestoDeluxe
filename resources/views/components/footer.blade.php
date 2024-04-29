<footer class="bg-dark text-center text-white">
  <div class="container-fluid p-4">
    @if(!Auth::check())  
      <div class="row justify-content-center mb-4">
        <div class="col-12 text-center mt-5 mb-4">
          <h3>{{__('ui.register')}}</h3>
          <a class="btn btn-outline-light" href="/register">{{__('ui.clickHere')}}</a>
        </div>
      </div>
    @elseif(Auth::check() && Auth::user()->is_revisor)
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            {{__('ui.hello')}} {{auth()->user()->name}} {{__('ui.WelcomeToYourDeluxeArea')}}                
          </div>  
        </div>
      </div>
    @else
      <div class="col-12 text-center mt-5">
        <h3>{{__('ui.becomeRevisor')}}</h3>
        <a class="btn btn-outline-light" href="{{route('become.revisor')}}">{{__('ui.clickHere')}}</a>
      </div>
    @endif

    <!-- Social -->
    <div class="row justify-content-center mb-4 mt-2">
      <div class="col-auto">
        <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button">
          <i class="fa-brands fa-facebook"></i>
        </a>
      </div>
      <div class="col-auto">
        <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button">
          <i class="fab fa-google"></i>
        </a>
      </div>
      <div class="col-auto">
        <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button">
          <i class="fa-brands fa-instagram"></i>
        </a>
      </div>
      <div class="col-auto">
        <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <div class="col-auto">
        <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button">
          <i class="fa-brands fa-tiktok"></i>
        </a>
      </div>
    </div>

    <!-- Contatti -->
    <div class="container py-5">
      <div class="row">
        <!-- Indirizzo -->
        <div class="col-md-4 mb-4 mb-md-0">
          <h5 class="mb-3">Indirizzo</h5>
          <p>0 Via XX Settembre</p>
          <p>00100, Roma, Italia</p>
        </div>
        <!-- Numero di Telefono -->
        <div class="col-md-4 mb-4 mb-md-0">
          <h5 class="mb-3">Numero di Telefono</h5>
          <p><i class="fas fa-phone-alt"></i> +123 456 7890</p>
        </div>
        <!-- Indirizzo Email -->
        <div class="col-md-4">
          <h5 class="mb-3">Email</h5>
          <p><i class="far fa-envelope"></i> info@prestodeluxe.com</p>
        </div>
      </div>
      <!-- Fine Contatti -->
      <div class="d-flex justify-content-center mb-0">
        <span style="font-size: inherit;">© 2024</span>
        <span style="font-size: inherit;">Copyright:</span>
        <a class="text-white text-decoration-none body" href="https://mdbootstrap.com/" style="font-size: inherit;">Presto Deluxe</a>
      </div>
    </div>
  </div>
</footer>
