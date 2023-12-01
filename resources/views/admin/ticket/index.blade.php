@extends('layouts.admin')

@section('admin_content')

<!-- // for dropify ===========> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ticket List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">

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
                <h3 class="card-title">All Tickets List </h3>
              </div><br>
              <!-- /.card-header -->


              <div class="row p-2">

                    <div class="form-group col-3">
                      <label>Ticket Type</label>
                      <select class="form-control submitable" name="type" id="type">
                        <option value="">All</option>
                        <option value="Technical">Technical</option>
                        <option value="Payment">Payment</option>
                        <option value="Affiliate">Affiliate</option>
                        <option value="Return">Return</option>
                        <option value="Refund">Refund</option>

                      </select>
                    </div>
                    


                    <div class="form-group col-3">
                      <label>Status</label>
                      <select class="form-control submitable" name="status" id="status">
                        <!-- // all er ta 1 kora lgbe then select kore dkhte hobe -->
                        <option value="0">Panding</option>
                        <option value="1">Replied</option>
                        <option value="2">Closed</option>


                      </select>
                    </div>

                    <div class="form-group col-3">
                      <label>Date</label>
                      <input type="date"  name="date" id="date" class="form-control submitable_input">
                    </div>


  
                    </div>

              <div class="card-body ">

              <!-- // for yajra ytable = remove==> id example1 j tablestate datab tables banabo-->
                <table id="" class="table table-bordered table-sm ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>User</th>
                    <th>Subject</th>
                    <th>Service</th>
                    <th>Priority</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <!--  //for yajra ====> --remove foreach and btn> -->
                  	
                   
                
                 </tbody>
                </table>
              </div>
             </div>
            </div>
        </div>
    </div>
</section>

 </div>
 

<!-- /// ================================= productew kora ace  -->

 <!-- For yajra datatables -------=============================------------- -->
<!-- Ajax use for edit product  -->
<!-- //ajax cdn-----> 
 <!-- For yajra datatables -------=============================------------- -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>

 $(function tickets(){
    // ei table take data table banalam
    var table = $('.ytable').DataTable({
        // processing:true,
        // serverSide:true,
        // niche kicu change kora hoice search korar jonne r ytable er code ace ekhne r fresh code search cara brand er vetor ace-->
        // ajax:"{{ route('ticket.index') }}",

        

        //For search--->ajax load niche ace
        "processing":true,
        "serverSide":true,
        "searching":true,
        "ajax":{
          "url": "{{ route('ticket.index') }}",
          "data":function(e) {
            e.type =$("#type").val();
            e.status =$("#status").val();
            e.date =$("#date").val();
          }
        },

        columns:[
            {data:'DT_RowIndex' ,name:'DT_RowIndex'},

            {data:'name' ,name:'name'},
            {data:'subject' ,name:'subject'},
            {data:'service' ,name:'service'},
            {data:'priority' ,name:'priority'},
            {data:'date' ,name:'date'},
            {data:'status' ,name:'status'},
            
            {data:'action', name:'action', orderable:true, searchable:true},

        ]
    });

 });

 
</script>



<!-- button e click er por reload cara value 1 theke 0 korahoace -->
<script>

  // submitable class call for every change and loading=======>
  $(document).on('change','.submitable', function(){
    $('.ytable').DataTable().ajax.reload();
  })

    // submitable class call for every change and loading=======>
    $(document).on('change','.submitable_input', function(){
    $('.ytable').DataTable().ajax.reload();
  })


</script>

    @endsection

