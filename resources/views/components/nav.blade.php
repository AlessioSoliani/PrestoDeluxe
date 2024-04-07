<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <div>
        <img class="img_logo" src="DiamanteLogo.png" alt="">
      </div>
      
        <div class="d-flex justify-content-center">
          <a class="  TitleNav navbar-brand text-center" href="{{route('welcome')}}">Presto Deluxe</a>
        </div>
      
     
{{-- 
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
      </li> --}}
     
      <button class="navbar-toggler offcanvas-nav  btn-offcanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
         <img class="img_logo" src="DiamanteLogo.png" alt="">
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class=" deluxe-style nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
           
            @auth 
            <li class="deluxe-style nav-item">
              <a class="nav-link" href="{{route('announcements.create')}}">Nuovo annuncio</a>
            </li>       

          <li class="deluxe-style nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}

            </a>
            
            <ul class="dropdown-menu">             
              <li><a class=" deluxe-style dropdown-item" href="#" onclick="event.preventDefault();
              document.getElementById('form-logout').submit();
              ">logout</a>
              <form method="POST" action="/logout" id="form-logout">
              @csrf
              </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item deluxe-style">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item deluxe-style">
            <a class="nav-link" href="/register">Register</a>
          </li>  
          @endauth
            <li class="nav-item deluxe-style dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning"  type="submit">Search</button>
          </form> 
        </div>
      </div>
    </div>
  </nav>