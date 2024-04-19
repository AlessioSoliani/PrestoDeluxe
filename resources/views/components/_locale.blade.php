<form action="{{route('set_language_locale', $lang)}}" method="POST">
    @csrf
    <button class="me-5 d-flex justify-content-center w-75 btn btn-outline-light lenguages" type="submit">
      <strong><span class="btn-lingue">{{$nation}}</span ></strong>
    </button>
</form>

