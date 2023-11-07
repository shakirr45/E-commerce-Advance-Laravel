@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add New</button>
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
                <h3 class="card-title">All Categories List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-sm">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Icon</th>
                    <th>Home Page</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=>$row)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->category_name }}</td>
                    <td>{{ $row->category_slug }}</td>
                    <td>
                    <img src="{{ asset($row->icon) }}" alt="{{ $row->category_name }}" width="32" height="32">
                    </td>
                    <td>
                    @if($row->home_page == 1)
                    <a href="#"> <span class="badge badge-success">Home Page</span> </a>
                    @endif
                    </td>

                    <td>
                        <a href="" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="{{ $row->id }}"><i class="fas fa-edit"></i></a>

                        <a href="{{ route('category.delete',$row->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                    </td>

                  </tr>

                  @endforeach
                 </tbody>
                </table>
              </div>
             </div>
            </div>
        </div>
    </div>
</section>

 </div>
 

    <!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"> 
        @csrf
    <div class="modal-body">
  <div class="form-group">
    <label for="category_name">Category Name</label>
    <input type="text" class="form-control" id="category_name" name="category_name" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your Main Category</small>
  </div>

  <div class="form-group">
    <label for="home_page">Show ON Home Page</label>
    <select class="form-control" name="home_page" id="">
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
    <small id="emailHelp" class="form-text text-muted">If yes it will be show on your Home Page</small>
  </div>

  <div class="form-group ">
    <label for="icon">Icon</label>
    <input type="file" name="icon" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your Category Icon</small>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data"> 
        @csrf
    <div class="modal-body">

  <div class="form-group">
    <label for="category_name">Category Name</label>
    <input type="text" class="form-control" id="e_category_name" name="category_name" required="">

    <!-- //need that----> 
    <input type="hidden" class="form-control" id="e_category_id" name="id">

    <small id="emailHelp" class="form-text text-muted">This is Your Main Category</small>
  </div>

  <div class="form-group">
    <label for="home_page">Home Page</label>
    <select class="form-control" name="home_page" id="e_category_home_page" >
      <option value="1">Home Page</option>
      <option value="0">Not For Home Page</option>
    </select>
    <small id="emailHelp" class="form-text text-muted">For Showing into Home Page</small>
  </div>

  <div class="form-group ">
    <label for="brand_name">Brands Logo</label>
    <input type="file" class="" name="icon"  id="e_category_icon">
    <small id="emailHelp" class="form-text text-muted">This is Your brand Logo</small>
  <input type="hidden" name="old_icon" id="e_category_old_icon">

  </div>

      </div>

      


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Ajax use for edit Category  -->

<!-- //ajax cdn-----> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

  $('body').on('click','.edit', function(){
    let cat_id = $(this).data('id');
    // alert(cat_id);

    $.get("category/edit/" + cat_id, function(data){

      console.log(data);
      $('#e_category_name').val(data.category_name);
      $('#e_category_id').val(data.id);
      $('#e_category_home_page').val(data.home_page);
      $('#e_category_old_icon').val(data.old_icon);
      $('#e_category_old_icon').val(data.old_icon);
      $('#e_category_icon').val(data.icon);


    });
  });
  
</script>
    @endsection
