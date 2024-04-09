<x-main>
    
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1>{{$announcement_to_check ? "Annuncio deluxe da revisionare":"Non ci sono annunci da revisionare"}}</h1>
            </div>
        </div>
    </div>

    @if($announcement_to_check)
        <section class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="container ">
                        <div class="row">
                            <div class="col-12">
                                <ul class="gallery">
                                    <main class="carousel-container">
                                        <div class="carousel">
                                          <div class="item active">
                                            <!-- annuncio da revisionare  -->
                                            <img src="https://bit.ly/34xczKy" alt="Image 1" />
                                            <p class="caption"></p>
                                          </div>
                                          <div class="item">
                                            <img src="https://bit.ly/3lkp5DW" alt="Image 2" />
                                            <p class="caption"></p>
                                          </div>
                                          <div class="item">
                                            <img src="https://bit.ly/3iMHuI1" alt="Image 3" />
                                            <p class="caption"></p>
                                          </div>
                                        </div>
                                        <button class="btn prev">Prev</button>
                                        <button class="btn next">Next</button>
                                        <div class="dots"></div>
                                      </main>
                                </ul>                 
               
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                    <h5>Titolo: {{$announcement_to_check->title}}</h5>
                    <p>Descrizione: {{$announcement_to_check->body}}</p>
                    <p>Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p>QUI CI VA IL FORM</p>
                        <button class="mt-3">Accetta</button>
                        <button class="mt-3">Rifiuta</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-12 col-md-6">

            </div>
            <div class="col-12 col-md-6 text-end">
                
            </div>
        </div>

    @endif

</x-main>