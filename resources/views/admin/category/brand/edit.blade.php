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
    <input type="file" class="" data-height="140" id="input-file-now" name="brand_logo" >
    <small id="emailHelp" class="form-text text-muted">This is Your brand Logo</small>
  <input type="hidden" name="old_logo" value="{{ $data->brand_logo }}">

  </div>

  <div class="form-group">
    <label for="front_page">Home Page Show</label>
    <select class="form-control" name="front_page">
      <option value="1" @if($data->front_page == 1) selected="" @endif >Yes</option>
      <option value="0" @if($data->front_page == 0) selected="" @endif >No</option>
    </select>
    <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
  </div>








      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading........</span> Update</button>
      </div>
      </form>