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
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+ Add New</button>
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
                <table id="" class="table table-bordered table-sm ytable">
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


                  @include('sweetalert::alert');
                  <!-- //  Delete korar jonne ei form  -->
                  <form action="" id="delete_form" method="delete">
                    @csrf @method('DELETE')

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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('coupon.store') }}" method="POST" id="add-form"> 
        @csrf
    <div class="modal-body">
    				


  <div class="form-group">
    <label for="coupon_code">Coupon Code</label>
    <input type="text" class="form-control" name="coupon_code" required="">
  </div>

  <div class="form-group">
    <label for="coupon_code">Coupon Type</label>
    <select name="type" class="form-control">
        <option value="1">Fixed</option>
        <option value="2">Parcentage</option>

    </select>
  </div>

  <div class="form-group">
    <label for="coupon_amount">Amount</label>
    <input type="text" class="form-control" name="coupon_amount" required="">
  </div>


  <div class="form-group">
    <label for="valid_date">VAlid Date</label>
    <input type="date" class="form-control" name="valid_date" required="">
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading........</span> Submit</button>
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

      <div id="modal_body">

      </div>
    </div>
  </div>
</div>

 <!-- For yajra datatables -------=============================------------- -->
<!-- Ajax use for edit Category  -->
<!-- //ajax cdn-----> 
 <!-- For yajra datatables -------=============================------------- -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

							


<script>

 $(function childcategory(){
    // ei table take data table banalam
     table = $('.ytable').DataTable({
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


//  // For Edit child category ====>
//  $('body').on('click','.edit', function(){
//     let id = $(this).data('id');
//     // alert(cat_id);

//     $.get("childcategory/edit/" + id, function(data){

//         $("#modal_body").html(data);
        

//     });
//   });

//   fod[pfs;fas;flasdas]=============================>
   $(document).ready(function(){

  $(document).on('click', '#delete_coupon' , function(e){
    // e.preventDefault();
    // var url = $(this).attr('href');
    // $("#delete_form").attr('action' , url);


        // ev.preventDefault();
        // var url = $(this).attr('href');
        // $("#delete_form").attr('action' , url);

    ev.preventDefault();
    var url = $(this).attr('href');
    $("#delete_form").attr('action' , url);


    
    swal({
        // title : "Are You sure",
        // type : "error",
        // confirmButtonClass : "btn-danger",
        // confirmButtonText : "Yes!",
        // confirmButtonButton : "Yes!",

        title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
    })

    .then((willDelete) => {
        if(willDelete){
    $("#delete_form").submit();
        }else{
            swal('Yore Data is safe!');
        }
    });
  });
  // data passed through here ====>
  $("#delete_form").submit(function(e){
    ev.preventDefault();
    var url = $(this).attr('action');
    var request  = $(this).serialize();
    $.ajax({
        url: url,
        type: 'Post',
        async: false,
        data: request,
        success:function(data){
            $('#delete_form')[0].reset();
            table.ajax.reload();
        }
    });
  });


});

  
</script>



    @endsection
