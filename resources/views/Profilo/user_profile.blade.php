<x-main>

<h1 class="text-center mt-5 pt-5 display-6">il tuo profilo</h1>
@if (session()->has('message'))                         
<div class="conteiner ">
  <div class="row justify-content-center">
      <div class=" display-4 col-12 col-md-8 text-center">
          {{session('message')}}
      </div>
   </div> 
</div>        
@endif
    <section class="container mt-5">
        <div class="row justify-content-center">
     
            <div class="col-12 col-md-6 d-flex justify-content-end">
                @if(Auth::check() && Auth::user()->user_photo)
                     <img src="{{ asset('storage/' . Auth::user()->user_photo) }}" alt="User Photo">
                 @endif
            </div>
              
            <div class="col-12 col-md-6 mt-5 d-flex align-items-center flex-column">
                <div class="d-flex justify-content-center">
                    <p>{{$user->name}}</p>
                </div>
                <div class="d-flex justify-content-center">
                    <p>{{$user->email}}</p>
                </div>
                <div class="d-flex justify-content-center">
                    <p>{{$user->telephone_number}}</p>
                </div>
                <div class="d-flex justify-content-center">
                    <p>{{$user->location}}</p>
                </div>                             
                <div class="d-flex justify-content-center">
                    <a class="btn btn-outline-light lenguages" href="#" onclick="event.preventDefault();
                    document.getElementById('form-logout').submit();
                    ">{{__('ui.logout')}}</a>
                    <form method="POST" action="/logout" id="form-logout">
                    @csrf
                    </form>                  
                </div>   
                <a href="{{route('profile.edit')}}">modifica profilo</a>                                                   
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <div class="row justify-content-center">     
            <h1>i tuoi annunci</h1>
            @if($announcements->isEmpty())
            <p>non ci sono annunci</p>
            @else

        
                @foreach($announcements as $announcement)
                <div class="card-style-home col-12 col-md-4 rounded" style="width: 18rem;">
                    <div class=" d-flex justify-content-center">
                         <img class="mt-3 img-style" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,500) : 'http://picsum.photos/200'}}" >
                    </div>
                    <div class="card-body">
                        <h5 class="text-center card-title">{{$announcement->title}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                       
                        <li class="text-center bg-transparent text-white list-group-item">{{$announcement->price}}€</li>
                        
                    </ul>
                    <div class=" d-flex justify-content-around card-body my-3">
                          <a class="btn btn-outline-light lenguages rounded" href="{{route('announcements.show', compact('announcement'))}}">{{__('ui.show')}}</a>
                          <a class="btn btn-outline-light lenguages rounded" href="{{route('categoryShow', ['category'=>$announcement->category])}}">{{__('ui.'.$announcement->category->name)}}</a>
                    </div>
                </div>
                @endforeach
            
            @endif
        </div>
    </section>
</x-main>