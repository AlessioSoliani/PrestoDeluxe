<x-main>
    
    <h1 class="text-center title display-1">Presto Deluxe</h1>
    <hr>

    <section class="  mt-5 container">
        <div class="  row justify-content-around">
            @foreach ($announcements as $announcement) 
               <div class=" card-style-home col-12 col-md-4">
                <div class="card-body card-content">                    
                  <img class="mt-3" src="https://picsum.photos/100" alt="">
                  <h5 class="text-center">{{$announcement->title}}</h5>
                  <p class="text-center">{{$announcement->body}}</p>
                  <p class="text-center">{{$announcement->price}}€</p>
                  <a class="btn btn-outline-warning" href="{{route('announcements.show',$announcement->id)}}">Visualizza</a>
                  <a class="btn btn-outline-success" href="{{route('categoryShow',$announcement->category->id)}}">{{$announcement->category->name}}</a>
                  <p class="text-center">Pubblicato in data:{{$announcement->created_at->format('d/m/Y')}}</p>
                </div>    
               </div>
            @endforeach
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