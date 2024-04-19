<nav class="navbar list-unstyled bg-body-tertiary fixed-top">
    <div class=" d-flex justify-content-between container-fluid">


        <div class="d-flex justify-content-center">
          {{-- <img class="img_logo" src="http://127.0.0.1:8000/DiamanteLogo.png" alt=""> --}}
          <a class="ms-4  TitleNav navbar-brand text-center" href="{{route('welcome')}}">Presto Deluxe</a>
          {{-- <img class="img_logo" src="http://127.0.0.1:8000/DiamanteLogo.png" alt=""> --}}
        </div>

       

      <button  class="offcanvas-nav text-center btn-offcanvas menu " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
       {{-- <img class="img_logo" src="http://127.0.0.1:8000/DiamanteLogo.png" alt="">  --}}
        Menu   
      </button>
      <div class="offcanvas styleColor offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="ms-5 d-flex justify-content-start offcanvas-header">
          {{-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5> --}}
          <div class=" dropend dropdown me-1">
            <button type="button" class="btn btn-outline-light lenguages dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
              {{__('ui.languages')}}
            </button>
            <ul class="dropdown-menu ms-3 lenguages dropdown-menu">              
                <x-_locale lang='it' nation='italiano'/>                   
                <x-_locale lang='en' nation='english'/>      
                <x-_locale lang='es' nation='espaniol'/>
            </ul>
          </div>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
           

            @auth
            

            <li class="nav-item">
              <a class="nav-link" href="{{route('announcements.create')}}">{{__('ui.enterNewAd')}}</a>
            </li>

            @if(Auth::user()->is_revisor)
            <!-- se l'utente è revisore vedrà la sezione Zona Revisore con il numero di annunci da revisionare -->
            <li class="nav-item">
              <a class="nav-link" href="{{route('revisor.index')}}">{{__('ui.dashboard')}}<br>
                <!-- numero di annunci da revisionare -->
                <!-- toBeRevisionedCount funzione nel MOLDEL di announcements -->
              <span>{{App\Models\announcement::toBeRevisionedCount()}}
                <span>{{__('ui.announcementsToBeRevised')}}</span>
              </span>
            </a>
            </li>

            @endif

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}

            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
              document.getElementById('form-logout').submit();
              ">{{__('ui.logout')}}</a>
              <form method="POST" action="/logout" id="form-logout">
              @csrf
              </form>
              </li>
            </ul>
          </li>
          <li class="nav-item  dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.categories')}}
            </a>

            <ul class=" border border-dark dropdown-menu">
              @foreach($categories as $category )
              <li><a class="dropdown-item" href="{{route('categoryShow',compact('category'))}}">{{__('ui.'.$category->name)}}</a></li>
                <hr class="dropdown-divider">
              </li>
              @endforeach
            </ul>
          </li>
        </ul>
        {{-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('announcements.index')}}">{{__('ui.allCategories')}}</a>
        </li> --}}
          @else
          <li class=" mt-5 pt-5 nav-item deluxe-style">
            <a class="nav-link" href="/login">{{__('ui.login')}}</a>
          </li>
          <li class="nav-item deluxe-style">
            <a class="nav-link lenguages" href="/register">{{__('ui.register')}}</a>
          </li>
          @endauth

          <form class="d-flex mt-3" role="search" action="{{route('announcements.search')}}" method="GET">
            <input class="form-control me-2" type="search" name="searched" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light lenguages"  type="submit">{{__('ui.search')}}</button>
          </form>

        </div>
      </div>
    </div>
  </nav>




