<x-main>

<h1 class="text-center mt-5 pt-5 display-6">{{__('ui.yourProfile')}}</h1>
@if (session('status')==='profile-information-updated')                         
<div class="conteiner ">
  <div class="row justify-content-center">
      <div class=" display-4 col-12 col-md-8 text-center">
          <p>profilo aggiornato</p>
      </div>
   </div> 
</div>        
@endif

  <section class="cards-wrapper mt-5 pt-5">
    <div class="row justify-content-center">
        <div class=" mt-5 col-12 col-md-6 btnsprofile d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-light" href="#" onclick="event.preventDefault();
                document.getElementById('form-logout').submit();
                "><i class="fa-solid fa-right-from-bracket"></i>{{__('ui.logout')}}</a>
                <form method="POST" action="/logout" id="form-logout">
                @csrf
                </form>                  
            </div>   
            <div class=" mt-3 d-flex justify-content-center">           
                <a class="btn btn-outline-light" href="{{route('profile.edit')}}"><i class="fa-solid fa-user-pen"></i>modifica profilo</a>                                              
            </div>
            @if(Auth::check() && Auth::user()->is_revisor)
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12 mt-5 text-center">
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
        </div>
        <div class="col-12 col-md-6">
            <div class=" me-5 mt-3 card-grid-space d-flex justify-content-center">
                <a class="card-alessio bg-transparent" href="https://codetheweb.blog/2017/10/06/html-syntax/">
                  @if(Auth::check() && Auth::user()->user_photo)
                               <img class="w-100 mt-0" src="{{ asset('storage/' . Auth::user()->user_photo) }}" alt="User Photo">
                           @endif
                  <div class=" text-start w-100 m-2">
                    <h3 class="text-white mb-0">{{$user->name}}</h3>
                    <p  class="text-white mb-0">{{$user->email}}</p>
                    <p  class="text-white mb-0">{{$user->telephone_number}}</p>          
                    <p  class="text-white mb-0">{{$user->location}}</p>     
                         
                  </div>
                </a>
            </div>
        </div>        
    </div>    
  </section>  

  
  {{-- sezzione annunci --}}

  <section class="container mt-5">
        <div class="row justify-content-center">     
            <h1 class="text-center" >i tuoi annunci</h1>
            @if($announcements->isEmpty())
            <p>non ci sono annunci</p>
            @else

        
                @foreach($announcements as $announcement)
                <div class="card-style-home col-12 col-md-4 rounded" style="width: 18rem;">
                    <div class=" d-flex justify-content-center">
                         <img class="mt-3 img-style rounded-circle" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,500) : 'http://picsum.photos/200'}}" >
                    </div>
                    <div class="card-body">
                        <h5 class="text-center card-title">{{$announcement->title}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                       
                        <li class="text-center bg-transparent text-white list-group-item">{{$announcement->price}}€</li>
                        
                    </ul>
                    <div class=" d-flex justify-content-around card-body my-3">
                          <a class="btn btn-outline-light rounded" href="{{route('announcements.show', compact('announcement'))}}">{{__('ui.show')}}</a>
                          {{-- <a class="btn btn-outline-light rounded" href="{{route('categoryShow', ['category'=>$announcement->category])}}">{{__('ui.'.$announcement->category->name)}}</a> --}}
                          <form method="POST" action="{{route('destroy_Ad',$announcement->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submite" class="btn btn-outline-light"><i class="fa-solid fa-trash-can-list"></i>delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            
            @endif
        </div>
  </section>

    
</x-main>


