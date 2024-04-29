<form action="{{ route('set_language_locale', $lang) }}" method="POST" class="dropdown">
  @csrf
  <button class="me-5 d-flex justify-content-center btn lenguages" type="submit">
      <span class="btn-lingue">{{ $nation }}</span>
  </button>
</form>