@extends('admin.layouts.header')
@section('content')
<div id="content-wrapper">

      <div class="container-fluid">
        <h4 style="margin-left:13px;"></h4>
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-10">
              <div class="card">
                <div class="card-header card-success">
                    <div class="row"> 
                      <div class="col-md-6">
                        All FAQ Services
                      </div>
                      <div style="text-align: right;" class="col-md-6">
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addcategorymodal">Add New Category</button>
                      </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>English Name</th>
                           <th>Arabic Name</th> 
                           <th>Action</th>
                        </tr>
                        </thead>
                        <!-- <tfoot>
                        <tr>
                           <th>English Name</th>
                           <th>Arabic Name</th> 
                           <th>Action</th>
                        </tr>
                      </tfoot> -->
                      <tbody>
                        <?php foreach(DB::table('faqcategories')->get() as $r){ ?>
                        <tr>
                            <td>{{$r->englishname}}</td>
                            <td>{{$r->arabicname}}</td>
                            <td style="text-align: center;"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
         <!-- Logout Modal-->
          <div class="modal fade" id="addcategorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{ url('createnewcategory') }}">
                       {{ csrf_field() }}
                      <div class="form-group">
                          <label>Enter Category Name</label>
                          <input placeholder="Enter Category Name " required="" class="form-control" type="text" name="englishname">
                      </div>
                      <div class="form-group">
                          <div style="text-align:  right;">
                          <label style="direction: rtl;">أدخل اسم الفئة</label>
                          </div>
                          <input style="direction: rtl;" placeholder="أدخل اسم الفئة" required="" class="form-control" type="text" name="arabicname">
                      </div>
                      <div style="text-align: right;" class="form-group">
                          <input type="submit" class="btn btn-primary" value="Add New Service" name="">
                      </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.html">Logout</a>
                </div> -->
              </div>
            </div>
          </div>
    <!-- /.content-wrapper -->
    @endsection