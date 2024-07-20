
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
        <form action="/categories/store" method="post" id="member-form" enctype="multipart/form-data">
            @csrf
        <div class="col-md-12">
            <div class="card mb-12">
              <h5 class="card-header">Create</h5>
              <div class="card-body">


                <div class="mb-3">
                    <label for="defaultInput" class="form-label">Child</label>
                    <input class="form-check-input" name="type" value="2" type="checkbox" id="customCheckPrimary" />
                    <select name="parent" id="child_select" class="form-select">
                        <option value="0">-Select Category-&nbsp;</option>
                        @foreach($category as $category_item)
                        <option value="{{ $category_item->id }}">{{ $category_item->name }}&nbsp;</option>
                        @endforeach
                     </select>
                </div>

                <div class="mb-3">
                  <label for="defaultInput" class="form-label">Category Name</label>
                  <input id="defaultInput" name="name" class="form-control" type="text" placeholder="Category Name" />
                </div>

                <div class="mb-3">
                    <label for="defaultInput" class="form-label">Position</label>
                    <select id="position" name="position" class="form-select">
                        <!-- Options will be added dynamically using JavaScript -->
                      </select>
                </div>

                <div class="mt-2 mb-3">
                <label for="largeInput" class="form-label">Publish:</label>
                <input class="form-check-input" name="status" type="checkbox" value="1" />

                </div>



                  <div class="mb-3">
                    <button type="submit" name="alterproc" value="1" class="btn btn-primary waves-effect waves-light">Save</button>

                    <a href="/procurement/activities/index" class="btn btn-danger waves-effect waves-light">Cancel</a>
                  </div>

              </div>
            </div>
          </div>
        </form>
    </div>

<script>
// Get the checkbox and div elements
var checkbox = document.getElementById('customCheckPrimary');
var child_select = document.getElementById('child_select');
//Position
var position = document.getElementById('position');

child_select.style.display = 'none';

// Add an event listener for the change event on the checkbox
checkbox.addEventListener('change', function() {
// Check if the checkbox is checked
if (checkbox.checked) {
// If checked, show the div
child_select.style.display = 'block';
} else {
// If unchecked, hide the div
child_select.style.display = 'none';
}
});

// Function to add numbers from -100 to 100 to the select box
function addNumbersToSelect() {
  // Loop from -100 to 100
  for (var i = 100; i >= -250; i--) {
    // Create a new option element
    var option = document.createElement('option');
    // Set the value and text of the option to the current number
    option.value = i;
    option.text = i;

    // Append the option to the select box
    position.appendChild(option);
  }
}

// Call the function to add numbers to the select box
addNumbersToSelect();
</script>
@endsection


