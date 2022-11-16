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
                    All Policies
                 </div>
                 <div style="text-align: right;" class="col-md-6">
                    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add New Policie</button>
                 </div>
               </div>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered">
                  <thead>
                    <tr>
                       <th>Heading English</th>
                       <th>Heading Arabic</th> 
                       <th>Important</th> 
                       <th>Action</th>
                    </tr>
                    </thead>
                  <tbody>
                    <?php foreach(DB::table('privacypolicies')->get() as $r){ ?>
                    <tr>
                        <td>{{$r->heading_english}}</td>
                        <td>{{$r->heading_arabic}}</td>
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
        <h4 class="modal-title">Add New Policy</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="{{ url('insertpolicy') }}">
          {{ csrf_field() }}
            <div class="form-group">
              <label>Heading English</label>
              <input type="text" class="form-control" name="headingenglish">
            </div>
            <div class="form-group">
              <label>Heading Arabic</label>
              <input style="text-align: right;" type="text" class="form-control" name="headingarabic">
            </div>
            <div class="form-group">
              <label>Policy English</label>
              <textarea class="form-control" name="policyenglish"></textarea>
            </div>
            <div class="form-group">
              <label>Policy Arabic</label>
              <textarea style="text-align: right;" class="form-control" name="policyarabic"></textarea>
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