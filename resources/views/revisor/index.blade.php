<x-main>
    
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class=" display-3 text-center">{{$announcement_to_check ? __('ui.DeluxeToBeRevisoned'):__('ui.ThereAreNoAnnouncementsToBeRevisoned')}}</h1>
            </div>
        </div>
    </div>

    @if($announcement_to_check)
        <section class=" mt-5 container">
            <div class="row">
                <div class="col-12">                                                                                                  
                      <ul id="gallery">                                                    
                               @if($announcement_to_check->images->isNotEmpty())                                 
                                  @foreach ($announcement_to_check->images as $image)
                                     <div class="card mb-3">
                                          <div class="row p-2">
                                                <div class=" col-12 col-md-6 item @if ($loop->first) active @endif ">
                                                    <img class="img-fluid p-3 rounded" src="{{($image->getUrl(500,500))}}" alt="">
                                                </div>
                                               <div class="col-md-3 border-end">
                                                   <h5 class="tc-accent mt-3">tags</h5>
                                                   <div class="p-2">
                                                       @if($image->labels)
                                                       @foreach ($image->labels as $label)
                                                           <p class="d-inline">{{$label}}</p>
                                                           @endforeach
                                                       @endif
                                                   </div>
                                               </div>
                                                                                                                                                          
                                               <div class="col-md-3">
                                                    <div class="card-body">
                                                        <h5 class="tc-accent">Revisione immagini</h5>
                                                             <p>adulti: <i class="{{$image->adult}}"></i></p>
                                                             <p>satira: <i class="{{$image->spoof}}"></i></p>
                                                             <p>medicina: <i class="{{$image->medical}}"></i></p>
                                                             <p>violenza: <i class="{{$image->violence}}"></i></p>
                                                             <p>contenuto ammiccante: <i class="{{$image->racy}}"></i></p>
                                                    </div>                                            
                                                </div>                                                                                          
                                          </div>      
                                      </div>                   
                                  @endforeach
                              @else                                                                                                
                              <img src="https://picsum.photos/100" alt="">
                              @endif                                                                           
                      </ul>                               
                </div>
            </div>
                    
                    <div class="text-center mt-5">
                    <h5>{{__('ui.title')}}: {{$announcement_to_check->title}}</h5>
                    <p>{{__('ui.Description')}}: {{$announcement_to_check->body}}</p>
                    <p>{{__('ui.date')}}: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                    </div>
            
                <div class="row">
                    <div class="w-100 d-flex justify-content-around col-12 col-md-4 text-center">
                        <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-outline-light lenguages" type="submit">accetta</button>
                        </form>
                        <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-outline-danger lenguages" type="submit">rifiuta</button>
                        </form>
                       
                    
                    </div>
                                
                </div>
            
        </section>      
    @endif

       @if (session()->has('message'))
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-12 col-md-8 text-center">
                       {{ session('message') }}
                       @if ($lastAnnouncement)
                           <form action="{{ route('revisor.recover_announcement', $lastAnnouncement->id) }}" method="POST">
                               @csrf
                               @method('PATCH')
                               @php $decisionMade = session()->has('decision_made'); @endphp
                               <button class="btn btn-outline-success languages" type="submit" @if($decisionMade)" @endif>Ho sbagliato, ripristina annuncio precedente</button>
                               <a href="{{ route('revisor.index') }}" class="btn btn-outline-light languages" @if($decisionMade)" @endif>Confermo la mia decisione</a>
                           </form>
                       @endif 
                   </div>
               </div>
           </div>
       @endif                            
</x-main>





 