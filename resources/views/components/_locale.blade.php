<form action="{{route('set_language_locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-warning">
        <span class="fi fi-gr"></span> 
    </button>
</form>