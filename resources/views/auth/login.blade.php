<x-main>
<div class="deluxe">
  <h1 class='text-center display-1 mt-5 deluxe'>{{__('ui.SignIn')}}</h1>
   <div class="container">
         <div class="row justify-content-center">
           <div class="col-12 col-md-4">
               <form method="POST" action="/login">
                   @csrf                      
                      <div class="mb-3">
                        <label class="form-label">{{__('ui.EmailAdress')}}</label>
                        <input type="email" class="form-control" name="email"  value="{{old('email')}}">
                      </div>
                     @error('email')
                         <span>{{$message}}</span>
                     @enderror
                      <div class="mb-3">
                        <label class="form-label">{{__('ui.Password')}}</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                     @error('password')
                     <span>{{$message}}</span>
                    @enderror
                     <div class="mb-3 form-check">
                       <label class="form-label" name="remember">{{__('ui.remember')}}</label>
                       <input type="checkbox" class="form-check-input" >
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