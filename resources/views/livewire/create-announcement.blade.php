<div>
    <h1 class=" mt-5 text-center">{{__('ui.CreateAnnouncement')}}</h1>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label class="form-label">{{__('ui.Title')}}</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" wire:model.change='title'>
            @error('title')
            <span>{{$message}}</span>
            @enderror
        </div>

        <div class="form-floating">
            <textarea class="form-control  @error('body') is-invalid @enderror" wire:model.change='body' placeholder="Inserisci la descrizione">Description</textarea>
            <label for="floatingTextarea">{{__('ui.LeaveYourDescription')}}</label>
            @error('body')
            <div>{{$message}}</div>
            @enderror
        </div>


          <div class="mb-3 mt-3">
            <label for="category">{{__('ui.categories')}}</label>
            <select class=" mt-3 mb-3 border border-warning rounded-2 form-select" wire:model.defer="category">
                <option>{{__('ui.chooseCategory')}}</option>
                @foreach ($categories as $category )
                   <option
                    value="{{$category->id}}">{{__('ui.'.$category->name)}}
                   </option>
                @endforeach
              </select>
          </div>


          <div class="mb-3">
            <label class="form-label">{{__('ui.Price')}}</label>
            <input type="number" class="form-control  @error('price') is-invalid @enderror"  wire:model.change='price'>
            @error('price')
            <span>{{$message}}</span>
            @enderror
          </div>




@if (session()->has('success'))
<div class="w-100 rounded  text-center display-6 mt-5" role="alert">
    {{session('success')}}
</div>
@endif

<div class="mb-3">
    <input wire:model="temporary_images" type="file" name ="images" multiple class="form-control shodow @error('temporary_images.*') is-ivalid @enderror" placeholder="img"/>

    @error('temporary_images.*')
    <p>{{$message}}</p>
    @enderror
</div>

@if(!empty($images))
<div class="row">
    <div class="col-12">
        <p>Photo Preview:</p>
        <div class="row border border-4 border-info rounded shadow py-4">
            @foreach($images as $key=>$image)
            <div class=" col my-3">
                <div class="img-preview mx-auto shadow rounded" style = "background-image:url({{$image->temporaryUrl()}})">
                </div>
                <button type="button" wire:click = "removeImage({{$key}})">Delete</button>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-outline-light lenguages">{{__('ui.Send')}}</button>
</div>
</form>
</div>

