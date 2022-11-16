@extends('admin.layouts.header')
@section('content')
<div id="content-wrapper">

      <div class="container-fluid">
        <h4 style="margin-left:13px;"></h4>
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-10">
              <div class="card">
                <div class="card-header card-success">
                    All Quote Request
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone Number</th>
                           <th>Date</th>
                           <th>View</th>
                        </tr>
                        </thead>
                      <tbody>
                        <?php foreach(DB::table('fundingrequests')->orderBy('id')->get() as $r){ ?>
                        <tr>
                            <td>{{$r->name}}</td>
                            <td>{{$r->email}}</td>
                            <td>{{$r->phonenumber}}</td>
                            <td>{{$r->offerdate}}</td> 
                            <td class="text-center"> 
                              <a onclick="viewbigdeal({{ $r->id }})" href="{{ url('viewcontactrequests/') }}/{{ $r->id }}">
                               
                                <?php 
                              $status =  DB::table('fundingrequests')->where('id' , $r->id)->pluck('status')->first(); 
                               
                    
                                ?>
                                <button class="btn btn-@if($status == 0)primary @elseif($status == 1)success  @endif">View Offer</button>
                              </a>
                            </td>
                        </tr>
                        <?php }  ?>
                      </tbody>
                    </table>
                </div>
              </div>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

    </div>       
    <script type="text/javascript">
      function viewbigdeal(id)
      {
        $.ajax({
          type:'GET',
          url:"{{ url('changestatus') }}/"+id+"/fundingrequests",
          success: function(res)
          {
            $('#modalbody').html(res);
            $('#myModal').modal('show');
          }
         })
      }
    </script> 
    <!-- /.content-wrapper -->
    @endsection