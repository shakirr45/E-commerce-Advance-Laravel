@extends('layouts.admin')

@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">pickup</h1>
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
                <h3 class="card-title">All pickup List Here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <!-- // for yajra ytable = remove==> id example1 j tablestate datab tables banabo- classe ytable dwa niche etar script-->
                <table id="updatemodelform" class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Pickup Poient</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Another Phone</th>
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
 

    <!-- pickup insert Modal -->
<div class="modal fade" id="add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New pickups</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="post" id="exampleModal"> 
        @csrf
    <div class="modal-body">


  <div class="form-group">
    <label for="pickup_point_name">Pickup Point Name</label>
    <input type="text" class="form-control" name="pickup_point_name" required="" id="pickup_point_name">
  </div>


  <div class="form-group">
    <label for="pickup_point_address">Pickup Point Address</label>
    <input type="text" class="form-control" name="pickup_point_address" required="" id="pickup_point_address">
  </div>


  <div class="form-group">
    <label for="pickup_point_phone">Pickup Point Phone</label>
    <input type="text" class="form-control" name="pickup_point_phone" required="" id="pickup_point_phone">
  </div>


  <div class="form-group">
    <label for="pickup_point_phone_two">Pickup Point Phone Two</label>
    <input type="text" class="form-control" name="pickup_point_phone_two" required="" id="pickup_point_phone_two">
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger modal_close" data-dismiss="modal"> Close</button>

        <button type="submit" class="btn btn-primary add_pickup" data-dismiss="modal"> <span class="loading d-none">Loading........</span> Submit</button>
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
    <label for="pickup_point_name">Pickup Point</label>
    <input type="text" class="form-control" name="up_name" required="" id="up_name">
  </div>

  <div class="form-group">
    <label for="pickup_point_name"> Address</label>
    <input type="text" class="form-control" name="up_address" required="" id="up_address">
  </div>


  <div class="form-group">
    <label for="pickup_point_address">Pickup Phone</label>
    <input type="text" class="form-control" name="up_phone" required="" id="up_phone">
  </div>


  <div class="form-group">
    <label for="pickup_point_phone">Pickup Phone two</label>
    <input type="text" class="form-control" name="up_phone_two" required="" id="up_phone_two">
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger modal_close" data-dismiss="modal"> Close</button>

        <button type="submit" class="btn btn-primary update_pickup" data-dismiss="modal"> <span class="loading d-none">Loading........</span> Update</button>
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
        ajax:"{{ route('pickuppoint.index') }}",
        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            {data:'pickup_point_name' ,name:'pickup_point_name'},
            {data:'pickup_point_address' ,name:'pickup_point_address'},
            {data:'pickup_point_phone' ,name:'pickup_point_phone'},
            {data:'pickup_point_phone_two' ,name:'pickup_point_phone_two'},
            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });

</script>

<script>

    $(document).ready(function(){

        //insert ====>
        $(document).on('click', '.add_pickup', function(e){
            e.preventDefault();
            let pickup_point_name = $('#pickup_point_name').val();
            let pickup_point_address = $('#pickup_point_address').val();
            let pickup_point_phone = $('#pickup_point_phone').val();
            let pickup_point_phone_two = $('#pickup_point_phone_two').val();
            
            console.log(pickup_point_name , pickup_point_address ,pickup_point_phone,pickup_point_phone_two);
            $.ajax({
                type: "post",
                url: "{{ route('pickuppoint.store') }}",
                data: {pickup_point_name:pickup_point_name,pickup_point_address:pickup_point_address,pickup_point_phone:pickup_point_phone,pickup_point_phone_two:pickup_point_phone_two},
                dataType: "json",
                success: function (response) {
                    if(response.status=='success'){
                        $('#add_Modal').modal('hide');
                        $('#exampleModal')[0].reset();
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

        // For view pickup data for update ====>
        $(document).on('click','.view_pickup', function () {
         let id=$(this).data('id');
         let name=$(this).data('name');
         let address=$(this).data('address');
         let phone=$(this).data('phone');
         let phone_two=$(this).data('phone_two');
         console.log(name,address,phone,phone_two);


         $('#up_id').val(id);
         $('#up_name').val(name);
         $('#up_address').val(address);
         $('#up_phone').val(phone);
         $('#up_phone_two').val(phone_two);

       });

    //  For update pickup=====>
    //for insert as update ====>
    $(document).on('click', '.update_pickup', function(e){
        e.preventDefault();
        let up_id=$('#up_id').val();
        let up_name=$('#up_name').val();
        let up_address=$('#up_address').val();
        let up_phone=$('#up_phone').val();
        let up_phone_two=$('#up_phone_two').val();
        console.log(up_id , up_name ,up_address,up_phone,up_phone_two);
        $.ajax({
          type: "post",
            url: "{{ route('pickuppoint.update') }}",
            data: {up_id:up_id,up_name:up_name,up_address:up_address,up_phone:up_phone,up_phone_two:up_phone_two},
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

       //For delete Pickup ====>
        //Delete data ====>
         $(document).on('click','.delete_pickup',function(e){
        e.preventDefault();
        let pickup_id=$(this).data('id');

        // alert(pickup_id);
        if (confirm("are you sure to delete This Pickup point ?")){
            $.ajax({
            type: 'DELETE',
            url: "{{ route('pickuppoint.delete') }}",
            data: {pickup_id: pickup_id},
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
