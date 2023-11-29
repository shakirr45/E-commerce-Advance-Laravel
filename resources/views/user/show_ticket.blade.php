@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-4">
       @include('user.sidebar')
    </div>


        <div class="col-md-8">

            <div class="card p-4">
                <div class="row">
                <h3 class="ml-4">Your Ticket Details</h3>
                <div class="col-md-9">
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
            
            <div class="card p-4">
                <strong>All Reply Message</strong>

                <div class="card-body" style="overflow-y: scroll; height: 450px;">
                
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
                        <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                    </div>

  

                </div>

            </div><br>

            

            <div class="card mt-2">

                <div class="card-body">
                    <strong>Reply Message.</strong><br>
                    <div>
    
                    <form action="{{ route('reply.ticket') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputPassword1">Message</label>3
                            <textarea name="message" class="form-control"></textarea>
                              <!-- // for id  -->
                             <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div><br>

                        <button type="submit" class="btn btn-primary">Submit Ticket</button>
                        </form>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
