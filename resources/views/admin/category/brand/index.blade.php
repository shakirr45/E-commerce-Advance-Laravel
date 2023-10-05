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
            <h1 class="m-0">Brands</h1>
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
                <h3 class="card-title">All Brands List Here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <!-- // for yajra ytable = remove==> id example1 j tablestate datab tables banabo-->
                <table id="" class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                  <th>SL</th>
                    <th>Brand Name</th>
                    <th>Brand Slug</th>
                    <th>Brand logo</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- // For image ----enctype="multipart/form-data" -->
      <form action="{{ route('brand.store') }}" method="POST" id="add-form" enctype="multipart/form-data"> 
        @csrf
    <div class="modal-body">




  <div class="form-group">
    <label for="brand_name">Brands Name</label>
    <input type="text" class="form-control" name="brand_name" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your brand</small>
  </div>


  <div class="form-group ">
    <label for="brand_name">Brands Logo</label>
    <input type="file" class="" data-height="140" id="input-file-now" name="brand_logo" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your brand Logo</small>
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
    var table = $('.ytable').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('brand.index') }}",
        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            {data:'brand_name' ,name:'brand_name'},
            {data:'brand_slug' ,name:'brand_slug'},
            {data:'brand_logo' ,name:'brand_logo', render: function(data, type, full,meta){
                return "<img src=\"" +data+ "\" height=\" 30\" />"
            }},
            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });


  
</script>


<!-- // for dropify ===========> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $('.dropify').dropify();
</script>
    @endsection
