<div>
    <h1 class=" mt-5 text-center">{{__('ui.CreateAnnouncement')}}</h1>
    <form wire:submit.prevent="store">
        {{-- input title --}}
        <div class="mb-3">
            <label class="form-label">{{__('ui.Title')}}</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" wire:model.change='title'>
            @error('title')
            <span class="text-denger mt-2">{{$message}}</span>
            @enderror
        </div>
        {{-- input description --}}
        <div class="form-floating">
            <textarea class="form-control  @error('body') is-invalid @enderror" wire:model.change='body' placeholder="Inserisci la descrizione">Description</textarea>
            <label for="floatingTextarea">{{__('ui.LeaveYourDescription')}}</label>
            @error('body')
            <div class="text-denger mt-2">{{$message}}</div>
            @enderror
        </div>
        {{-- input category --}}
          <div class="mb-3 mt-3">
            <label for="category">{{__('ui.categories')}}</label>
            <select class=" mt-3 mb-3 border border-warning rounded-2 form-select" wire:model.defer="category_id">
                <option>{{__('ui.chooseCategory')}}</option>
                @foreach ($categories as $category )
                   <option
                    value="{{$category->id}}">{{__('ui.'.$category->name)}}
                   </option>
                @endforeach
              </select>
          </div>
          {{-- input price --}}
          <div class="mb-3">
            <label class="form-label">{{__('ui.Price')}}</label>
            <input type="number" class="form-control  @error('price') is-invalid @enderror"  wire:model.change='price'>
            @error('price')
            <span class="text-denger mt-2">{{$message}}</span>
            @enderror
          </div>
          {{-- input temporary_images (il wire:model collega l'imput con la nostra variabile, attributo multiple per poter aggiungere più file ) --}}
            <div class="my-4">
                <input wire:model="temporary_images" type="file" name ="images" multiple class="form-control shodow @error('temporary_images') is-ivalid @enderror" placeholder="img"/>
            
                @error('temporary_images')
                <p class="text-denger mt-2">{{$message}}</p>
                @enderror
            </div>
            {{-- logica btn images --}}
             @if(!empty($images))
             <div class="mb-4 row">
                 <div class="col-12">
                     <p>Photo Preview:</p>
                     <div class="row border border-4 border-info rounded shadow py-4">
                         @foreach($images as $key=>$image)
                         <div class=" col-12">
                             <div class="img-preview mx-auto shadow rounded" style = "background-image:url({{$image->temporaryUrl()}})">
                             </div>
                             <button type="button" class="btn btn-outline-denger" wire:click = "removeImage({{$key}})">Delete</button>
                         </div>
                         @endforeach
                     </div>
                 </div>
             </div>
             @endif

             
             {{-- btn invia form --}}
             <div class="d-flex mt-4 justify-content-center">
                 <button type="submit" class="btn btn-outline-light lenguages">{{__('ui.Send')}}</button>
             </div>
    </form>
             {{-- logica di messaggi in caso di errata o giusta  compilazione del form  --}}
             @if (session()->has('success'))
             <div class="w-100 rounded  text-center display-6 mt-5" role="alert">
                 {{session('success')}}
             </div>
             @endif
</div>

