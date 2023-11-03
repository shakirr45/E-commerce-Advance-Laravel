@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Child Category</h1>
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
                <h3 class="card-title">All Sub-Categories List Here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <!-- // for yajra ytable = remove==> id example1 j tablestate datab tables banabo-->
                <table id="" class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                    <th>Start Date</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Discount(%)</th>
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
 

    <!-- campaign insert Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('campaign.store') }}" method="Post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      
      <div class="form-group">
        <label for="">Campaign Title</label>
        <input type="text" class="form-control" name="title" value="" required="">
        </div>

        <input type="text" name="id" value="">

        <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="start-date">Start Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="start_date" value="" required="">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="start-date">End Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="end_date" value="" required="">
                </div>
            </div>

        </div>


        <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Status <span class="text-danger">*</span></label>
                    <select name="status" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                <label for="start-date">Discount (%) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="discount" value="" required="">
                    <small id="emailHelp" class="form-text text-danger">Discount Percentage are all product selling price</small>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="">Brand Logo</label>
            <input type="file" class="" name="image">
            <input type="hidden" class="" name="old_image" value="">

        </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Submit</button>
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
        ajax:"{{ route('campaign.index') }}",
        columns:[
            {data:'start_date' ,name:'start_date'},
            {data:'title' ,name:'title'},
            {data:'image' ,name:'image', render: function(data, type, full,meta){
                return "<img src=\"" +data+ "\" height=\" 30\" />"
            }},
            {data:'discount' ,name:'discount'},
            {data:'status' ,name:'status'},

            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });


 // For Edit child campaign ====>
//  $('body').on('click','.edit', function(){
//     let id = $(this).data('id');
//     // alert(cat_id);

//     $.get("childcategory/edit/" + id, function(data){

//         $("#modal_body").html(data);
        

//     });
//   });
  
</script>


    @endsection
