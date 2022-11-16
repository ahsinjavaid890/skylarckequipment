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
                    All Countries
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Name</th>
                           <th>Arabic Name</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach(DB::table('country')->get() as $r){ ?>
                        <tr>
                            <td>{{$r->name}}</td>
                            <td>{{$r->arabicname}}</td>
                            <td style="text-align: center;">
                              <button onclick="editcountryfunction({{ $r->id }})" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
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
      <!-- /.container-fluid -->

    </div>


    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">View User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <form method="POST" action="{{ url('updatecountry') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" id="countryid">
                <div class="form-group">
                  <label>English Name</label>
                  <input type="text" class="form-control" id="nameenglish" name="english">
                </div>
                <div style="text-align: right;" class="form-group">
                  <label >الاسم العربي</label>
                  <input style="text-align: right;" type="text" placeholder="أدخل بالعربية" class="form-control" id="namearabic" name="arabic">
                </div>
                <div style="text-align: right;" class="form-group">
                  <input type="submit" class="btn btn-primary">
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function editcountryfunction(id)
      {
        $.ajax({
          type:'GET',
          url:"{{ url('editcountry') }}/"+id,
          datatype:'json',
          success: function(res)
          {
            $("#nameenglish").val(res.englishname);
            $("#namearabic").val(res.arabicname);
            $("#countryid").val(res.countryid);
            $('#myModal').modal('show');
          }
         })
      }
    </script>
        
    <!-- /.content-wrapper -->
    @endsection