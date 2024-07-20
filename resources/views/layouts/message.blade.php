@if(count($errors))

<div class="alert alert-danger alert-dismissible" role="alert">
    <h5 class="alert-heading mb-2">Oops!</h5>

    @foreach ($errors->all() as $error)
    <p class="mb-0">
        {{ $error }}<br>
    </p>


@endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>



@else

    @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <h5 class="alert-heading mb-2">Success!</h5>
        {{ session('success') }}


        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif

@endif
