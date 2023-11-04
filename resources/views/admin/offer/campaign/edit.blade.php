<form action="{{ route('campaign.update') }}" method="POST" id="add-form" enctype="multipart/form-data"> 
        @csrf
    <div class="modal-body">

  <div class="form-group">
    <label for="title">Campaign Title </label>
    <input type="text" class="form-control" name="title" required="" value="{{ $data->title }}">
  </div>

  <input type="hidden" name="id" value="{{ $data->id }}">

    <div class="row">

    <div class="col-lg-6">
        <div class="form-group">
            <label for="start-date">Start Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="start_date" value="{{ $data->start_date }}" required="">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="start-date">End Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="end_date" value="{{ $data->end_date }}" required="">
        </div>
    </div>

    </div>


    <div class="row">

    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Status <span class="text-danger">*</span></label>
            <select name="status" id="" class="form-control">
                <option value="1" @if($data->status == 1) selected="" @endif>Active</option>
                <option value="0"  @if($data->status == 0) selected="" @endif>Inactive</option>
            </select>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
        <label for="start-date">Discount (%) <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="discount" value="{{ $data->discount }}" required="">
            <small id="emailHelp" class="form-text text-danger">Discount Percentage are all product selling price</small>
        </div>
    </div>

    </div>


  <div class="form-group ">
    <label for="brand_name">Brands Logo</label>
    <input type="file" class="" data-height="140" id="input-file-now" name="image">
    <small id="emailHelp" class="form-text text-muted">This is Your brand Logo</small>
  <input type="hidden" name="old_image" value="{{ $data->image }}">

  </div>







      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading........</span> Update</button>
      </div>
      </form>