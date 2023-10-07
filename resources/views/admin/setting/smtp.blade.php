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
              <li class="breadcrumb-item active">SMTP Mail</li>
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
<h3 class="card-title">SMTP Mail Setting</h3>
</div>

<!-- ///// Change password form =======> -->

<form action="{{ route('smtp.setting.update',$smtp->id) }}" method="POST">

@csrf


<div class="card-body">

<div class="form-group">
<label for="exampleInputEmail1">Mail Mailer</label>
<input type="text" class="form-control" placeholder="Mail Mailer Example:smtp" name="mailer" value="{{ $smtp->mailer }}">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Mail Host</label>
<input type="text" class="form-control" placeholder="Mail Host" name="host" value="{{ $smtp->host }}">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Mail Port</label>
<input type="text" class="form-control" placeholder="Mail Port Example:2525" name="port" value="{{ $smtp->port }}">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Mail Username</label>
<input type="text" class="form-control" placeholder="Mail Username" name="user_name" value="{{ $smtp->user_name }}">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Mail Password</label>
<input type="text" class="form-control" placeholder="Mail Password" name="password" value="{{ $smtp->password }}">
</div>


<div class="card-footer">
<button type="submit" class="btn btn-primary">Update</button>
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
