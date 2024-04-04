<div>
    <h1 class=" mt-5 text-center">Crea Annuncio</h1>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control" wire:model.change='title' >           
            @error('title')
            <span>{{$message}}</span>            
            @enderror
          </div>

          <div class="form-floating">
            <textarea class="form-control" wire:model.change='body' placeholder="Inserisci la descrizione">Descrizione</textarea>
            <label for="floatingTextarea"></label>
            @error('body')
            <div>{{$message}}</div>
           @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Prezzo</label>
            <input type="number" class="form-control"  wire:model.change='price'>           
            @error('price')
            <span>{{$message}}</span>            
            @enderror
          </div>     
       
       
        <button type="submit" class="btn btn-outline-warning">Crea</button>
      </form>
      @if (session()->has('success'))
      <div class="w-50 alert alert-info text-center display-6 mt-5" role="alert">
          {{session('success')}}
      </div>
      @endif
</div>
