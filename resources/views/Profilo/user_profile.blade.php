<x-main>

<h1 class="text-center mt-5 pt-5 display-6">il tuo profilo</h1>

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
</x-main>