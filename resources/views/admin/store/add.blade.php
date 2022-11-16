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
                  Add New Product
              </div>
              <div class="card-body">
                <form method="post" action="{{ url('createproduct') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"> 
                         <label>Chose Product Image</label>
                         <input type="file" style="height: 45px;" class="form-control" name="image"> 
                      </div>
                      <div class="form-group">
                          <label>Enter Product Name</label>
                          <input placeholder="Enter Service Name"  class="form-control" type="text" name="name">
                      </div>
                      <div class="form-group">
                          <label>Enter Product Short Description</label>
                          <textarea class="form-control" name="shortdescription"></textarea>
                      </div>
                      <div class="form-group">
                          <label>Enter Product Description</label>
                          <textarea id="editor1" class="form-control" name="description"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div  class="card">
                                    <div class="card-header">
                                        Select Categories
                                    </div>
                                    <div style="height: 400px; overflow: auto;" class="card-body">
                                       <?php foreach(DB::table('storecategories')->get() as $r){ ?>
                                            <div>
                                              <input value="{{ $r->id }}" type="checkbox" name="categories[]"> {{ $r->name }}
                                            </div>
                                       <?php  } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div  class="card">
                                    <div class="card-header">
                                        Select Tags
                                    </div>
                                    <div style="height: 400px; overflow: auto;" class="card-body">
                                       <?php foreach(DB::table('storetags')->get() as $r){ ?>
                                            <div>
                                              <input value="{{ $r->id }}" type="checkbox" name="tags[]"> {{ $r->name }}
                                            </div>
                                       <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add New Product" name="">
                  </div>
                    </form>
              </div>
          </div>
      </div>
  </div>
  </div>
</div>
@endsection