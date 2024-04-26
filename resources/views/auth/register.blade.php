<x-main>
  <div class="deluxe">  
    <h1 class='text-center display-1 mt-5 deluxe'>{{__('ui.register')}}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <form method="POST" action="/register" enctype="multipart/form-data" >
                    @csrf
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
</x-main>
