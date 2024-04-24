<x-main>
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-12">
        </div>
      </div>
    </div>
  
    <section class="m-5 p-5 title-section rounded shadow">
      <div class="row align-items-start justify-content-center">
        <div class="col-12 col-md-8 mb-4 mb-md-0">
          <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              @foreach($announcement->images as $key => $image)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" @if($loop->first) class="active" @endif aria-label="Slide {{$key+1}}"></button>
              @endforeach
            </div>
            <div class="carousel-inner">
              @foreach($announcement->images as $key => $image)
                <div class="carousel-item @if($loop->first) active @endif">
                  <div class="d-flex justify-content-center align-items-center aspect-ratio-wrapper">
                    <img src="{{$image->getUrl(500, 500)}}" class="d-block" alt="Image {{$key+1}}">
                  </div>
                </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="row justify-content-center align-items-stretch h-100">
            <div class="col-12">
              <div class="d-flex flex-column justify-content-between h-100">
                <div>
                  <h3 class="m-3">{{$announcement->title}}</h3>
                  <h6 class="m-3">{{$announcement->body}}</h6>
                  <h4 class="m-3">{{__('ui.price')}}: {{$announcement->price}}</h4>
                  <p class="m-3">{{__('ui.date')}}: {{$announcement->created_at->format('d/m/Y')}}</p>
                  <p class="m-3">{{__('ui.category')}}: {{__('ui.'.$announcement->category->name)}}</p>
                  <p class="m-3">{{__('ui.author')}}: {{$announcement->user->name ?? ''}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </x-main>
  