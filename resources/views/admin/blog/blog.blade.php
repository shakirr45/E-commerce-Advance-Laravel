@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Blogs</h1>
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
                <h3 class="card-title">All Blogs List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-sm">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Publish Date</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=>$row)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->slug }}</td>
                    <td>{{ $row->publish_date }}</td>
                    <td>{{ $row->description }}</td>
                    <td>
					<img src="{{ asset($row->thumbnail) }}" alt="{{ $row->title }}" height="80px" width="120px">


                    </td>
                    <td>{{ $row->tag }}</td>
                    <td>{{ $row->status }}</td>
                    <td>
                        <a href="" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="{{ $row->id }}"><i class="fas fa-edit"></i></a>

                        <a href="{{ route('blog.blog.delete',$row->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('blog.blog.store') }}" method="POST" enctype="multipart/form-data"> 
        @csrf

    <div class="modal-body">


    <div class="form-group">
    <label for="blog_category_name">Blog Category Name</label>

    <select class="form-control" name="blog_category_id" required="">

    @foreach($blog_category as $row)
        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
        @endforeach
    </select>
     </div>



  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" required="">
  </div>
      </div>


      <div class="modal-body">
  <div class="form-group">
    <label for="publish_date">Date</label>
    <input type="date" class="form-control" id="publish_date" name="publish_date" required="">
  </div>
      </div>


      <div class="modal-body">
  <div class="form-group">
    <label for="description">Description </label>
    <textarea class="form-control textarea" id="" name="description" rows="10" ></textarea>
  </div>
      </div>

      <div class="modal-body">
  <div class="form-group">
    <label for="tag">Tag </label>
    <input type="text" class="form-control" id="tag" name="tag" required="">
  </div>
      </div>


      <div class="modal-body">
  <div class="form-group">
  <label for="blog_name">Blog Thumbnail</label>
    <input type="file" class="" data-height="140" id="input-file-now" name="blog_logo" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your blog Logo</small>
  </div>
      </div>



      <div class="modal-body">
  <div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control" required="" id="status">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('blog.category.update') }}" method="POST" enctype="multipart/form-data"> 
        @csrf
    <div class="modal-body">

    <div class="form-group">
    <label for="blog_category_name">Blog Category Name</label>

    <select class="form-control" name="blog_category_id" required="" id="e_blog_category_id">

    @foreach($blog_category as $row)
        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
        @endforeach
    </select>
     </div>

  <div class="form-group">
    <label for="title">Blog Title</label>
    <input type="text" class="form-control" id="e_title" name="title" required="">

    <!-- //need that----> 
    <input type="hidden" class="form-control" id="e_blog_id" name="id">

    <small id="emailHelp" class="form-text text-muted">This is Your Main Blog Category</small>
  </div>




  <div class="form-group">
    <label for="publish_date">Date</label>
    <input type="date" class="form-control" id="e_publish_date" name="publish_date" required="">
  </div>


  <div class="form-group">
    <label for="description">Description </label>
    <textarea class="form-control textarea" id="e_description" name="description" rows="10" ></textarea>
  </div>

  <div class="form-group">
    <label for="tag">Tag </label>
    <input type="text" class="form-control" id="e_tag" name="tag" required="">
  </div>


  <div class="form-group ">
    <label for="blog_name">Blog Thumbnail</label>
    <input type="file" class="" data-height="140" id="input-file-now " name="blog_logo" required="">
    <small id="emailHelp" class="form-text text-muted">This is Your blog Logo</small>
  </div>

  <div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control" required="" id="e_status">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
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
    let blog_id = $(this).data('id');
    // alert(blog_id);

    $.get("blog/edit/" + blog_id, function(data){
      console.log(data);
      $('#e_title').val(data.title);
      $('#e_blog_category_id').val(data.blog_category_id);
      $('#e_publish_date').val(data.publish_date);
      $('#e_description').val(data.description);
      $('#e_tag').val(data.tag);
      $('#e_status').val(data.status);
      
      
    });
  });
  
</script>


    @endsection
    