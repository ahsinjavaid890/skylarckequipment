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
          <div class="col-md-1">
            
          </div>
          <div class="col-md-10">
              <div class="card">
                <div class="card-header card-success">
                    <div class="row">
                      <div class="col-md-6">
                          All Blog Tags
                      </div>
                      <div style="text-align: right;" class="col-md-6">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#addcategory">Add Blog Tag</button>
                      </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Tag Name</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach(DB::table('blogtags')->get() as $r){ ?>
                        <tr>
                            <td>{{$r->name}}</td>
                            <td style="text-align: center;">
                              <button onclick="editblogtag({{ $r->id }})" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
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

    <div class="modal fade" id="addcategory">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Blog Tag</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <form method="POST" action="{{ url('createblogtags') }}">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label>Tag Name</label>
                  <input type="text" class="form-control" name="categoryname">
                </div>
                <div class="form-group">
                  <input type="submit"  class="btn btn-primary">
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Blog Tag</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-success">
                        Update Category Name
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('updateblogtags') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="urlid">
                          <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" id="categoryiesname" name="name">
                          </div>
                          <div class="form-group">
                            <input type="submit" value="Update Category" class="btn btn-primary">
                          </div>
                        </form>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header card-success">
                          Update Meta Tags
                      </div>
                      <div class="card-body">
                        <form method="post" action="{{ url('updatemetatagsenglish') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" id="metatittleid" name="id">
                          <input type="hidden" value="blogtags" name="modalname">
                          <h3></h3>
                          <div class="form-group">
                              <label>Meta Tittle</label>
                              <input  required=""  class="form-control" id="tittle" type="text" name="mettatittle" >
                          </div>
                          <div class="form-group">
                              <label>Meta Description</label>
                              <textarea id="meta_description_english" class="form-control" name="metadescription"></textarea>
                          </div>
                          <div class="form-group">
                              <label>Meta Keywords</label>
                              <textarea id="meta_keywords" class="form-control" name="mettakeywords"></textarea>
                          </div>
                          <div class="form-group">
                              <label>Meta Image</label>
                              <input    class="form-control" type="file" style="height: 45px;" name="image" >
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
    <script type="text/javascript">
      function editblogtag(id)
      {
        $.ajax({
          type:'GET',
          url:"{{ url('getblogtags') }}/"+id,
          datatype:'json',
          success: function(res)
          {
            $("#categoryiesname").val(res.name);
            $("#tittle").val(res.mettatittle);
            $("#meta_description_english").val(res.metadescription);
            $("#meta_keywords").val(res.metakeywords);
            $("#metatittleid").val(res.metaid);
            $("#urlid").val(res.id);
            $('#myModal').modal('show');
          }
         })
      }
    </script>
        
    <!-- /.content-wrapper -->
    @endsection