<x-main>

    <h1 class="text-center title display-1">gli articoli più deluxe</h1>
    <hr>

    <section class="container">
        <div class="row justify-content-around">
            @foreach ($announcements as $announcement) 
               <div class="col-12 col-md-4">
               <h5>{{$announcement->title}}</h5>
               </div>
            @endforeach
        </div>
    </section>




    
</x-main>