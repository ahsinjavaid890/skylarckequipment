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
                    All Blogs 
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Tittle</th>
                           <th>Blog Category</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach(DB::table('blogs')->get() as $r){ ?>
                        <tr>
                            <td>{{$r->tittle}}</td>
                            <td><?php echo DB::table('blogcategories')->where('id', $r->blogcategoryid)->first()->name; ?></td>
                            <td>{{$r->blogdate}}</td>
                            <td style="text-align: center;">
                              <a href="{{ url('admin/editblog') }}/{{ $r->id }}">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                              </a>
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
@endsection