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
              <li class="breadcrumb-item  ssss"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ticket Reply</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
        <div class="card p-2">
                <div class="row">
                <div class="col-md-9">
                    <strong>User: {{ $ticket->name }}</strong><br>
                    <strong>Subject: {{ $ticket->subject }}</strong><br>
                    <strong>Service: {{ $ticket->service }}</strong><br>
                    <strong>Priority: {{ $ticket->priority }}</strong><br>
                    <strong>Message: {{ $ticket->message }}</strong><br>
                </div>
                <div class="col-md-3">
                  <a href="{{ asset($ticket->image) }}" target="_blank"> <img src="{{ asset($ticket->image) }}" alt="" style=" height:80px; width:120px;"></a> 
                </div>

                </div>



            </div><br>
        </div>
    </div>

 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="{{ route('admin.store.reply') }}" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="row">

          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reply Ticket Message</h3>
              </div>
  
                <div class="card-body">


                <div class="row">
                    
                  <div class="form-group col-lg-12">
                    <label for="exampleInputEmail1">Message</label>
                    <textarea type="text" class="form-control" name="message"  required="" ></textarea>

                    <!-- // for id  -->
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                  </div>
                  <div class="form-group col-lg-12">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control"  name="image">
                  </div>

                  </div>

                <button type="submit" class="btn btn-info">Reply Message</button>

                  
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
        
          </div>
        </form>
          
          <div class="col-md-6 bg-light">
                    <div class="card-header bg-dark mr-8">All Replies</div>
                     <div class="card-body" style="overflow-y: scroll; height:700px;">
                
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-user"></i>  {{ Auth::user()->name }}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                    </div>

                    <div class="card ml-4">
                    <div class="card-header">
                     <span  style="float:right;"><i class="fa fa-user"></i>  Admin</span> 
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                    </div>

  

                </div>
                </div>
          <!--/.col (left) -->


            <!-- /.card -->
            </div>

            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          
        </div>
        
        

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection
