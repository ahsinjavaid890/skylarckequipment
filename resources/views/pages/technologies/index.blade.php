@extends('layouts.app')
@section('content')
<section style="background-color: black;" class="page-title-layout4 text-center bg-overlay bg-parallax">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
        <h1 class="pagetitle__heading mb-10">{{ $data->technologyname }}</h1>
      </div>
    </div>
  </div>
</section>
<section>
	<div class="container">
		{!! $data->description !!}
	</div>
</section>
@endsection