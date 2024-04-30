<x-main>

<h1 class="text-center mt-5 pt-5 display-6">il tuo profilo</h1>
@if (session('status')==='profile-information-updated')                         
<div class="conteiner ">
  <div class="row justify-content-center">
      <div class=" display-4 col-12 col-md-8 text-center">
          <p>profilo aggiornato</p>
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
                    <a class="btn btn-outline-light" href="#" onclick="event.preventDefault();
                    document.getElementById('form-logout').submit();
                    ">{{__('ui.logout')}}</a>
                    <form method="POST" action="/logout" id="form-logout">
                    @csrf
                    </form>                  
                </div>   
                <div>
                    <a class="btn btn-outline-info" href="{{route('profile.edit')}}">modifica profilo</a>                                              
                </div>
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
                          <a class="btn btn-outline-light rounded" href="{{route('announcements.show', compact('announcement'))}}">{{__('ui.show')}}</a>
                          <a class="btn btn-outline-light rounded" href="{{route('categoryShow', ['category'=>$announcement->category])}}">{{__('ui.'.$announcement->category->name)}}</a>
                          <form method="POST" action="{{route('destroy_Ad',$announcement->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submite" class="btn btn-outline-danger">delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            
            @endif
        </div>
    </section>

    {{-- <section id="modifica-profilo" class="mt-5">
        <div class="deluxe">  
            <p class='text-center'>modifica il tuo profilo</p>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <form method="POST" action="/user/profile-information" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">{{__('ui.Name')}}</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @error('name')
                                  <span>{{$message}}</span>
                                @enderror
                            </div>                      
                               <div class="mb-3">
                                 <label class="form-label"> {{__('ui.AccountEmail')}}</label>
                                 <input type="email" class="form-control" name="email"  value="{{old('email')}}">
                                  @error('email')
                                   <span>{{$message}}</span>
                                  @enderror
                               </div>  
                               <div>
                                <label class="form-label" for="user_photo">User Photo</label>
                                <input id="user_photo" type="file" class="form-control" name="user_photo" value="{{ old('user_photo') }}" required autofocus>
                            </div>
                            
                            <div>
                                <label class="form-label" for="telephone_number">Telephone Number</label>
                                <input id="telephone_number" type="tel" class="form-control" name="telephone_number" value="{{ old('telephone_number') }}" required>
                            </div>
                            
                            <div>
                                <label class="form-label" for="location">Location</label>
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>
                            </div>                    
                               <div class="mb-3">
                                 <label class="form-label">{{__('ui.Password')}}</label>
                                 <input type="password" class="form-control" name="password">
                                 @error('password')
                                   <span>{{$message}}</span>
                                 @enderror
                               </div>                     
                              <div class="mb-3">
                                <label class="form-label">{{__('ui.ConfirmPassword')}} </label>
                                <input type="password" class="form-control" name="password_confirmation">
                             </div>
                             <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-outline-light lenguages">{{__('ui.Send')}}</button>
                            </div>
                         </form>
                    </div>
                </div>
            </div>
          </div>  
    </section> --}}

</x-main>


