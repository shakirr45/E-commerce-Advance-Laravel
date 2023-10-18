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
                <a href="{{ route('product.create') }}" class="btn btn-primary">+ Add New</a>
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
              </div><br>
              <!-- /.card-header -->


              <div class="row p-2">

                    <div class="form-group col-3">
                      <label>Category</label>
                      <select class="form-control submitable" name="category_id" id="category_id">
                        <option value="">All</option>
                        @foreach($category as $row)
                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="form-group col-3">
                      <label>Brand</label>
                      <select class="form-control submitable" name="brand_id" id="brand_id">
                        <option value="">All</option>
                      @foreach($brand as $row)
                        <option value="{{ $row->id }}">{{ $row->brand_name }}</option>
                        @endforeach

                      </select>
                    </div>

                    <div class="form-group col-3">
                      <label>Warehouse</label>
                      <select class="form-control submitable" name="warehouse" id="warehouse">
                        <option value="">All</option>
                      @foreach($warehouse as $row)
                        <option value="{{ $row->id }}">{{ $row->warehouse_name }}</option>
                        @endforeach

                      </select>
                    </div>

                    <div class="form-group col-3">
                      <label>Status</label>
                      <select class="form-control submitable" name="status" id="status">
                        <option value="">All</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>

                      </select>
                    </div>
  
  
                    </div>

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

 $(function products(){
    // ei table take data table banalam
    var table = $('.ytable').DataTable({
        // processing:true,
        // serverSide:true,
        // niche kicu change kora hoice search korar jonne r ytable er code ace ekhne r fresh code search cara brand er vetor ace-->
        // ajax:"{{ route('product.index') }}",


        //For search--->
        "processing":true,
        "serverSide":true,
        "searching":true,
        "ajax":{
          "url": "{{ route('product.index') }}",
          "data":function(e) {
            e.category_id =$("#category_id").val();
            e.brand_id =$("#brand_id").val();
            e.warehouse =$("#warehouse").val();
            e.status =$("#status").val();

          }
        },

        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},
            // contoller theke img ta ana hoace r img ar ek vbe show kora jay jeta ace brand index e . evabe kore kora hoice karon img ace public e r db te pass kora ace sudhu image er name
            {data:'thumbnail' ,name:'thumbnail'},
            {data:'name' ,name:'name'},
            {data:'code' ,name:'code'},
            {data:'category_name' ,name:'category_name'},
            {data:'subcategory_name' ,name:'subcategory_name'},
            {data:'brand_name' ,name:'brand_name'},
            {data:'featured' ,name:'featured'},
            {data:'today_deal' ,name:'today_deal'},
            {data:'status' ,name:'status'},

            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });

 
</script>


<!-- button e click er por reload cara value 1 theke 0 korahoace -->
<script>
  // For deactive btn====>
  $(document).on('click','.deactive_featured',function(e){
        e.preventDefault();
        let id=$(this).data('id');
        // alert(id);
        var url = "{{ url('product/not-featured') }}/"+id;
        $.ajax({
          url: url,
            type: 'get',
            success: function (data) {
                  $('.table').DataTable().ajax.reload();
            }
        });

  })

  // for active featured ======>
  $(document).on('click','.active_featured',function(e){
        e.preventDefault();
        let id=$(this).data('id');
        // alert(id);
        var url = "{{ url('product/active-featured') }}/"+id;
        $.ajax({
          url: url,
            type: 'get',
            success: function (data) {
                  $('.table').DataTable().ajax.reload();
            }
        });

  })


    // For deactive deal====>
    $(document).on('click','.deactive_deal',function(e){
        e.preventDefault();
        let id=$(this).data('id');
        // alert(id);
        var url = "{{ url('product/not-deal') }}/"+id;
        $.ajax({
          url: url,
            type: 'get',
            success: function (data) {
                  $('.table').DataTable().ajax.reload();
            }
        });

  })

  // for active deal ======>
  $(document).on('click','.active_deal',function(e){
        e.preventDefault();
        let id=$(this).data('id');
        // alert(id);
        var url = "{{ url('product/active-deal') }}/"+id;
        $.ajax({
          url: url,
            type: 'get',
            success: function (data) {
                  $('.table').DataTable().ajax.reload();
            }
        });

  })




      // For deactive status====>
      $(document).on('click','.deactive_status',function(e){
        e.preventDefault();
        let id=$(this).data('id');
        // alert(id);
        var url = "{{ url('product/not-status') }}/"+id;
        $.ajax({
          url: url,
            type: 'get',
            success: function (data) {
                  $('.table').DataTable().ajax.reload();
            }
        });

  })

  // for active status ======>
  $(document).on('click','.active_status',function(e){
        e.preventDefault();
        let id=$(this).data('id');
        // alert(id);
        var url = "{{ url('product/active-status') }}/"+id;
        $.ajax({
          url: url,
            type: 'get',
            success: function (data) {
                  $('.table').DataTable().ajax.reload();
            }
        });

  })


</script>

    @endsection

