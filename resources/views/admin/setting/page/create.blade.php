@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active"> Page Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">



        <div class= "col-12">
        <div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Create a New Page</h3>
</div>

<!-- ///// Change password form =======> -->

<form action="{{ route('page.store') }}" method="POST">

@csrf

<div class="card-body">

<div class="form-group">
<label for="exampleInputEmail1">Page Position</label>
<select name="page_position" class="form-control" >
  <option value="1">Line 1</option>
  <option value="2">Line 2</option>

</select>
</div>


<div class="form-group">
<label for="exampleInputEmail1">Page Name</label>
<input type="text" class="form-control" placeholder="Page Name" name="page_name">
</div>

<div class="form-group">
<label for="exampleInputPassword1">Page Title</label>
<input type="text" class="form-control" placeholder="Page Title" name="page_title">
</div>

<!-- // Use summer note ita come from head tag and script tag then into class add id as summernote its come from script  -->
<div class="form-group">
<label for="exampleInputPassword1">Page Description</label>
<textarea  class="form-control textarea" id="summernote" name="page_description" rows="10"></textarea>
<small>This Data will Show on your Wbsite</small>
</div>



<div class="card-footer">
<button type="submit" class="btn btn-primary">Create Page</button>
</div>
</form>
</div>
        </div>





          
        </div>
        <!-- /.row -->

     
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
