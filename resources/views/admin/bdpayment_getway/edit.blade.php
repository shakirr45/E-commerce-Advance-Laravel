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
              <li class="breadcrumb-item active">Payment Getway Setting</li>
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

        <!-- For first  -->
        <div class="col-4">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Aamarpay Payment Getway</h3>
            </div>

            <form action="" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $aamarpay->id }}">
            <div class="card-body">

            <div class="form-group">
            <label for="exampleInputEmail1">StoreID</label>
            <input type="text" class="form-control" name="store_id" value="{{ $aamarpay->store_id }}" required="">
            </div>

            <div class="form-group">
            <label for="exampleInputEmail1">Signature KEY</label>
            <input type="text" class="form-control" name="signature_key" value="{{ $aamarpay->signature_key }}" required="">
            </div>

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
                
            </div>
        </form>


        </div>
        </div>

        <!-- For second  -->
        <div class="col-4">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">SurjaPay Payment Getway</h3>
            </div>

            <form action="" method="POST">
            @csrf

            <div class="card-body">

            <div class="form-group">
            <label for="exampleInputEmail1">StoreID</label>
            <input type="text" class="form-control" name="store_id" value="{{ $surjapay->store_id }}" required="">
            </div>

            <div class="form-group">
            <label for="exampleInputEmail1">Signature KEY</label>
            <input type="text" class="form-control" name="signature_key" value="{{ $surjapay->signature_key }}" required="">
            </div>

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
                
            </div>
        </form>


        </div>
        </div>

        <!-- for thind  -->
        <div class="col-4">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">SSL Commerz Payment Getway</h3>
            </div>

            <form action="" method="POST">
            @csrf

            <div class="card-body">

            <div class="form-group">
            <label for="exampleInputEmail1">StoreID</label>
            <input type="text" class="form-control" name="store_id" value="{{ $ssl->store_id }}" required="">
            </div>

            <div class="form-group">
            <label for="exampleInputEmail1">Signature KEY</label>
            <input type="text" class="form-control" name="signature_key" value="{{ $ssl->signature_key }}" required="">
            </div>

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
                
            </div>
        </form>


        </div>
        </div>






        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
