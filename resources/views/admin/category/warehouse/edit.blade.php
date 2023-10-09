<form action="{{ route('warehouse.update') }}" method="POST" id="add-form"> 
        @csrf
    <div class="modal-body">


  <input type="hidden" name="id" value="{{  $data->id  }}">

  


  <div class="form-group">
    <label for="warehouse_name">Warehouse Name</label>
    <input type="text" class="form-control" name="warehouse_name" required="" value="{{ $data->warehouse_name }}"> 
  </div>

  <div class="form-group">
    <label for="warehouse_address">Warehouse Address</label>
    <input type="text" class="form-control" name="warehouse_address" required="" value="{{ $data->warehouse_address }}"> 
  </div>

  <div class="form-group">
    <label for="warehouse_phone">Warehouse Phone</label>
    <input type="text" class="form-control" name="warehouse_phone" required="" value="{{ $data->warehouse_phone }}"> 
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading........</span> Update</button>
      </div>
      </form>