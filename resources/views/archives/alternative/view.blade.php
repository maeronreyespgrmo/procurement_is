
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

        <div class="col-md-12">
            <div class="card mb-12">
              <h5 class="card-header">View Procurement</h5>
              <div class="card-body">
                <div class="mt-2 mb-3">
                  <label for="largeInput" class="form-label">Category</label>

                  <select name="parent" id="defaultSelect" class="form-select">
                    @php
                    $parent_name = \App\Models\Procurement::where(['id' =>$procurement->parent])->pluck('name');
                    @endphp
                    <option value="{{$procurement->parent}}">{{$parent_name[0]?? $procurement->name}}&nbsp;</option>
                    @foreach($category as $category_item)
                    <option value="{{ $category_item->id }}">{{ $category_item->name }}&nbsp;</option>
                        @php
                        $subcategory = \App\Models\Procurement::where(['parent' => $category_item->id,'type' =>2])->pluck('name');
                        @endphp
                             @foreach($subcategory as $sub_category_item)
                        <option value='{{ $sub_category_item }}'>--{{ $sub_category_item }}&nbsp;</option>
                        @endforeach
                    @endforeach
                </select>

                </div>
                <div class="mb-3">
                  <label for="defaultInput" class="form-label">Procurement Name</label>
                  <input id="defaultInput" name="name" class="form-control" type="text" placeholder="Default input" value="{{$procurement->name}}"/>
                </div>

                <div class="mb-3">
                    <label for="defaultInput" class="form-label">File:</label>
                    @if($procurement->file != "")
                    {{$procurement->file == "" ? "" : ""}}
                    <a href="/storage/files/{{$procurement->file }}">{{$procurement->file}}</a>
                    {{-- <a href="/procurements/{{$procurement->id }}/upload_destroy" class="btn btn-danger waves-effect waves-light">Delete</a> --}}
                    <input class="form-control" name="file_hidden" type="hidden" id="formFile" value="{{$procurement->file}}">
                    @else
                    <input class="form-control" name="file" type="file" id="formFile">
                    @endif

                  </div>

                  <div class="mb-3">
                    <label for="defaultInput" class="form-label">Date Issued:</label>
                    <input class="form-control" name="date_issued" type="date" value="{{$procurement->issued}}" id="html5-date-input" />
                  </div>

                  <div class="mb-3">
                    <label for="defaultInput" class="form-label">Publish</label>
                    <input class="form-check-input" name="status" type="checkbox" id="customCheckPrimary" value="{{$procurement->publish}}"  @if($procurement->publish == "1") checked @endif />
                  </div>

                  <div class="mb-3">
                    {{-- <button type="submit" name="alterproc" value="0" class="btn btn-primary waves-effect waves-light">Save</button> --}}
                    <a href="/archives" class="btn btn-danger waves-effect waves-light">Cancel</a>
                  </div>

              </div>
            </div>
          </div>

    </div>

@endsection


