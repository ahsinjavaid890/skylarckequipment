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
          <div class="col-md-5">
              <div class="card">
                  <div class="card-header card-success">
                      Our Vision
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updatehomepage') }}">
                       {{ csrf_field() }}
                      <div class="form-group">
                          <label>Enter in English</label>
                          <textarea required="" id="editor1" name="editor1"><?php echo DB::table('sitesettings')->where('id', 1)->first()->ourvisionenglish; ?></textarea>
                      </div>
                      <div style="text-align: right;" class="form-group">
                          <input type="submit" class="btn btn-primary" value="Update" name="">
                      </div>
                    </form>
                  </div>
              </div>
              <br>
              <div class="card">
                  <div class="card-header card-success">
                      Our Services Short Description
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('updateservicesshortdescription') }}">
                       {{ csrf_field() }}
                      <div class="form-group">
                          <label>Enter in English</label>
                          <textarea rows="5" required="" class="form-control" name="englishservicesshortdescription"><?php echo DB::table('sitesettings')->where('id', 1)->first()->englishservicesshortdescription; ?></textarea>
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
                      <div class="row">
                          <div class="col-md-6">
                            Our Technologies
                          </div>
                          <div style="text-align: right;" class="col-md-6">
                                <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Add New Technology</button>                                
                          </div>
                      </div>
                      
                  </div>
                  <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                          <tr>
                             <th>Image</th>
                             <th>Name</th>
                             <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach(DB::table('technologies')->get() as $r){ ?>
                          <tr>
                              <td> <div style="width: 80px;height: 80px;border: 1px solid #DDD"> <img style="width: 100%;height: 100%;" src="{{ url('public/images/') }}/{{$r->image}}"> </div></td>
                              <td>{{$r->technologyname}}</td>
                              <td style="text-align: center;"><button onclick="edittechnology({{ $r->id }})"  class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                          </tr>
                          <?php }  ?>
                        </tbody>
                      </table>
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
                      <input type="hidden" value="1" name="id">
                      <input type="hidden" value="cms" name="modalname">
                      <h3></h3>
                      <div class="form-group">
                          <label>Meta Tittle</label>
                          <input  required=""  class="form-control" value="<?php echo DB::table('cms')->where('id', 1)->first()->mettatittle; ?>" type="text" name="mettatittle" >
                      </div>
                      <div class="form-group">
                          <label>Meta Description</label>
                          <textarea class="form-control" name="metadescription"><?php echo DB::table('cms')->where('id', 1)->first()->metadescription; ?></textarea>
                      </div>
                      <div class="form-group">
                          <label>Meta Keywords</label>
                          <textarea class="form-control @error('mettakeywords') is-invalid @enderror" name="mettakeywords"><?php echo DB::table('cms')->where('id', 1)->first()->keywords; ?></textarea>
                      </div>
                      <div class="form-group">
                          <label>Meta Image</label>
                          <input   class="form-control" type="file" style="height: 45px;" name="image" >
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


    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add New Technology</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <form method="post" action="{{ url('addnewtechnology') }}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <div class="form-group">
                    <label>Enter Name</label>
                    <input required="" type="text" class="form-control" name="technologyname">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input required="" type="file" style="height: 45px;" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="technologydescription" name="technologydescription"></textarea>
                </div>
                <div style="text-align: right;" class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" name="">
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="edittechnology">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Technology</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                      <div class="card-header card-success">
                          Update Technology
                      </div>
                      <div class="card-body">
                          <form method="POST" action="{{ url('updatetechnology') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <input type="hidden" name="id" id="id">
                            <div class="form-group">
                              <label>Image</label>
                              <input required="" type="file" style="height: 45px;" class="form-control" name="technologyimage">
                            </div>
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" id="nameenglish" name="technologyname">
                            </div>
                            <div class="form-group">
                              <label>Description</label>
                              <textarea id="technologydescriptionedit" name="description"></textarea> 
                            </div>
                            <div class="form-group">
                              <input type="submit" class="btn btn-primary">
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
                            <input type="hidden" id="metatittleid" name="id">
                            <input type="hidden" value="technologies" name="modalname">
                            <h3></h3>
                            <div class="form-group">
                                <label>Meta Tittle</label>
                                <input  required=""  class="form-control" id="metatittle" type="text" name="mettatittle" >
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea id="metadescription" class="form-control" name="metadescription"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Image</label>
                                <input class="form-control" type="file" style="height: 45px;" name="image" >
                            </div>
                            <input type="submit" value="Update Meta Tags" class="btn btn-primary" name="">
                          </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
          $(document).ready(function() {
           $("#technologydescription").summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['insert', ['link','picture', 'video', 'hr']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview']]
                ],
                 height:300,
                 fontsize:'18px'
            });
           $("#technologydescriptionedit").summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['insert', ['link','picture', 'video', 'hr']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview']]
                ],
                 height:300,
                 fontsize:'18px'
            });
          });
      </script>
      <script type="text/javascript">
          function edittechnology(id)
          {
            $.ajax({
              type:'GET',
              url:"{{ url('edittechnology') }}/"+id,
              datatype:'json',
              success: function(res)
              {
                $("#nameenglish").val(res.name);
                $('#technologydescriptionedit').summernote('code', res.description);
                $("#id").val(res.technologyid);
                $("#metatittleid").val(res.metatittleid);
                $("#metatittle").val(res.metatittle);
                $("#metadescription").val(res.metadescription);

                $('#edittechnology').modal('show');
              }
             })
          }
        </script>
@endsection