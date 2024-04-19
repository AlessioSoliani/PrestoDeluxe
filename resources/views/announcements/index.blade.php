<x-main>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center title display-5">{{__('ui.TheWholeList')}}</h1>
            </div>
        </div>
    </div>

    <hr>

    <section class="container">
        <div class="row justify-content-center">            
            @forelse ($announcements as $announcement)
            <div class=" card-style-home col-12 col-md-4" style="width: 18rem;">
                   <div class=" d-flex justify-content-center">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/101'}}" alt="image" class="mt-3 img-style">
                   </div>
                <div class="card-body">
                    <h5 class=" text-center card-title">{{$announcement->title}}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    {{-- <li class="text-center list-group-item">{{$announcement->body}}</li> --}}
                    <li class="text-center list-group-item">{{$announcement->price}}€</li>
                    {{-- <li class="list-group-item">{{$announcement->category}}$</li> --}}
                    {{-- <li class="text-center list-group-item "> {{__('ui.date')}}:{{$announcement->created_at->format('d/m/Y')}}</li> --}}
                </ul>
                <div class=" d-flex justify-content-around card-body mb-3">
                      <a class="btn btn-outline-light lenguages" href="{{route('announcements.show', compact('announcement'))}}">{{__('ui.show')}}</a>
                      <a class="btn btn-outline-light lenguages" href="{{route('categoryShow', ['category'=>$announcement->category])}}">{{__('ui.'.$announcement->category->name)}}</a>
                </div>
            </div>
                {{-- {{$announcements->links()}} --}}
            @empty
            <div class="col-12">
                <p class="h1 text-center">{{__('ui.ThereAreNoAdsInThisSearch')}}</p>              
            </div>
            @endforelse
            {{$announcements->links()}}
        </div>
    </section>

    

 
    
</x-main>
