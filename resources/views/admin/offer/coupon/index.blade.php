@extends('layouts.admin')

@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Coupon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_Modal">+ Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Coupon List Here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <!-- // for yajra ytable = remove==> id example1 j tablestate datab tables banabo- classe ytable dwa niche etar script-->
                <table id="updatemodelform" class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Coupon Code</th>
                    <th>Coupon Amount</th>
                    <th>Coupon Date</th>
                    <th>Coupon Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <!--  //for yajra ====> --remove foreach and btn> -->




                  </form>
                  	
                   
                
                 </tbody>
                </table>
              </div>
             </div>
            </div>
        </div>
    </div>
</section>

 </div>
 

    <!-- Coupon insert Modal -->
<div class="modal fade" id="add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Coupons</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="post" id="exampleModal"> 
        @csrf
    <div class="modal-body">
    				


  <div class="form-group">
    <label for="coupon_code">Coupon Code</label>
    <input type="text" class="form-control" name="coupon_code" required="" id="coupon_code">
  </div>

  <div class="form-group">
    <label for="type">Coupon Type</label>
    <select name="type" class="form-control" required="" id="type">
        <option value="1">Fixed</option>
        <option value="2">Parcentage</option>
    </select>
  </div>

  <div class="form-group">
    <label for="status">Coupon Status</label>
    <select name="status" class="form-control" required="" id="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
  </div>

  <div class="form-group">
    <label for="coupon_amount">Amount</label>
    <input type="text" class="form-control" name="coupon_amount" required="" id="coupon_amount">
  </div>


  <div class="form-group">
    <label for="valid_date">VAlid Date</label>
    <input type="date" class="form-control" name="valid_date" required="" id="valid_date">
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger modal_close" data-dismiss="modal"> Close</button>

        <button type="submit" class="btn btn-primary add_coupon" data-dismiss="modal"> <span class="loading d-none">Loading........</span> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Modal====> -->
 <!-- Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Child Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="post" id="update_modal"> 
        @csrf
    <div class="modal-body">
    				
    <input type="hidden" id="up_id">


  <div class="form-group">
    <label for="coupon_code">Coupon Code</label>
    <input type="text" class="form-control" name="up_code" required="" id="up_code">
  </div>

  <div class="form-group">
    <label for="type">Coupon Type</label>
    <select name="up_type" class="form-control" required="" id="up_type">
        <option value="1">Fixed</option>
        <option value="2">Parcentage</option>
    </select>
  </div>

  <div class="form-group">
    <label for="status">Coupon Status</label>
    <select name="up_status" class="form-control" required="" id="up_status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
  </div>

  <div class="form-group">
    <label for="coupon_amount">Amount</label>
    <input type="text" class="form-control" name="up_amount" required="" id="up_amount">
  </div>


  <div class="form-group">
    <label for="valid_date">VAlid Date</label>
    <input type="date" class="form-control" name="up_date" required="" id="up_date">
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger modal_close" data-dismiss="modal"> Close</button>

        <button type="submit" class="btn btn-primary update_coupon" data-dismiss="modal"> <span class="loading d-none">Loading........</span> Update</button>
      </div>
      </form>

      </div>
    </div>
  </div>
</div>

 <!-- For yajra datatables -------=============================------------- -->
<!-- Ajax use for edit Category  -->
<!-- //ajax cdn-----> 
 <!-- For yajra datatables -------=============================------------- -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
  
 $(function childcategory(){
    // ei table take data table banalam
     var table = $('.ytable').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('coupon.index') }}",
        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            {data:'coupon_code' ,name:'coupon_code'},
            {data:'coupon_amount' ,name:'coupon_amount'},
            {data:'valid_date' ,name:'valid_date'},
            {data:'status' ,name:'status'},
            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });

</script>

 <script>
$(document).ready(function(){
    //product insert with ajax;

  $(document).on('click','.add_coupon',function(e){
        e.preventDefault();
        let coupon_code=$('#coupon_code').val();
        let type=$('#type').val();
        let status=$('#status').val();
        let coupon_amount=$('#coupon_amount').val();
        let valid_date=$('#valid_date').val();

        console.log(coupon_code , type ,status,coupon_amount,valid_date);
      
        $.ajax({
            type: "post",
            url: "{{ route('coupon.store') }}",
            data: {coupon_code:coupon_code,type:type,status:status,coupon_amount:coupon_amount,valid_date:valid_date},
            dataType: "json",
            success: function (response) {
                 if (response.status=='success') {
                    $('#add_Modal').modal('hide');
                    $('#exampleModal')[0].reset();
                    // $('.table').load(location.href+' .table');
                    $('.table').DataTable().ajax.reload();

                 }
            },error: function (err) {
               let error=err.responseJSON;
               $.each(error.errors,function(index,value){
                $('.errmsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
               })
            }
        });

       });

       // for show data into table=====> for update
      // show value
        $(document).on('click','.update_product', function () {
         let id=$(this).data('id');
         let code=$(this).data('code');
         let type=$(this).data('type');
         let amount=$(this).data('amount');
         let date=$(this).data('date');
         let status=$(this).data('status');
        //  console.log(code);

         $('#up_id').val(id);
         $('#up_code').val(code);
         $('#up_type').val(type);
         $('#up_amount').val(amount);
         $('#up_date').val(date);
         $('#up_status').val(status);

       });
       //for insert as update ====>
       $(document).on('click', '.update_coupon', function(e){
        e.preventDefault();
        let up_id=$('#up_id').val();
        let up_code=$('#up_code').val();
        let up_type=$('#up_type').val();
        let up_amount=$('#up_amount').val();
        let up_date=$('#up_date').val();
        let up_status=$('#up_status').val();
        console.log(up_code , up_type ,up_amount,up_date,up_status);
        $.ajax({
          type: "post",
            url: "{{ route('coupon.update') }}",
            data: {up_id:up_id,up_code:up_code,up_type:up_type,up_amount:up_amount,up_date:up_date,up_status:up_status},
            dataType: "json",
            success: function (response) {
                 if (response.status =='success') {
                    $('#editModal').modal('hide');
                    $('#update_modal')[0].reset();
                    // $('.table').load(location.href+' .table');
                    $('.table').DataTable().ajax.reload();

                 }
            },error: function (err) {
               let error=err.responseJSON;
               $.each(error.errors,function(index,value){
                $('.errmsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
               })
            }
        })

      
        
       })

       
       //Delete data ====>
       $(document).on('click','.delete_coupon',function(e){
        e.preventDefault();
        let coupon_id=$(this).data('id');

        // alert(coupon_id);
        if (confirm("are you sure to delete This product ?")){
            $.ajax({
            type: 'DELETE',
            url: "{{ route('delete.coupon') }}",
            data: {coupon_id: coupon_id},
            dataType: "json",
            success: function (response) {
                console.log(response);
                 if (response.status=='success') {
                    $('#add_Modal').modal('hide');
                    $('#exampleModal')[0].reset();
                    // $('.table').load(location.href+' .table');
                    $('.table').DataTable().ajax.reload();

                    
                 }
            }
        });
        }
       })

      });


</script> 







    @endsection
