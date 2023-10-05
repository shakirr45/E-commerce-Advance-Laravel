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
                    <th>SL</th>
                    <th>Child Category Name</th>
                    <th>Category Slug</th>
                    <th>Sub Category Name</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Child Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('childcategory.store') }}" method="POST" id="add-form"> 
        @csrf
    <div class="modal-body">

    <div class="form-group">
    <label for="category_name">Category/Subcategory Name</label>

    <select class="form-control" name="subcategory_id" required="">

    <!--  //for yajra ====> --remove foreach and btn> -->
    @foreach($category as $row)
    @php
    $subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
    @endphp 
    <option  disabled="" style="color:blue;" value="">{{ $row->category_name }}</option>

        @foreach($subcat as $row)

        <option value="{{ $row->id }}"> --- {{ $row->subcategory_name }}</option>3
        @endforeach

        @endforeach

    </select>
  </div>


  <div class="form-group">
    <label for="childcategory_name">Child Category Name</label>
    <input type="text" class="form-control" name="childcategory_name" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your Child Category</small>
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
        ajax:"{{ route('childcategory.index') }}",
        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            {data:'childcategory_name' ,name:'childcategory_name'},
            {data:'category_name' ,name:'category_name'},
            {data:'subcategory_name' ,name:'subcategory_name'},
            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });


 // For Edit child category ====>
 $('body').on('click','.edit', function(){
    let id = $(this).data('id');
    // alert(cat_id);

    $.get("childcategory/edit/" + id, function(data){

        $("#modal_body").html(data);
        

    });
  });
  
</script>
    @endsection
