<form action="{{ route('childcategory.update') }}" method="POST" id="add-form"> 
        @csrf
    <div class="modal-body">

    <div class="form-group">
    <label for="category_name">Category/Subcategory Name</label>

    <select class="form-control" name="subcategory_id" required="">

    <!--  //for yajra ====> --remove foreach and btn> -->
    @foreach($category as $row)
    @php
    $subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
    @endphp 
    <!-- // need to disabled =====> for not to select -->
    <option disabled="" style="color:blue;">{{ $row->category_name }}</option>

        @foreach($subcat as $row)

        <option value="{{ $row->id }}" @if($row->id == $data->subcategory_id) selected @endif> --- {{ $row->subcategory_name }}</option>3
        @endforeach

        @endforeach

    </select>
  </div>

  <input type="hidden" name="id" value="{{  $data->id  }}">


  <div class="form-group">
    <label for="childcategory_name">Child Category Name</label>
    <input type="text" class="form-control" name="childcategory_name" required="" value="{{ $data->childcategory_name }}"> 
    <small id="emailHelp" class="form-text text-muted">This is Your Child Category</small>
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading........</span> Update</button>
      </div>
      </form>