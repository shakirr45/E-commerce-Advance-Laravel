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
            <h1 class="m-0">Products</h1>
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
                <h3 class="card-title">All Products List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <!-- // for yajra ytable = remove==> id example1 j tablestate datab tables banabo-->
                <table id="" class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Brand</th>
                    <th>Featured</th>
                    <th>Today Deal</th>
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
 

 

 <!-- For yajra datatables -------=============================------------- -->
<!-- Ajax use for edit product  -->
<!-- //ajax cdn-----> 
 <!-- For yajra datatables -------=============================------------- -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>

 $(function product(){
    // ei table take data table banalam
    var table = $('.ytable').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('product.index') }}",
        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            // contoller theke img ta ana hoace r img ar ek vbe show kora jay jeta ace brand index e . evabe kore kora hoice karon img ace public e r db te pass kora ace sudhu image er name
            {data:'thumbnail' ,name:'thumbnail'},
            {data:'name' ,name:'name'},
            {data:'code' ,name:'code'},
            {data:'category_name' ,name:'category_name'},
            {data:'subcategory_name' ,name:'subcategory_name'},
            {data:'brand_name' ,name:'brand_name'},
            {data:'fratured' ,name:'fratured'},
            {data:'today_deal' ,name:'today_deal'},
            {data:'status' ,name:'status'},

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
