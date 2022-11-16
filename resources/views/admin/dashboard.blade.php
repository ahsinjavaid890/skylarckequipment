@extends('admin.layouts.header')

@section('content')

<div id="content-wrapper">

      <div class="container-fluid">

        <h4 style="margin-left:13px;">Hi {{Auth::user()->name}} Welcome Back To Sky Larck Admin</h4>

        @if(session()->has('message'))

            <div class="alert alert-success alert-dismissible">

              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                {{ session()->get('message') }}

            </div>

        @endif

        <section class="statistics">

            <div class="container-fluid">

              <div class="row">

                <div class="col-md-3">

                  <div class="box">

                    <i class="fa fa-list fa-fw bg-box"></i>

                    <div class="info">

                      <h3><?php echo DB::table('services')->count(); ?></h3> <span class="light_font">Services</span>

                      <p>Your Parent Services</p>

                    </div>

                  </div>

                </div>

                <div class="col-md-3">

                  <div class="box">

                    <i class="fa fa-file-code fa-fw bg-box"></i>



                  </div>

                </div>

                <div class="col-md-3">

                  <div class="box">

                    <i class="fa fa-users fa-fw bg-box"></i>

                    <div class="info">

                      <h3><?php echo DB::table('users')->count(); ?></h3> <span class="light_font">Users</span>

                      <p>All Website Registerd Users</p>

                    </div>

                  </div>

                </div>

                <div class="col-md-3">

                  <div class="box">

                    <i class="fa fa-gift fa-fw bg-box"></i>

                    <div class="info">

                      <h3><?php echo DB::table('fundingrequests')->count()+DB::table('bigdealsoffers')->count(); ?></h3> <span class="light_font">Total Offers</span>

                      <p>Big Deal and Funding Request</p>

                    </div>

                  </div>

                </div>



              </div>

            </div>

          </section>



        



        



      </div>

      <!-- /.container-fluid -->



    </div>
    <!-- /.content-wrapper -->

    @endsection