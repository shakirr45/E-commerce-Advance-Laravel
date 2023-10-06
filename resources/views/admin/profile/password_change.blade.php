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
              <li class="breadcrumb-item active"> Password Change</li>
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



        <div class= "col-6">
        <div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Change Your Password</h3>
</div>

<!-- ///// Change password form =======> -->

<form action="{{ route('admin.password.update') }}" method="POST">

@csrf

<div class="card-body">

<div class="form-group">
<label for="exampleInputEmail1">Old Password</label>
<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Old Password" name="old_password">
</div>

<div class="form-group">
<label for="exampleInputPassword1">New Password</label>
<!-- // name come from views/auth/register=== -->
<input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="New Password" name="password">
@error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
                 
     </span>
     @enderror
</div>



<div class="form-group">
<label for="exampleInputPassword1">Confirm Password</label>
<!-- // name come from views/auth/register=== -->
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirmation">
</div>



<div class="card-footer">
<button type="submit" class="btn btn-primary">Update Password</button>
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
