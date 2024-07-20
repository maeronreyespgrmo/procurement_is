
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
        <form action="/procurements/store" method="post" id="member-form" enctype="multipart/form-data">
            @csrf
        <div class="col-md-12">
            <div class="card mb-12">
              <h5 class="card-header">Create Procurement</h5>
              <div class="card-body">
                <div class="mt-2 mb-3">
                  <label for="largeInput" class="form-label">Child</label>
                  <select name="parent" id="defaultSelect" class="form-select">
                    <option value="0">-Select Category-&nbsp;</option>
                    @foreach($category as $category_item)
                    <option value="{{ $category_item->id }}">{{ $category_item->name }}&nbsp;</option>
                        @php
                        $subcategory = \App\Models\Procurement::where(['parent' => $category_item->id,'type' =>2,'alterproc' =>1])->orderBy('name', 'ASC')->get();
                        @endphp
                        @foreach($subcategory as $sub_category_item)
                        <option value='{{ $sub_category_item->id }}'>--{{ $sub_category_item->name }}&nbsp;</option>
                        @endforeach
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="defaultInput" class="form-label">Procurement Name</label>
                  <input id="defaultInput" name="name" class="form-control" type="text" placeholder="Default input" />
                </div>
                <div class="mb-3">
                    <label for="defaultInput" class="form-label">File:</label>
                    <input class="form-control" name="file" type="file" id="formFile">
                </div>

                <div class="mb-3">
                    <label for="defaultInput" class="form-label">Date Issued:</label>
                    <input class="form-control" name="date_issued" type="date" value="2021-06-18" id="html5-date-input" />
                </div>

                <div class="mb-3">
                    <label for="defaultInput" class="form-label">Publish</label>
                    <input class="form-check-input" name="status" type="checkbox" id="customCheckPrimary" value="1" checked />
                </div>

                <div class="mb-3">
                    <button type="submit" name="alterproc" value="1" class="btn btn-primary waves-effect waves-light">Save</button>
                    <a href="/procurements/alternative" class="btn btn-danger waves-effect waves-light">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
<script>
</script>
@endsection


