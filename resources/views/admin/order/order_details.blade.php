 

 <input type="hidden" name="id" value="{{ $order->id }}">
 <input type="hidden" class="form-control" name="c_name"  value="{{ $order->c_name }}">
 <input type="hidden" class="form-control" name="c_email"  value="{{ $order->c_email }}">
 <input type="hidden" class="form-control" name="c_address" value="{{ $order->c_address }}">
 <input type="hidden" class="form-control" name="c_phone"   value="{{ $order->c_phone }}">

 <div class="modal-body">
    <strong>Order Details</strong>


       <div>
       <div class="row">

            <div class="col-4">
            <p>Name: {{ $order->c_name }}</p>
            </div>

            <div class="col-4">
            <p>Phone: {{ $order->c_phone }}</p>
            </div>

            <div class="col-4">
            <p>Email: {{ $order->c_email }}</p>
            </div>

            </div>

            <div class="row">

            <div class="col-4">
            <p>Country: {{ $order->c_country }}</p>
            </div>

            <div class="col-4">
            <p>City: {{ $order->c_city }}</p>
            </div>

            <div class="col-4">
            <p>Zipcode: {{ $order->c_zipcode }}</p>
            </div>

            </div>

            <div class="row">

            <div class="col-4">
            <p>OrderId: {{ $order->order_id }}</p>
            </div>

            <div class="col-4">
            <p>Subtotal: {{ $order->subtotal }} {{ $setting->currency }}</p>
            </div>

            <div class="col-4">
            <p>Total: {{ $order->total }} {{ $setting->currency }}</p>
            </div>

            </div><br>

            <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">QtyxPrice</th>
                                    <th scope="col">Subtotal</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($order_details as $row)
                                <tr>
                                    <th scope="row">{{ $row->product_name }}</th>
                                    <td>{{ $row->size }}</td>
                                    <td>{{ $row->color }}</td>
                                    <td>{{ $row->quantity }} x {{ $row->single_price }} {{ $setting->currency }}</td>
                                    <td>{{ $row->subtotal_price }} {{ $setting->currency }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>



       </div>

  <div class="form-group">
    <label for="pickup_point_phone">Order Status</label>
                      <select class="form-control " name="status">

                        <option value="0" @if ($order->status == 0) selected @endif>Pending</option>
                        <option value="1" @if ($order->status == 1) selected @endif>Recieved</option>
                        <option value="2" @if ($order->status == 2) selected @endif>Shipped</option>
                        <option value="3" @if ($order->status == 3) selected @endif>Completed</option>
                        <option value="4" @if ($order->status == 4) selected @endif>Return</option>
                        <option value="5" @if ($order->status == 5) selected @endif>Cancel</option>

                      </select>
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger modal_close" data-dismiss="modal"> Close</button>

      </div>


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<!-- 
      <script> 

        $('#view_edit_form').submit(function(e){
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
              $('#view_edit_form')[0].reset();
              console.log('shakir');
              $('#viewModal').modal('hide');
              $('.table').DataTable().ajax.reload();

            }
          });
        });

      </script> -->