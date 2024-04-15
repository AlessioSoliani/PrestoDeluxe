<div>
    <h1 class=" mt-5 text-center">Create Announcement</h1>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" wire:model.change='title'>           
            @error('title')
            <span>{{$message}}</span>            
            @enderror
          </div>

          <div class="form-floating">
            <textarea class="form-control  @error('body') is-invalid @enderror" wire:model.change='body' placeholder="Inserisci la descrizione">Description</textarea>
            <label for="floatingTextarea">Leave your description</label>
            @error('body')
            <div>{{$message}}</div>
           @enderror
          </div>


          <div class="mb-3 mt-3">
            <label for="category">Categories</label>
            <select class=" mt-3 mb-3 border border-warning rounded-2 form-select" wire:model.defer="category">
                <option>choose category</option>
                @foreach ($categories as $category )
                   <option 
                    value="{{$category->id}}">{{$category->name}}
                   </option>                        
                @endforeach                    
              </select>
          </div>
          

          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control  @error('price') is-invalid @enderror"  wire:model.change='price'>           
            @error('price')
            <span>{{$message}}</span>            
            @enderror
          </div>     
       
       <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-warning">Send</button>

       </div>
    </form>

      @if (session()->has('success'))
      <div class="w-100 rounded  text-center display-6 mt-5" role="alert">
          {{session('success')}}
      </div>
      @endif
</div>
