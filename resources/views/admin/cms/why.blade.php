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
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header card-success">
                      Why Sarck Solution
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updatewhy') }}">
                       {{ csrf_field() }}
                      <div class="form-group">
                          <label>Enter Description</label>
                          <textarea id="editor1" required="" name="editor1"><?php echo DB::table('cms')->where('pagename', 'why')->first()->description; ?></textarea>
                      </div>
                      <div style="text-align: right;" class="form-group">
                          <input type="submit" class="btn btn-primary" value="Update" name="">
                      </div>
                    </form>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header card-success">
                      Update Meta Tags (English)
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updatemetatagsenglish') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" value="2" name="id">
                      <input type="hidden" value="cms" name="modalname">
                      <h3></h3>
                      <div class="form-group">
                          <label>Meta Tittle</label>
                          <input   class="form-control @error('mettatittle') is-invalid @enderror" value="<?php echo DB::table('cms')->where('id', 2)->first()->mettatittle; ?>" type="text" name="mettatittle" >
                      </div>
                      <div class="form-group">
                          <label>Meta Description</label>
                          <textarea class="form-control @error('metadescription') is-invalid @enderror" name="metadescription"><?php echo DB::table('cms')->where('id', 2)->first()->metadescription; ?></textarea>
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
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
    @endsection