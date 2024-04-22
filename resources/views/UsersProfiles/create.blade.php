<x-main>
<div class="container pt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form action="{{route('users_profiles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                    @error('username')
                    <span>{{$message}}</span>
                @enderror
                </div>
                 
                   <div class="mb-3">
                     <label class="form-label">email </label>
                     <input type="email" class="form-control" name="email"  value="{{old('email')}}">
                     @error('email')
                     <span>{{$message}}</span>
                 @enderror
                   </div>
                 
                  <div class="mb-3">
                    <label for="formFile" class="form-label">{{__('ui.photo')}}</label>
                    <input class="form-control" name="profile_picture" type="file" id="formFile">
                    @error('profile_picture')
                    <span>{{$message}}</span>
                    @enderror 
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{__('ui.number')}}</label>
                    <input type="number" class="form-control" name="phone_number" value="{{old('phone_number')}}">
                    @error('phone_number')
                    <span>{{$message}}</span>
                    @enderror 
                </div>
                  @error('name')
                      <span>{{$message}}</span>
                  @enderror
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-light lenguages">{{__('ui.Send')}}</button>
                  </div>
                </form>
                
        </div>
    </div>
</div>
</x-main>