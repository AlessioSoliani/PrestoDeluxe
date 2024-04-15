<x-main>
    
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class=" display-3 text-center">{{$announcement_to_check ? "Deluxe to be revisoned":"There aren't announcements to be revisoned"}}</h1>
            </div>
        </div>
    </div>

    @if($announcement_to_check)
        <section class=" mt-5 container">
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
                                        <button class="btn prev">  
                                            <i class="fa-sharp fa-thin fa-arrow-right fa-fade">prev</i>
                                        </button>
                                        <button class="btn next ">Next</button>
                                        <div class="dots"></div>
                                      </main>
                                </ul>                 
               
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                    <h5>Title: {{$announcement_to_check->title}}</h5>
                    <p>Description: {{$announcement_to_check->body}}</p>
                    <p>date: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="w-100 d-flex justify-content-around col-12 col-md-4 text-center">
                        <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-outline-warning" type="submit">Accept</button>
                        </form>
                        <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-outline-danger" type="submit">Reject</button>
                        </form>
                       
                    
                    </div>
                                
                </div>
            </div>
        </section>      
    @endif
                            @if (session()->has('message'))                         
                              <div class="conteiner ">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8 text-center">
                                        {{session('message')}}
                                        @if($lastAnnouncement)
                                        <form action="{{route('revisor.recover_announcement',$lastAnnouncement->id)}}" method="POST">
                                          @csrf
                                          @method('PATCH')
                                          <button class="btn btn-outline-success" type="submit">Recover</button>
                                          <a href="{{route('welcome')}}" class="btn btn-outline-light" type="submit">Accept</a>
                                       </form> 
                                       

                                     @endif 
                                    </div>
                                 </div> 
                              </div>        
                            @endif

</x-main>