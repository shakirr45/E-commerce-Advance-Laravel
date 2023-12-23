@extends('layouts.admin')

@section('admin_content')

<!-- // for dropify ===========> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">

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
                <h3 class="card-title">All Orders List </h3>
              </div><br>
              <!-- /.card-header -->


              <div class="row p-2">

                    <div class="form-group col-3">
                      <label>Payment Type</label>
                      <select class="form-control submitable" name="payment_type" id="payment_type">

                        <option  value="">All</option>
                        <option value="Hand Cash">Hand Cash</option>
                        <option value="Aamarpay ">Aamarpay</option>
                        <option value="Paypal">Paypal</option>
                      </select>
                    </div>



              <!-- // submitable_input submitable_inputsubmitable_input kora nice script ace  -->
                    <div class="form-group col-3">

                      <label>Date</label>
                      <input type="date" class="form-control submitable_input" name="date" id="date">
                    </div>
                    


                    <div class="form-group col-3">
                      <label>Status</label>
                      <select class="form-control submitable" name="status" id="status">
                        <option>All</option>
                        <option value="0">Pending</option>
                        <option value="1">Recieved</option>
                        <option value="2">Shipped</option>
                        <option value="3">Completed</option>
                        <option value="4">Return</option>
                        <option value="5">Cancel</option>

                      </select>
                    </div>
  
                    </div>

              <div class="card-body ">

              <!-- // for yajra ytable = remove==> id example1 j tablestate datab tables banabo-->
                <table id="" class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Subtotal ({{ $setting->currency }})</th>
                    <th>Total ({{ $setting->currency }})</th>
                    <th>Payment Type</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <!--  //for yajra ====> --remove foreach and btn> -->
                  	
                   
                
                 </tbody>
                </table>
              </div>
             </div>
            </div>
        </div>
    </div>
</section>

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
    <label for="coupon_code">Email</label>
    <input type="text" class="form-control" name="up_email" required="" id="up_email">
  </div>


  <div class="form-group">
    <label for="coupon_code">Name</label>
    <input type="text" class="form-control" name="up_name" required="" id="up_name">
  </div>


  <div class="form-group">
    <label for="coupon_code">Address</label>
    <input type="text" class="form-control" name="up_address" required="" id="up_address">
  </div>


  <div class="form-group">
    <label for="coupon_code">Phone</label>
    <input type="text" class="form-control" name="up_phone" required="" id="up_phone">
  </div>

  <div class="form-group">
    <label for="coupon_code">Status</label>
          <select class="form-control" name="up_status" id="up_status">

        <option value="0" >Pending</option>
        <option value="1" >Recieved</option>
        <option value="2" >Shipped</option>
        <option value="3" >Completed</option>
        <option value="4" >Return</option>
        <option value="5" >Cancel</option>

        </select>

  </div>



      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger modal_close" data-dismiss="modal"> Close</button>

        <button type="submit" class="btn btn-primary update_order" data-dismiss="modal"> <span class="loader d-none">Loading........</span> Update</button>
      </div>
      </form>

      </div>
    </div>
  </div>
</div>



 <!-- For yajra datatables -------=============================------------- -->
<!-- Ajax use for edit product  -->
<!-- //ajax cdn-----> 
 <!-- For yajra datatables -------=============================------------- -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>

 $(function products(){
    // ei table take data table banalam
    var table = $('.ytable').DataTable({
        // processing:true,
        // serverSide:true,
        // niche kicu change kora hoice search korar jonne r ytable er code ace ekhne r fresh code search cara brand er vetor ace-->
        // ajax:"{{ route('product.index') }}",

        

        //For search--->ajax load niche ace
        "processing":true,
        "serverSide":true,
        "searching":true,
        "ajax":{
          "url": "{{ route('admin.order.index') }}",
          "data":function(e) {

            e.status =$("#status").val();
            e.date =$("#date").val();
            e.payment_type =$("#payment_type").val();


             
          }
        },

        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            // contoller theke img ta ana hoace r img ar ek vbe show kora jay jeta ace brand index e . evabe kore kora hoice karon img ace public e r db te pass kora ace sudhu image er name
            {data:'c_name' ,name:'c_name'},
            {data:'c_phone' ,name:'c_phone'},
            {data:'c_email' ,name:'c_email'},
            {data:'subtotal' ,name:'subtotal'},
            {data:'total' ,name:'total'},
            {data:'payment_type' ,name:'payment_type'},
            {data:'date' ,name:'date'},
            {data:'status' ,name:'status'},
            
            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });



        // for show data into table=====> for update
      // show value
      $(document).on('click','.edit_order', function () {
         let id=$(this).data('id');
         let c_name=$(this).data('c_name');
         let c_email=$(this).data('c_email');
         let c_address=$(this).data('c_address');
         let c_phone=$(this).data('c_phone');
         let status=$(this).data('status');
        //  console.log(status);

         $('#up_id').val(id);
         $('#up_name').val(c_name);
         $('#up_email').val(c_email);
         $('#up_address').val(c_address);
         $('#up_phone').val(c_phone);
         $('#up_status').val(status);
         
       });


       //for insert as update ====>
       $(document).on('click', '.update_order', function(e){
        e.preventDefault();
        let up_id=$('#up_id').val();
        let up_name=$('#up_name').val();
        let up_email=$('#up_email').val();
        let up_address=$('#up_address').val();
        let up_phone=$('#up_phone').val();
        let up_status=$('#up_status').val();
        $('.loader').removeClass('d-none');
        console.log(up_name , up_address ,up_phone, up_status, up_email);
        $.ajax({
          type: "post",
            url: "{{ route('order.update') }}",
            data: {up_id:up_id,up_name:up_name,up_email:up_email,up_address:up_address,up_phone:up_phone,up_status:up_status},
            dataType: "json",
            success: function (response) {
                 if (response.status =='success') {
                    $('#editModal').modal('hide');
                    $('.loader').addClass('d-none');
                    $('.table').DataTable().ajax.reload();

                 }
            }
        })

       })
       
       




 
</script>



<!-- button e click er por reload cara value 1 theke 0 korahoace -->
<script>


  //   // For edit modal====>
  //   $(document).on('click','.edit',function(e){
  //       e.preventDefault();
  //       let id=$(this).data('id');
  //       // alert(id);
  //       var url = "{{ url('order/admin/edit') }}/"+id; // order prefix er jonne admin.php
  //       $.ajax({
  //         url: url,
  //           type: 'get',
  //           success: function (data) {
  //                 $("#modal_body").html(data);
  //           }
  //       });

  // })

  

  // submitable class call for every change and loading=======>
  $(document).on('change','.submitable', function(){
    $('.ytable').DataTable().ajax.reload();
  })

    // submitable_input class call for date change and loading=======>
    $(document).on('change','.submitable_input', function(){
    $('.ytable').DataTable().ajax.reload();
  })




  //     // submitable_input class call for date change and loading=======> ei code e blur ace etab dile bahire clk krte hobe
  //     $(document).on('blur','.submitable_input', function(){
  //   $('.ytable').DataTable().ajax.reload();
  // })


</script>

    @endsection

