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
                      Edit Service
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updateservice') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="form-group">
                            <label>Enter Service Name</label>
                            <input placeholder="Enter Service Name" value="{{ $data->servicename }}" class="form-control" type="text" name="servicename">
                        </div>
                        <div class="form-group">
                            <label>Enter Service URL</label>
                            <input placeholder="Enter Service URL " value="{{ $data->serviceurl }}" class="form-control" type="text" name="serviceurl">
                        </div>
                        <div class="form-group">
                            <label>Enter Service Short Description</label>
                            <textarea class="form-control" name="serviceshortdescription">{{ $data->serviceshortdescription }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Enter Service Description</label>
                            <textarea id="editor1" class="form-control" name="servicedescription">{{ $data->servicedescription }}</textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Update Service" name="">
                        </div>
                      </form>
                  </div>
              </div>
          </div> 
          <div class="col-md-3">
              <div class="card">
                  <div class="card-header card-success">
                      Update Service Image
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updateserviceimage') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group">
                          <label>Chose Service Image</label>
                          <input  required=""  class="form-control" type="file" style="height: 45px;" name="image">
                      </div>
                      <input type="submit" value="Update Image" class="btn btn-primary" name="">
                    </form>
                  </div>
              </div>
              <br>
              <div class="card">
                  <div class="card-header card-success">
                      Update Banner Image
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updatebannerimage') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group"> 
                         <label>Chose Banner Image</label>
                         <input type="file" style="height: 45px;" class="form-control" name="bannerimage"> 
                      </div>
                      <input type="submit" value="Update Image" class="btn btn-primary" name="">
                    </form>
                  </div>
              </div>
          </div>
              
          <div class="col-md-3">
              <div class="card">
                  <div class="card-header card-success">
                      Update Meta Tags
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updatemetatagsenglish') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" value="{{ $data->id }}" name="id">
                      <input type="hidden" value="services" name="modalname">
                      <h3></h3>
                      <div class="form-group">
                          <label>Meta Tittle</label>
                          <input  class="form-control @error('mettatittle') is-invalid @enderror" value="{{ $data->mettatittle }}" value="{{ old('mettatittle') }}" type="text" name="mettatittle" >
                      </div>
                      <div class="form-group">
                          <label>Meta Description</label>
                          <textarea class="form-control @error('metadescription') is-invalid @enderror" name="metadescription">{{ $data->metadescription }}</textarea>
                      </div>
                      <div class="form-group">
                          <label>Meta Keywords</label>
                          <textarea class="form-control @error('mettakeywords') is-invalid @enderror" name="mettakeywords">{{ $data->keywords }}</textarea>
                      </div>
                      <div class="form-group">
                          <label>Meta Image</label>
                          <input    class="form-control @error('image') is-invalid @enderror" type="file" style="height: 45px;" name="image" >
                      </div>
                      <input type="submit" value="Update Meta Tags" class="btn btn-primary" name="">
                    </form>
                  </div>
              </div>
              <br>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
    @endsection