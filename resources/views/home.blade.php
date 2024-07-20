
@extends('layouts.master')

@section('page_name', $page['name'])

@section('page_title', $page['title'])

@section('page_css')
<style>

.fade-in-element {
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.fade-in-element.show {
    opacity: 1;
}
</style>
@endsection

@section('page_script')
<script>

const fadeElement = document.querySelector('.fade-in-element');

// Add the 'show' class after a delay (e.g., 2 seconds)
setTimeout(() => {
    fadeElement.classList.add('show');
}, 1);

</script>
@endsection

@section('content')

    @include('layouts.message')
    <div class="row fade-in-element">
        <div class="col-sm-12 col-lg-4 mb-4">
          <div class="card card-border-shadow-primary">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2 pb-1">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-files ti-md"></i></span>
                </div>
                <h4 class="ms-1 mb-0">{{$count_all}}</h4>
              </div>
              <p class="mb-1">Total Procurement</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 mb-4">
          <div class="card card-border-shadow-warning">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2 pb-1">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded bg-label-warning"><i class='ti ti-files ti-md'></i></span>
                </div>
                <h4 class="ms-1 mb-0">{{$count_activities}}</h4>
              </div>
              <p class="mb-1">Procurement Activities</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 mb-4">
          <div class="card card-border-shadow-danger">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2 pb-1">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded bg-label-danger"><i class='ti ti-files ti-md'></i></span>
                </div>
                <h4 class="ms-1 mb-0">{{$count_alternative}}</h4>
              </div>
              <p class="mb-1">Alternative Mode of Procurement</p>
              {{-- <p class="mb-0">
                <span class="fw-medium me-1">+4.3%</span>
                <small class="text-muted">than last week</small>
              </p> --}}
            </div>
          </div>
        </div>

      </div>

@endsection


