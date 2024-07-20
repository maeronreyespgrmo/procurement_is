
@extends('layouts.master')

@section('page_name', $page['name'])

@section('page_title', $page['title'])

@section('page_css')

@endsection

@section('page_script')

@endsection

@section('content')

    @include('layouts.message')
    <div class="card">
        <form action="/users/store" method="post" id="member-form" enctype="multipart/form-data">
            @csrf
        <div class="col-md-12">
            <div class="card mb-12">
              <h5 class="card-header">Create</h5>
              <div class="card-body">

                <div class="mb-3">
                  <label for="defaultInput" class="form-label">Username</label>
                  <input id="defaultInput" name="username" class="form-control" type="text" placeholder="Username" />
                </div>

                <div class="mb-3">
                    <label for="defaultInput" class="form-label">Password</label>
                    <input id="defaultInput" name="password" class="form-control" type="password" placeholder="Password" />
                  </div>

                  <div class="mt-2 mb-3">
                    <label for="largeInput" class="form-label">Permission ID:</label>
                    <select name="type" id="defaultSelect" class="form-select">
                      <option value="">-Select Type-&nbsp;</option>
                      <option value="0">Verifier&nbsp;</option>
                      <option value="0">Encoder&nbsp;</option>
                   </select>
                  </div>

                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    <a href="/procurement/activities/index" class="btn btn-danger waves-effect waves-light">Cancel</a>
                  </div>

              </div>
            </div>
          </div>
        </form>
    </div>

@endsection


