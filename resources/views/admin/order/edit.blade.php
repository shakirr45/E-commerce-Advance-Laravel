<!-- <form action="{{ route('update.order.status') }}" method="post" id="edit_form">  -->
        <!-- @csrf -->
    <!-- <div class="modal-body"> -->
    				


  <!-- <div class="form-group">
    <label for="pickup_point_name">Name</label>
    <input type="text" class="form-control" name="c_name" required="" value="{{ $order->c_name }}">
     -->
    <!-- // For get id for edit  -->
    <!-- <input type="hidden" name="id" value="{{ $order->id }}">
  </div> -->

  <!-- <div class="form-group">
    <label for="pickup_point_name"> Address</label>
    <input type="text" class="form-control" name="c_address" required="" value="{{ $order->c_address }}">
  </div> -->


  <!-- <div class="form-group">
    <label for="pickup_point_address">Order Phone</label>
    <input type="text" class="form-control" name="c_phone" required=""  value="{{ $order->c_phone }}">
  </div> -->
<!-- 

  <div class="form-group">
    <label for="pickup_point_phone">Order Status</label> -->
                      <!-- <select class="form-control " name="status">

                        <option value="0" @if ($order->status == 0) selected @endif>Pending</option>
                        <option value="1" @if ($order->status == 1) selected @endif>Recieved</option>
                        <option value="2" @if ($order->status == 2) selected @endif>Shipped</option>
                        <option value="3" @if ($order->status == 3) selected @endif>Completed</option>
                        <option value="4" @if ($order->status == 4) selected @endif>Return</option>
                        <option value="5" @if ($order->status == 5) selected @endif>Cancel</option>

                      </select> -->
  <!-- </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger modal_close" data-dismiss="modal"> Close</button>

        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form> -->



      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>

        $('#edit_form').submit(function(e){
          e.preventDefault();
          var url = $(this).attr('action');
          var request = $(this).serialize();
          $.ajax({
            url:url,
            type:'post',
            async:false,
            data:request,
            success:function(data){
              toastr.success(data);
              $('#edit_form')[0].reset();
              console.log('shakir');
              $('#editModal').modal('hide');
              $('.table').DataTable().ajax.reload();

            }
          });
        });

      </script> -->


 

