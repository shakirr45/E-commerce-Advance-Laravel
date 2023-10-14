@extends('layouts.admin')

@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="row">

          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->

                <div class="card-body">


                <div class="row">
                    
                  <div class="form-group col">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group col">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>

                  </div>




                  <div class="row">
                    
                  <div class="form-group col">
                    <label>Disabled Result</label>
                    <select class="form-control select2">
                        <option selected="selected">1</option>
                        <!-- <option>1</option> -->
                    </select>
                    </div>
                    <div class="form-group col">
                    <label>Disabled Result</label>
                    <select class="form-control select2">
                        <option selected="selected">1</option>
                        <!-- <option>1</option> -->
                    </select>
                    </div>
  
                    </div>





                    <div class="row">
                    
                    <div class="form-group col">
                      <label>Disabled Result</label>
                      <select class="form-control select2">
                          <option selected="selected">1</option>
                          <!-- <option>1</option> -->
                      </select>
                      </div>
                  <div class="form-group col">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
    
                     </div>





                     <div class="row">
                    
                    <div class="form-group col">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group col">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group col">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
  
                    </div>




                    <div class="row">
                    
                    <div class="form-group col">
                      <label>Disabled Result</label>
                      <select class="form-control select2">
                          <option selected="selected">1</option>
                          <!-- <option>1</option> -->
                      </select>
                      </div>
                  <div class="form-group col">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
    
                     </div>


                     
                    <div class="row">
                    
                    <div class="form-group col-2">
                      <label>sfas Result</label>
                      <select class="form-control select2">
                          <option selected="selected">1</option>
                          <!-- <option>1</option> -->
                      </select>
                      </div>
                  <div class="form-group col-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
    
                     </div>


                     


                    <!-- // Use summer note ita come from head tag and scripthen into class add id as summernote its come from script  -->
                    <div class="form-group">
                    <label for="exampleInputPassword1">Page Description</label>
                    <textarea name=""  class="form-control textarea" id="summernote" name="page_description" rows="10"></textarea>
                    <small>This Data will Show on your Wbsite</small>
                    </div>




                  <div class="form-group col">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->


            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-4">
            <!-- Form Element sizes -->
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Different Height</h3>
              </div>
              <div class="card-body">
              <label class="form-label" for="customFile">Default file input example</label>
                <input type="file" class="form-control" id="customFile" />
              </div>
              <!-- /.card-body -->

              <!-- <div class="card-header">
                    <h3 class="card-title">Bootstrap sfas</h3>
                </div>
                <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                </div> -->
              
            </div>

            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Different Height</h3>
              </div>
              <div class="card-body">
              <label class="form-label" for="customFile">Default file input example</label>
                <input type="file" class="form-control" id="customFile" />
              </div>



            <!-- // Bootstrap btn use with tag and script code also -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Bootstrap Switch</h3>
                </div>
                <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                </div>


                <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Bootstrap Switch</h3>
                </div>
                <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                </div>


                <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Bootstrap Switch</h3>
                </div>
                <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                </div>





            <!-- /.card -->
            </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        </form>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>











@endsection