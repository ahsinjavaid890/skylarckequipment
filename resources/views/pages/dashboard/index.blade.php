@extends('layouts.app')
@section('content')
<section class="mb-5 mb-special">
    <div class="container container-custom">
        <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <img src="http://localhost/orif/public/images/1192573012.jpg" class="img-circle" width="100px">
            
                    <div class="profile-usertitle-name">
                    Dr . Asim Saleem
                    </div>
                    <div class="profile-usertitle-job">
                        usamakashif@gmail.com
                    </div>
                </div>
                
                <div class="profile-usermenu">
                    <ul>
                        <li>
                            <a href="http://localhost/orif/add-case">
                                Add New Case </a>
                        </li>
                        <li class="active">
                            <a href="http://localhost/orif/user-dashboard">
                                My Cases </a>
                        </li>
                        <li>
                            <a href="http://localhost/orif/user-profile">
                                Profile </a>
                        </li>
                        
                        <li>
                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#">
                                Logout </a>
                                <form id="logout-form" action="#" method="POST" style="display: none;">
          @crf
      </form>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card profile-sidebar">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h5>My Cases</h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="search_keyword wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s"> 
                                <a class="btn btn-primary" href="http://localhost/orif/add-case">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <tbody><tr>
                                <th>Title</th>
                                <th>Ratings</th>
                                <th>Status</th>
                                <th>Dated</th>
                                <th class="text-center">Action</th>
                            </tr>
                                                                <tr>
                                <td class="w-60">
                                    <a class="link-style-none" href="http://localhost/orif/adjusting-the-frecture">adjusting the frecture</a>
                                </td>
                                <td> <small><i class="fa fa-star star-rating"></i></small> </td>
                                <td>Published</td>
                                <td>01 Jan</td>
                                <td class="text-center">
                                    <a href="" title="Edit" class="icon-action"><small><i class="fa fa-edit"></i></small></a>
                                    &nbsp;
                                    <a href="" title="Delete" class="icon-action"><small><i class="fa fa-trash"></i></small></a>
                                </td>                                        
                            </tr>
                                                            </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection