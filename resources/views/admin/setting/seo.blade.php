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
              <li class="breadcrumb-item active">OnPage SEO</li>
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
<h3 class="card-title">Your SEO Setting</h3>
</div>

<!-- ///// Change password form =======> -->

<form action="{{ route('seo.setting.update') }}" method="POST">

@csrf

<!-- //ID PASS------>
<input type="hidden" name="id" value="{{ $data->id }}">

<div class="card-body">

<div class="form-group">
<label for="exampleInputEmail1">Meta Title</label>
<input type="text" class="form-control" placeholder="Meta Title" name="meta_title" value="{{ $data->meta_title }}">
</div>


<div class="form-group">
<label for="exampleInputEmail1">Meta Author</label>
<input type="text" class="form-control" placeholder="Meta Title" name="meta_author" value="{{ $data->meta_author }}">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Meta Tag</label>
<input type="text" class="form-control" placeholder="Meta Tag" name="meta_tag" value="{{ $data->meta_tag }}">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Meta Keyword</label>
<input type="text" class="form-control" placeholder="Meta Keyword" name="meta_keyword" value="{{ $data->meta_keyword }}">
<small>Example:ecommerce,online shop,online market</small>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Meta Description</label>
<textarea name="meta_description" class="form-control"  id="" cols="30" rows="5">{{ $data->meta_description }}</textarea>
</div>


<strong class="text-center text-success"> -- Other Option -- </strong>
<br>
<br>



<div class="form-group">
<label for="exampleInputEmail1">Google Verification</label>
<input type="text" class="form-control" placeholder="Google Verification" name="goolge_verification" value="{{ $data->goolge_verification }}">
<small>Put here only Verification Code</small>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Alexa Verification</label>
<input type="text" class="form-control" placeholder="Alexa Verification" name="alexa_verification" value="{{ $data->alexa_verification }}">
<small>Put here only Verification Code</small>
</div>


<div class="form-group">
<label for="exampleInputEmail1">Google Analytics</label>
<input type="text" class="form-control" placeholder="Google Analytics" name="google_analytics" value="{{ $data->google_analytics }}">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Google Adsense</label>
<textarea name="google_adsense" class="form-control"  id="" cols="30" rows="5">{{ $data->google_adsense }}</textarea>
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
