<nav class="navbar bg-body-tertiary fixed-top">
    <div class=" nav-deluxe container-fluid">
      <div>
        <img class="img_logo" src="http://127.0.0.1:8000/DiamanteLogo.png" alt="">
      </div>
      
        <div class="d-flex justify-content-center">
          <a class="  TitleNav navbar-brand text-center" href="{{route('welcome')}}">Presto Deluxe</a>
        </div>
      
     
      <button  class="navbar-toggler offcanvas-nav  btn-offcanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
         <img class="img_logo" src="http://127.0.0.1:8000/DiamanteLogo.png" alt="">
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
            </li>
           
            @auth 
            <li class="nav-item">
              <a class="nav-link" href="{{route('announcements.create')}}">Nuovo annuncio</a>
            </li>
            
            @if(Auth::user()->is_revisor)
            <!-- se l'utente è revisore vedrà la sezione Zona Revisore con il numero di annunci da revisionare -->
            <li class="nav-item">
              <a class="nav-link" href="{{route('revisor.index')}}">Zona Revisore
                <!-- numero di annunci da revisionare -->
                <!-- toBeRevisionedCount funzione nel MOLDEL di announcements -->
              <span>{{App\Models\announcement::toBeRevisionedCount()}}
                <span>Messaggi non letti</span>
              </span>
            </a>
            </li>
          
            @endif

          <li class=" nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}

            </a>
            
            <ul class="dropdown-menu">             
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
              document.getElementById('form-logout').submit();
              ">logout</a>
              <form method="POST" action="/logout" id="form-logout">
              @csrf
              </form>
              </li>
            </ul>
          </li>
          <li class="nav-item  dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorie
            </a>

            <ul class="dropdown-menu">
              @foreach($categories as $category )
              <li><a class="dropdown-item" href="{{route('categoryShow',compact('category'))}}">{{$category->name}}</a></li>
                <hr class="dropdown-divider">
              </li>
              @endforeach
            </ul>
          </li>
        </ul>
          @else
          <li class="nav-item deluxe-style">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item deluxe-style">
            <a class="nav-link" href="/register">Register</a>
          </li>  
          @endauth
            
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning"  type="submit">Search</button>
          </form> 
        </div>
      </div>
    </div>
  </nav>