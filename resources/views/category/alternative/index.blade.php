
@extends('layouts.master')

@section('page_name', $page['name'])

@section('page_title', $page['title'])

@section('page_css')

@endsection

@section('page_script')
<script src="/js/category_procurement.js"></script>
@endsection

@section('content')
    @include('layouts.message')
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label text-center">
                        {{-- <h5 class="card-title mb-0">DataTable with Buttons</h5> --}}
                    </div>
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons">
                        <a href="/categories/alternative/create"
                        class="dt-button create-new btn btn-primary waves-effect waves-light"
                        tabindex="0"
                        aria-controls="DataTables_Table_0"
                        type="button">
                        <span>
                            <i class="ti ti-plus me-sm-1"></i>
                            <span class="d-none d-sm-inline-block">Add New Record</span>
                        </span>
                    </a>
                        </div></div></div>
              <div class="table-responsive">
              <table class="table dataTable no-footer" id="tbl-users">
              <thead>
                <tr>
                    <th class="sorting">Category</th>
                    <th class="sorting">Name</th>
                    <th class="sorting">Status</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 124px;" aria-label="Actions">Actions</th></tr>
              </thead>
              <tbody>
                @foreach($procurement as $procurement_item)
                <tr>
                    <td>{{ $procurement_item->name }}</td>
                    <td>{{ $procurement_item->position }}</td>
                    <td>{{ $procurement_item->publish == 1 ? "Published" : "Not Published" }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                    <a href="/categories/procurements/{{$procurement_item->id  }}/edit" class="mr-2 edit btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i> Edit</a>
                        <a href="/categories/{{$procurement_item->id  }}/destroy" class="mr-2 edit btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Delete</a> </div>
                    </td>
                </tr>
                @php
                $subcategory = \App\Models\Procurement::where(['parent' => $procurement_item->id,'type' =>2,'alterproc' =>1])->get();
                @endphp
                @foreach($subcategory as $sub_category_item)
                <tr>
                    <td>--{{ $sub_category_item->name }}</td>
                    <td>{{ $sub_category_item->position }}</td>
                    <td>{{ $sub_category_item->publish == 1 ? "Published" : "Not Published" }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                    <a href="/categories/alternative/{{$sub_category_item->id  }}/edit" class="mr-2 edit btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i> Edit</a>
                        <a href="/categories/{{$sub_category_item->id  }}/destroy" class="mr-2 edit btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Delete</a> </div>
                    </td>
                </tr>
                @endforeach
                @endforeach
              </tbody>

            </table>
        </div>
            {{-- <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div> --}}
          </div>
      </div>

@endsection


