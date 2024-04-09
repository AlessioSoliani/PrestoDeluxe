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
                              <div class="item active">
                                <img src="https://bit.ly/34xczKy" alt="Image 1" />
                                <p class="caption">{{$announcement->body}}</p>
                              </div>
                              <div class="item">
                                <img src="https://bit.ly/3lkp5DW" alt="Image 2" />
                                <p class="caption">{{$announcement->body}}</p>
                              </div>
                              <div class="item">
                                <img src="https://bit.ly/3iMHuI1" alt="Image 3" />
                                <p class="caption">{{$announcement->body}}</p>
                              </div>
                            </div>
                            <button class="btn prev">Prev</button>
                            <button class="btn next">Next</button>
                            <div class="dots"></div>
                          </main>
                    </ul>                 
   
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h3>Titolo:{{$announcement->title}}</h3>
                    <h6>Descrizione:{{$announcement->body}}</h6>
                    <h4>prezzo:{{$announcement->price}}</h4>
                    <a href="{{route('categoryShow',['category'=>$announcement->category])}}">Categoria:{{$announcement->category->name}}</a>
                    <p>Publicato il:{{$announcement->created_at->format('d/m/Y')}} -Autore{{$annunciement->user->name ?? ''}}</p>
                </div>
            </div>
        </section>

  
   
</x-main>