<x-main>

  <div class="container mt-5">
    <div class="row">
        <div class="col-12">
          <h1 class=" mt-5 text-center">Deluxe{{$announcement->title}}</h1>        
        </div>
    </div>
   </div>
  
      

        <section class=" mt-5container">
            <div class="row">
                <div class="col-12">
                                            
                      <ul class="gallery">                 
                           <main class="carousel-container">                                                      
                               <div class="carousel">
                                @if($announcement->images)                                 
                                @foreach ($announcement->images as $image)
                                    <div class="item @if ($loop->first) active @endif ">
                                        <img class="img-fluid" src="{{($image->getUrl(500,500))}}" alt="">
                                    </div>
                                @endforeach
                                @else
                                   <div class="item active">
                                      <!-- annuncio da revisionare  -->
                                      <img src="" alt="Image 1" />
                                      <p class="caption"></p>
                                   </div>
                                   <div class="item">
                                      <img src="" alt="Image 2" />
                                      <p class="caption"></p>
                                   </div>
                                   <div class="item">
                                      <img src="" alt="Image 3" />
                                      <p class="caption"></p>
                                   </div>

                               </div>
                               @endif
                               <button class=" btn btn-outline-light lenguages btn prev text-center">prev</button>
                               <button class=" btn btn-outline-light lenguages btn next ">Next</button>
                               <div class="dots"></div>
                            </main>
                      </ul>                       
   
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h3>{{__('ui.title')}}:{{$announcement->title}}</h3>
                    <h6>{{__('ui.LeaveYourDescription')}}:{{$announcement->body}}</h6>
                    <h4>{{__('ui.price')}}:{{$announcement->price}}</h4>
                    <a href="{{route('categoryShow',['category'=>$announcement->category])}}">{{__('ui.category')}}:{{__('ui.'.$announcement->category->name)}}</a>
                    <p>{{__('ui.date')}}:{{$announcement->created_at->format('d/m/Y')}} {{__('ui.author')}}:{{$annunciement->user->id ?? ''}}</p>
                </div>
            </div>
        </section>
       
   
</x-main>