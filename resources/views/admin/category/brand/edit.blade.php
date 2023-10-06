<form action="{{ route('brand.update') }}" method="POST" id="add-form" enctype="multipart/form-data"> 
        @csrf
    <div class="modal-body">

  <div class="form-group">
    <label for="brand_name">Brands Name</label>
    <input type="text" class="form-control" name="brand_name" required="" value="{{ $data->brand_name }}">
    <small id="emailHelp" class="form-text text-muted">This is Your brand</small>
  </div>

  <input type="hidden" name="id" value="{{ $data->id }}">


  <div class="form-group ">
    <label for="brand_name">Brands Logo</label>
    <input type="file" class="" data-height="140" id="input-file-now" name="brand_logo" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your brand Logo</small>
  <input type="hidden" name="old_logo" value="{{ $data->brand_logo }}">

  </div>







      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading........</span> Update</button>
      </div>
      </form>