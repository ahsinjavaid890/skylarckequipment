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
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header card-success">
                      Update Testimonial
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updatetestimonial') }}">
                       {{ csrf_field() }}
                       <input type="hidden" value="{{$data->id}}" name="id">
                      <div class="form-group">
                          <label>Update Client Name</label>
                          <input required="" class="form-control" type="text" value="{{$data->name}}" name="name">
                      </div>
                      <div class="form-group">
                          <label>Update Client Designation</label>
                          <input required="" class="form-control" value="{{$data->designation}}" type="text" name="designation">
                      </div>
                      <div class="form-group">
                          <label>Update Testimonial</label>
                          <textarea required="" class="form-control" rows="8" name="testimonial">{{$data->testimonial}}</textarea>
                      </div>
                      <div style="text-align: right;" class="form-group">
                          <input type="submit" class="btn btn-primary" value="Update Testimonial" name="">
                      </div>
                    </form>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header card-success">
                      Update Testimonial Image
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updatetestimonialimage') }}" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <input type="hidden" value="{{$data->id}}" name="id">
                      <div class="form-group">
                          <label>Change Image</label>
                          <input required="" class="form-control" type="file" style="height: 45px;" name="image">
                      </div>
                      <div style="text-align: right;" class="form-group">
                          <input type="submit" class="btn btn-primary" value="Update Testimonial Image" name="">
                      </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
    @endsection