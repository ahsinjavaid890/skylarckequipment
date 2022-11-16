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
          <div class="col-md-4">
              <div id="accordion3">
                <div style="margin-bottom: 20px;" class="card">
                  <div id="changeicon" style="cursor: pointer;" data-toggle="collapse" href="#collapsethree" class="card-header">
                        <div class="row">
                          <div class="col-md-8">
                              <h5>Contact Details</h5>
                          </div>
                          <div class="col-md-4 text-right">
                              <h5 id="iconchanged" class="fa fa-plus"></h5>
                          </div>
                      </div>
                  </div>
                  <div id="collapsethree" class="collapse" data-parent="#accordion3">
                    <div class="card-body">
                        <form method="POST" action="{{ url('updatecontactdetails') }}">
                          {{ csrf_field() }}
                              <div class="form-group">
                                  <input type="text" class="form-control" name="phonenumber" value="{{ $data->phoneno }}">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" name="whatsappnumber" value="{{ $data->whatsappnumber }}">
                              </div>
                              
                              <div class="form-group">
                                <textarea rows="5" class="form-control" name="address">{{ $data->address }}</textarea>
                              </div>
                            <button id="bigdealsbutton" type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
              <div id="accordion4">
                <div style="margin-bottom: 20px;" class="card">
                  <div id="changeicon" style="cursor: pointer;" data-toggle="collapse" href="#collapsefour" class="card-header">
                        <div class="row">
                          <div class="col-md-8">
                              <h5>Social Media Links</h5>
                          </div>
                          <div class="col-md-4 text-right">
                              <h5 id="iconchanged" class="fa fa-plus"></h5>
                          </div>
                      </div>
                  </div>
                  <div id="collapsefour" class="collapse" data-parent="#accordion4">
                    <div class="card-body">
                        <form method="POST" action="{{ url('updatesocialmedialinks') }}">
                          {{ csrf_field() }}
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Enter Facebook Link" name="facebook" value="{{ $data->facebook }}">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Enter twitter Link" name="twitter" value="{{ $data->twitter }}">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Enter instagram Link" name="instagram" value="{{ $data->instagram }}">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Enter linkdlin Link" name="linkdlin" value="{{ $data->linkdlin }}">
                              </div>
                            <button id="bigdealsbutton" type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
              <div id="accordion5">
                <div style="margin-bottom: 20px;" class="card">
                  <div id="changeicon" style="cursor: pointer;" data-toggle="collapse" href="#collapsefive" class="card-header">
                        <div class="row">
                          <div class="col-md-8">
                              <h5>Footer Text</h5>
                          </div>
                          <div class="col-md-4 text-right">
                              <h5 id="iconchanged" class="fa fa-plus"></h5>
                          </div>
                      </div>
                  </div>
                  <div id="collapsefive" class="collapse" data-parent="#accordion5">
                    <div class="card-body">
                        <form method="POST" action="{{ url('updatefootertext') }}">
                          {{ csrf_field() }}
                              <div class="form-group">
                                  <textarea class="form-control" rows="5" name="english">{{ $data->footertextenglish }}</textarea>
                              </div>
                            <button id="bigdealsbutton" type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>             
          </div>
          <div class="col-md-8">
              <iframe src="{{ url('') }}" style="width: 100%; height: 800px;"  title="Iframe Example"></iframe>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

    </div>
    @endsection