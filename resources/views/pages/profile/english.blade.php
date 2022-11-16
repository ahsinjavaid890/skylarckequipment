@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 20px;margin-bottom: 20px;">
	@if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
    @endif
	<div class="row">
		
		<div class="col-lg-4 col-md-12">
        <div class="services-details-info">
            <ul class="services-list">
                <li><a href="single-services-1.html" class="active">Update Profile</a></li>
                <!-- <li><a href="single-services-1.html">ALL Requests</a></li> -->
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			    {{ csrf_field() }}
			</form>
            <div class="services-contact-info">
                <h3>Contact Info</h3>
                
                <ul>
                    <li>
                        <div class="icon">
                            <i class="bx bx-user-pin"></i>
                        </div>
                        <span>Phone:</span>
                        <a href="tel:+21453545413" target="_blank">{{Auth::user()->phonenumber}}</a>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="bx bx-map"></i>
                        </div>
                        <span>Location:</span>
                        {{Auth::user()->country}}
                    </li>
                    <li>
                        <div class="icon">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <span>Email:</span>
                        <a href="mailto:hello@tracer.com">{{Auth::user()->email}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
		<div class="col-md-8">
			<div class="card card-success">
				<div class="card-header">
					<h4>Update Profile</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ url('updateprofile') }}">
						{{ csrf_field() }}
					<div class="form-group">
						<label>Update Name</label>
						<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label>Update Email</label>
						<input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
					</div>
					<div class="form-group">
						<label>Update Country</label>
						<input type="text" class="form-control" name="country" value="{{Auth::user()->country}}">
					</div>
					<div class="form-group">
						<label>Update Contact Number</label>
						<input type="text" class="form-control" name="phone" value="{{Auth::user()->phonenumber}}">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
    
</style>
@endsection