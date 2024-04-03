<x-main>
<h1 class='text-center display-1 mt-5'>Registrati</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                      @error('name')
                          <span>{{$message}}</span>
                      @enderror
                       <div class="mb-3">
                         <label class="form-label">Email address</label>
                         <input type="email" class="form-control" name="email"  value="{{old('email')}}">
                       </div>
                      @error('email')
                          <span>{{$message}}</span>
                      @enderror
                       <div class="mb-3">
                         <label class="form-label">Password</label>
                         <input type="password" class="form-control" name="password">
                       </div>
                      @error('password')
                      <span>{{$message}}</span>
                     @enderror
                      <div class="mb-3">
                        <label class="form-label">Password confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation">
                     </div>
                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</x-main>
