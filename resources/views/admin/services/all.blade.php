@extends('admin.layouts.header')
@section('content')
<div id="content-wrapper">
  <div class="container-fluid">
    <h4 style="margin-left:13px;"></h4>
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
          <div class="card">
            <div class="card-header card-success">
                All Services
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered">
                  <thead>
                    <tr>
                       <th>Service Image</th>
                       <th>Service Name</th> 
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach(DB::table('services')->get() as $r){ ?>
                    <tr>
                        <td> <div style="width: 200px;height: 200px;border: 1px solid #DDD"> <img style="width: 100%;height: 100%;" src="{{ url('public/images/') }}/{{$r->image}}"> </div></td>
                        <td>{{$r->servicename}}</td>
                        <td style="text-align: center;">
                          <a href="{{ url('editservices') }}/{{ $r->id }}">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                          </a>
                          <a onclick="return confirm('Are You Sure You want to Delete This')" href="{{ url('deleteeservice') }}/{{ $r->id }}">
                          <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
</div>
@endsection