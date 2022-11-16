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
                    All Users
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>English Question</th>
                           <th>Arabic Question</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach(DB::table('faqquestions')->get() as $r){ ?>
                        <tr>
                            <td>{{$r->e_question}}</td>
                            <td>{{$r->a_question}}</td>
                            <td style="text-align: center;">
                              <button onclick="editfaq({{ $r->id }})" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                              <!-- <a id="test" href="{{url('deletetestimonial')}}/{{$r->id}}">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                              </a> -->
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
            <h4 class="modal-title">Update Frequently Ask Question</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <form method="post" action="{{ url('updatefaq') }}">
                 {{ csrf_field() }}
                 <input type="hidden" id="faqid" name="id">
                <div class="form-group">
                    <label>Question</label>
                    <input placeholder="Question" required="" id="englishquestion" class="form-control" type="text" name="e_question">
                </div>
                <div class="form-group">
                    <label>Answer</label>
                    <textarea placeholder="Answer" required="" id="englishanswer" class="form-control" name="e_answer"></textarea>
                </div>
                <div class="form-group">
                    <div style="text-align:  right;">
                    <label style="direction: rtl;">سؤال</label>
                    </div>
                    <input style="direction: rtl;" id="arabicquestion" placeholder="سؤال" required="" class="form-control" type="text" name="a_question">
                </div>
                <div class="form-group">
                  <div style="text-align:  right;">
                    <label style="direction: rtl;">أإجابة</label>
                    </div>
                    <textarea placeholder="أإجابة" id="arabicanswer" style="direction: rtl;" required="" name="a_answer" class="form-control"></textarea>
                </div>
                <div style="text-align: right;" class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update FAQ" name="">
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function ($) {
          $("#test").click(function (e) {
              var answer = confirm('Are you sure that you want to Delete This?');
              if (!answer) {
                  e.preventDefault();
              }
          });
      });

      function editfaq(id)
      {
        $.ajax({
          type:'GET',
          url:"{{ url('editfrequentlyquestion') }}/"+id,
          datatype:'json',
          success: function(res)
          {
            $("#englishquestion").val(res.e_question);
            $("#englishanswer").val(res.e_answer);
            $("#arabicquestion").val(res.a_question);
            $("#arabicanswer").val(res.a_answer);
            $("#faqid").val(res.id);
            $('#myModal').modal('show');
          }
         })
      }
    </script>
        
    <!-- /.content-wrapper -->
    @endsection