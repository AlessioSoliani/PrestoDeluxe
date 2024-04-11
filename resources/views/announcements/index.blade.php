<x-main>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center title display-1">Ecco tutti gli annunci Deluxe</h1>
            </div>
        </div>
    </div>

    <hr>

    <div class=" mt-5 container">
        <div class="row justify-content-around">
            @forelse ($announcements as $announcement)
            <div class=" card-style-home col-12 col-md-4">
                <div class="card-body card-content mt-2">
                    <img src="mt-3 https://picsum.photos/100" alt="">
                    <h5 class="text-center">{{$announcement->title}}</h5>
                    <p class="text-center">{{$announcement->body}}</p>
                    <a class="btn btn-outline-warning" href="{{route('announcements.show', compact('announcement'))}}">VISUALIZZA</a>
                    <a class="btn btn-outline-success" href="{{route('categoryShow', ['category'=>$announcement->category])}}">{{$announcement->category->name}}</a>
                    <p class="text-center">{{$announcement->price}}</p>
                    <p class="text-center">{{$announcement->category}}</p>
                    {{-- <a class="btn btn-outline-warning" href="{{route('announcements.show',$announcement->id)}}">Visualizza</a> --}}

                    <p>Pubblicato in data:{{$announcement->created_at->format('d/m/Y')}}</p>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="h1 text-center">Non sono presenti annunci in questa ricerca</p>              
            </div>
            @endforelse
        </div>
    </div>
    {{$announcements->links()}}
</x-main>
