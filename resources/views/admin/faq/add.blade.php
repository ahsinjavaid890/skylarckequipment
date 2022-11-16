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
                      Add New FAQ
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ url('createquestions') }}">
                       {{ csrf_field() }}
                      <div class="form-group">
                          <label>Question</label>
                          <input placeholder="Question" required="" class="form-control" type="text" name="e_question">
                      </div>
                      <div class="form-group">
                          <label>Answer</label>
                          <textarea placeholder="Answer" required="" class="form-control" name="e_answer"></textarea>
                      </div>
                      <div style="text-align: right;" class="form-group">
                          <input type="submit" class="btn btn-primary" value="Add New FAQ" name="">
                      </div>
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