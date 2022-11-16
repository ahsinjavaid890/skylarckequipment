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
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="row">
      <div class="col-md-6">
          <div class="card"> 
              <div class="card-header card-success">
                  Add New Service
              </div>
              <div class="card-body">
                <form method="post" action="{{ url('createservice') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                  <div class="form-group">
                      <label>Chose Service Image</label>
                      <input class="form-control" type="file" style="height: 45px;" name="serviceimage">
                  </div>
                  <div class="form-group"> 
                     <label>Chose Banner Image</label>
                     <input type="file" style="height: 45px;" class="form-control" name="bannerimage"> 
                  </div>
                  <div class="form-group">
                      <label>Enter Service Name</label>
                      <input placeholder="Enter Service Name"  class="form-control" type="text" name="servicename">
                  </div>
                  <div class="form-group">
                      <label>Enter Service URL</label>
                      <input placeholder="Enter Service URL " class="form-control" type="text" name="serviceurl">
                  </div>
                  <div class="form-group">
                      <label>Enter Service Short Description</label>
                      <textarea class="form-control" name="serviceshortdescription"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Enter Service Description</label>
                      <textarea id="editor1" class="form-control" name="servicedescription"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add New Service" name="">
                  </div>
                    </form>
              </div>
          </div>
      </div>
  </div>
  </div>
</div>
@endsection