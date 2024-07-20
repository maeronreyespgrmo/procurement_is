
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
        <form action="/users/{{ $user[0]->id }}/update" method="post" id="member-form" enctype="multipart/form-data">
            @csrf
        <div class="col-md-12">
            <div class="card mb-12">
              <h5 class="card-header">Edit</h5>
              <div class="card-body">
                <div class="mb-3">
                    <label for="defaultInput" class="form-label">Username</label>
                    <input id="defaultInput" name="username" class="form-control" type="text" placeholder="Username" value="{{ $user[0]->username }}" />
                  </div>

                  <div class="mb-3">
                      <label for="defaultInput" class="form-label">Password</label>
                      <input id="defaultInput" name="password" class="form-control" type="password" placeholder="Password" value="{{ $user[0]->password }}" />
                    </div>

                    <div class="mt-2 mb-3">
                      <label for="largeInput" class="form-label">Type:</label>
                      <select name="type" id="defaultSelect" class="form-select">
                        <option value="{{ $user[0]->type }}">{{ $user[0]->type }}&nbsp;</option>
                        <option value="0">Verifier&nbsp;</option>
                        <option value="0">Encoder&nbsp;</option>
                     </select>

                    </div>

                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>

                    <a href="" class="btn btn-danger waves-effect waves-light">Cancel</a>
                  </div>

              </div>
            </div>
          </div>
        </form>
    </div>

@endsection


