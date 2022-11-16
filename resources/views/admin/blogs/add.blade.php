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
      <div class="col-md-12">
          <div class="card"> 
              <div class="card-header card-success">
                  Add New Blog
              </div>
              <div class="card-body">
                <form method="post" action="{{ url('createblog') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Chosse Blog Image</label>
                                    <input class="form-control" type="file" style="height: 45px;" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Enter Blog Tittle</label>
                                    <input placeholder="Enter Blog Tittle"  class="form-control" type="text" name="tittle">
                                </div>
                                <div class="form-group">
                                    <label>Enter Blog Tittle</label>
                                    <textarea class="form-control" placeholder="Add Short Description" name="blogshortdescription"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Select Date</label>
                                    <input class="form-control" type="date" name="blogdate">
                                </div>
                                <div class="form-group">
                                    <label>Enter Blog</label>
                                    <textarea id="editor1" class="form-control" name="blog"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                         <label>Select Blog Tags</label>
                                          <div style="border: 1px solid #DDD; padding: 10px;height: 400px;overflow: auto;">
                                            <?php foreach(DB::table('blogtags')->get() as $r){ ?>
                                              <div style="padding: 8px;">
                                                <input multiple="" style="height: 15px;width: 15px;" value="{{ $r->name }}" type="checkbox" name="blogtags[]"> <span style="font-size: 18px;">{{ $r->name }}</span>
                                              </div>
                                            <?php } ?>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                         <label>Select Blog Category</label>
                                          <div style="border: 1px solid #DDD; padding: 10px;height: 400px;overflow: auto;">
                                            <?php foreach(DB::table('blogcategories')->get() as $r){ ?>
                                              <div style="padding: 8px;">
                                                <input style="height: 15px;width: 15px;" value="{{ $r->id }}" type="radio" name="blogcategory"> <span style="font-size: 18px;">{{ $r->name }}</span>
                                              </div>
                                            <?php } ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add New Blog" name="">
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
  </div>
</div>
@endsection