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
                    All Users
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Country</th>
                           <th>State</th>
                           <th>City</th>
                           <th>Message</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach(DB::table('chatleavemessages')->get() as $r){ ?>
                        <tr>
                            <td>{{$r->chatname}}</td>
                            <td>{{$r->chatemail}}</td>
                            <td>{{$r->country}}</td>
                            <td>{{$r->state}}</td>
                            <td>{{$r->city}}</td>
                            <td>{{$r->chatmessagemessage}}</td>
                            <td style="text-align: center;">
                              <button onclick="editfaq({{ $r->id }})" class="btn btn-sm btn-primary">Reply</button>
                              <!-- <a id="test" href="{{url('deletetestimonial')}}/{{$r->id}}">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                              </a> -->
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
@endsection