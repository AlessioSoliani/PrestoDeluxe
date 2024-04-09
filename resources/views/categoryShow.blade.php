<x-main>
   
   <div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center title display-1">{{$category->name}}</h1>
        </div>
    </div>
   </div>

   <hr>

   <div class=" mt-5 container">  
            <div class="row justify-content-around">
                @forelse ($category->announcements as $announcement)                   
                        <div class=" card-style-home col-12 col-md-4">
                                <div class="card-body card-content mt-2">
                                    <img src="https://picsum.photos/100" alt="">
                                    <h5 class="text-center">{{$announcement->title}}</h5>
                                    <p class="text-center">{{$announcement->body}}</p>
                                    <a class="btn btn-outline-warning" href="{{route('announcements.show',$announcement->id)}}">Visualizza</a>                                    
                                   
                                    <p>Publicato in data:{{$announcement->created_at->format('d/m/Y')}} Autore: {{$announcement->user->name ?? ''}}</p>
                                </div>    
                        </div>     
                @empty

                <div class="col-12">
                    <p class="h1">Non sono presenti annunci in questa categoria</p>
                    <p class="h2">Pubblicane uno</p>
                    <a class="btn btn-outline-warning" href="{{route('announcements.create')}}"> Crea il tuo articolo</a>
                    
                   
                </div>
                    
                @endforelse
            </div>
        
    
   </div>

</x-main>