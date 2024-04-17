<form action="{{route('set_language_locale', $lang)}}" method="POST">
    @csrf
    <button class="me-5 d-flex justify-content-center w-75 btn btn-outline-light lenguages" type="submit">
      <span class="text-dark" style="font-size: 70%" >{{$nation}}</span >
    </button>
</form>

