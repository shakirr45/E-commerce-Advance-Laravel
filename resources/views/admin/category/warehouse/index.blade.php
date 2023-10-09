@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Warehouse</h1>
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
                <h3 class="card-title">All Warehouse List Here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <!-- // for yajra tableremove id cause niche class e ytable nwa-->
                <table  class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Warehouse Name</th>
                    <th>Warehouse Address</th>
                    <th>Warehouse Phone</th>
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
 

    <!-- category insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Warehouse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<!-- // ===== ================  nicher class ta use kora hoice submit korbar por jate loading icon ta show kore or jonne ar niche er jonne script ace ============================= -->
      <form action="{{ route('warehouse.store') }}" method="POST" id="add-form" on> 
        @csrf
    <div class="modal-body">

  <div class="form-group">
    <label for="warehouse_name">Warehouse Name</label>
    <input type="text" class="form-control" name="warehouse_name" required="" placeholder="Warehouse Name">
  </div>

  <div class="form-group">
    <label for="warehouse_address">Warehouse Address</label>
    <input type="text" class="form-control" name="warehouse_address" required="" placeholder="Warehouse Address">
  </div>

  <div class="form-group">
    <label for="warehouse_phone">Warehouse Phone</label>
    <input type="text" class="form-control" name="warehouse_phone" required="" placeholder="Warehouse Phone">
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none loader"><i class="fas fa-spinner"></i>Loading......</span> <span class="submit_btn">Submit</span> </button>
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
    var table = $('.ytable').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('warehouse.index') }}",
        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            {data:'warehouse_name' ,name:'warehouse_name'},
            {data:'warehouse_address' ,name:'warehouse_address'},
            {data:'warehouse_phone' ,name:'warehouse_phone'},
            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });






 // For add Form  ====>
 $('#add-form').on('submit', function(){
    let id = $(this).data('id');
    // alert('ss');
    $('.loader').removeClass('d-none');
    $('.submit_btn').addlass('d-none');


  });



 // For Edit form ====>
 $('body').on('click','.edit', function(){
    let id = $(this).data('id');
    // alert(cat_id);

    $.get("warehouse/edit/" + id, function(data){

        $("#modal_body").html(data);
        

    });
  });
  
</script>
    @endsection
