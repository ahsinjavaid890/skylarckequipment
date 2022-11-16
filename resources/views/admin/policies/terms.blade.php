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
               <div class="row">
                 <div class="col-md-6">
                    All Terms and Conditions
                 </div>
                 <div style="text-align: right;" class="col-md-6">
                    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add New Condition</button>
                 </div>
               </div>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered">
                  <thead>
                    <tr>
                       <th>Heading</th>
                       <th>Important</th> 
                       <th>Action</th>
                    </tr>
                    </thead>
                  <tbody>
                    <?php foreach(DB::table('termsandconditions')->get() as $r){ ?>
                    <tr>
                        <td>{{$r->heading}}</td>
                        <td>{{$r->important}}</td>
                        <td style="text-align: center;">
                          <a href="{{ url('editchildservice') }}/{{ $r->id }}">
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Condition</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="{{ url('insertterms') }}">
          {{ csrf_field() }}
            <div class="form-group">
              <label>Heading</label>
              <input type="text" class="form-control" name="heading">
            </div>
            <div class="form-group">
              <label>Policy</label>
              <textarea class="form-control" name="policy"></textarea>
            </div>
            <div class="form-group">
              <label>Important</label>
              <input type="checkbox" value="1"  name="important">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection