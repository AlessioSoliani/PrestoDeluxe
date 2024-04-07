<x-main>

    <h1 class="text-center title display-1">gli articoli più deluxe</h1>
    <hr>

    <section class="  mt-5 container">
        <div class="  row justify-content-around">
            @foreach ($announcements as $announcement) 
               <div class=" card-style-home col-12 col-md-4">
                <div class="card-body">
                  <img src="https://picsum.photos/100" alt="">
                  <h5 class="text-center">{{$announcement->title}}</h5>
                  <p class="text-center">{{$announcement->body}}</p>
                  <p class="text-center">{{$announcement->price}}€</p>
                  <a class="btn btn-outline-warning" href="">Visualizza</a>
                  <a class="btn btn-outline-success href=""> Categoria:{{$announcement->category->name}}</a>
                  <p>Publicato in data:{{$announcement->created_at->format('d/m/Y')}}</p>
                </div>    
               </div>
            @endforeach
        </div>
    </section>    
</x-main>