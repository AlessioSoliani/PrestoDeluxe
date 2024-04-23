<x-main>
    
    <h1 class="text-center title display-5">Presto Deluxe</h1>
    <hr>


    <section class="container">
        <div class="row justify-content-center">            
            @foreach ( $announcements as $announcement )
              <div class=" card-style-home col-12 col-md-4 card " style="width: 18rem;">
                  <div class=" d-flex justify-content-center">
                       <img class="mt-3 img-style" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,500) : 'http://picsum.photos/200'}}" >
                  </div>
                  <div class="card-body">
                      <h5 class=" text-center card-title">{{$announcement->title}}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                      {{-- <li class="text-center styleColor list-group-item">{{$announcement->body}}</li> --}}
                      <li class="text-center styleColor list-group-item">{{$announcement->price}}€</li>
                      {{-- <li class="list-group-item">{{$announcement->category}}$</li> --}}
                      {{-- <li class="text-center styleColor list-group-item "> {{__('ui.date')}}:{{$announcement->created_at->format('d/m/Y')}}</li> --}}
                  </ul>
                  <div class=" d-flex justify-content-around card-body my-3">
                        <a class="btn btn-outline-light lenguages" href="{{route('announcements.show', compact('announcement'))}}">{{__('ui.show')}}</a>
                        <a class="btn btn-outline-light lenguages" href="{{route('categoryShow', ['category'=>$announcement->category])}}">{{__('ui.'.$announcement->category->name)}}</a>
                  </div>
              </div>
            @endforeach()               
                {{-- {{$announcements->links()}} --}}           
        </div>
    </section>


    
 
 @if (session()->has('message'))                         
    <div class="conteiner ">
      <div class="row justify-content-center">
          <div class=" display-4 col-12 col-md-8 text-center">
              {{session('message')}}
          </div>
       </div> 
    </div>        
@endif
</x-main>