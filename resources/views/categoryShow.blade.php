<x-main>
   
    <div class="container mt-5">
     <div class="row">
         <div class="col-12">
             <h1 class="text-center title display-5">{{__('ui.'.$category->name)}}</h1>
         </div>
     </div>
    </div>
 
    <hr>
 
 <section class="container">
     <div class="row justify-content-center">            
         @forelse ($category->announcements as $announcement)  
         <div class="card-style-home col-12 col-md-4 rounded" style="width: 18rem;">
             <div class="d-flex justify-content-center">
                <img class="mt-3 img-style" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,500) : 'http://picsum.photos/200'}}" >
             </div>
             <div class="card-body">
                 <h5 class="text-center card-title">{{$announcement->title}}</h5>
                 <ul class="list-group">
                     <li class="list-group-item text-center bg-transparent border-0 text-white">{{$announcement->price}}€ <br> {{__('ui.date')}}: {{$announcement->created_at->format('d/m/Y')}}</li>
                 </ul>
             </div>
             <div class="d-flex justify-content-around card-body my-3">
                 <a class="btn btn-outline-light lenguages rounded" href="{{route('announcements.show', compact('announcement'))}}">{{__('ui.show')}}</a>
                 <a class="btn btn-outline-light lenguages rounded" href="{{route('categoryShow', ['category'=>$announcement->category])}}">{{__('ui.'.$announcement->category->name)}}</a>
             </div>
         </div>
       @empty            
            <div class="col-12">
                <p class="h1">{{__('ui.ThereAreNoAnnouncementsInThisCategory')}}</p>
                <p class="h2">{{__('ui.CreateOne')}}</p>
                <a class="btn btn-outline-warning" href="{{route('announcements.create')}}"> {{__('ui.CreateYourAnnouncement')}}</a>
            </div>
       @endforelse           
     </div>
 </section>
 
 </x-main>
 