@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Add New Product</h3>
              </div>
              <!-- /.card-header -->

                <div class="card-body">


                <div class="row">
                    
                  <div class="form-group col">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group col">
                    <label for="exampleInputEmail1">Product Code</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" >
                  </div>


                  </div>




                  <div class="row">
                    
                  <div class="form-group col">
                    <label>Category/Subcategory</label>
                    <select class="form-control select2">
                        <option selected="selected">1</option>
                        <!-- <option>1</option> -->
                    </select>
                    </div>
                    <div class="form-group col">
                    <label>Child Category</label>
                    <select class="form-control select2">
                        <option selected="selected">1</option>
                        <!-- <option>1</option> -->
                    </select>
                    </div>
  
                    </div>





                    <div class="row">
                    
                    <div class="form-group col">
                      <label> Brand</label>
                      <select class="form-control select2">
                          <option selected="selected">1</option>
                          <!-- <option>1</option> -->
                      </select>
                      </div>
                      <div class="form-group col">
                      <label> Child Category</label>
                      <select class="form-control select2">
                          <option selected="selected">1</option>
                          <!-- <option>1</option> -->
                      </select>
                      </div>

    
                     </div>


                     
                    <div class="row">
                    
                    <div class="form-group col">
                      <label> Units</label>
                      <select class="form-control select2">
                          <option selected="selected">1</option>
                          <!-- <option>1</option> -->
                      </select>
                      </div>
                      <div class="form-group col">
                    <label for="exampleInputEmail1"> Tags</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" >
                  </div>

    
                     </div>





                     <div class="row">
                    
                    <div class="form-group col">
                      <label for="exampleInputEmail1">Purchase Price</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" >
                    </div>
                    <div class="form-group col">
                      <label for="exampleInputPassword1">Selling Price</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group col">
                      <label for="exampleInputPassword1">Discount Price</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" >
                    </div>
  
                    </div>




                    <div class="row">
                    
                    <div class="form-group col">
                      <label> Warehouse</label>
                      <select class="form-control select2">
                          <option selected="selected">1</option>
                          <!-- <option>1</option> -->
                      </select>
                      </div>
                  <div class="form-group col">
                    <label for="exampleInputPassword1">Stock</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" >
                  </div>
    
                     </div>


                     
                    <div class="row">

                      <div class="form-group col-2">
                    <label for="exampleInputPassword1">Color</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" >
                  </div>
                  <div class="form-group col-2">
                    <label for="exampleInputPassword1">Size</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" >
                  </div>
    
                     </div>


                     


                    <!-- // Use summer note ita come from head tag and scripthen into class add id as summernote its come from script  -->
                    <div class="form-group">
                    <label for="exampleInputPassword1">Page Description</label>
                    <textarea name=""  class="form-control textarea" id="summernote" name="page_description" rows="10"></textarea>
                    <small>This Data will Show on your Wbsite</small>
                    </div>


                    <div class="form-group ">
                    <label for="exampleInputPassword1">Video Embed Code</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" >
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
                <h3 class="card-title">Main Thumbnail</h3>
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
                <h3 class="card-title">More Image</h3>
              </div>
              <div class="card-body">
              <label class="form-label" for="customFile">Default file input example</label>
                <input type="file" class="form-control" id="customFile" />
              </div>



            <!-- // Bootstrap btn use with tag and script code also -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Features Product</h3>
                </div>
                <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                </div>


                <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Today Deal</h3>
                </div>
                <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                </div>


                <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"> Status</h3>
                </div>
                <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                </div>


                <!-- // for add more image -->
                <div class="">
                  <table class="table table-bordered" id="dynamic_field">
                    <div class="card-header">
                      <h3 class="card-title">More Image (Click Add For More Image)</h3>
                    </div>
                    <tr>
                      <td><input type="file" accept="image/*" name="images[]" class="form-control name_list" ></td>
                      <td><button type="button" name="add" id="add" class="btn btn-success">ADD</button></td>
                    </tr>
                  </table>
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



  <!-- // for add more img -->
  <script>
    $(document).ready(function(){
      var postURL = "<?php echo url('addmore'); ?>";
      var i = 1;

      // For Add new img field ===>
      $('#add').click(function(){
      i++;
      $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" accept="image/*" name="images[]" placeholder="Enter Your Name" class="form-control name_list"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');
    })

    // For remove image field ====>
    $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    })

    })
   
  </script>
@endsection
