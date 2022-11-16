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
      <div class="col-md-9">
          <div class="card"> 
              <div class="card-header card-success">
                  {{ $data->tittle }}
              </div>
              <div class="card-body">
                <form method="post" action="{{ url('updateblog') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter Blog Tittle</label>
                                    <input placeholder="Enter Blog Tittle" value="{{ $data->tittle }}" class="form-control" type="text" name="tittle">
                                </div>
                                <div class="form-group">
                                    <label>Enter Blog Tittle</label>
                                    <textarea class="form-control" placeholder="Add Short Description" name="blogshortdescription">{{ $data->blogshortdescription }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Select Date</label>
                                    <input class="form-control" type="date" value="{{ $data->blogdate }}" name="blogdate">
                                </div>
                                <div class="form-group">
                                    <label>Enter Blog</label>
                                    <textarea id="editor1" class="form-control" name="blog">{{ $data->description }}</textarea>
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
                                                <input  style="height: 15px;width: 15px;" value="{{ $r->id }}" type="radio" name="blogcategory" @if($r->id == $data->blogcategoryid)checked="" @endif> <span style="font-size: 18px;">{{ $r->name }}</span>
                                              </div>
                                            <?php } ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update Blog" name="">
                  </div>
                </form>
              </div>
          </div>
      </div>
      <div class="col-md-3">
        <div class="card">
            <div class="card-header card-success">
                Update Image
            </div>
            <div class="card-body">
              <form method="post" action="{{ url('updateblogimage') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="form-group">
                    <label>Chose  Image</label>
                    <input  required=""  class="form-control" type="file" style="height: 45px;" name="image">
                </div>
                <input type="submit" value="Update Image" class="btn btn-primary" name="">
              </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header card-success">
                Update Meta Tags
            </div>
            <div class="card-body">
              <form method="post" action="{{ url('updatemetatagsenglish') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $data->id }}" name="id">
                <input type="hidden" value="blogs" name="modalname">
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
      </div>
  </div>
  </div>
</div>
@endsection