<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name') }}</title>

  <!-- CRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js') }}"></script>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('public/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
   <script src="{{ asset('public/admin/vendor/ckeditor/ckeditor.js') }}"></script>
  <!-- Page level plugin CSS-->
  <link href="{{ asset('public/admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('public/admin/css/sb-admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/admin/vendor/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('public/admin/vendor/summernote/summernote-bs4.css') }}">
  <script src="{{ asset('public/admin/vendor/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/summernote/lang/summernote-ar-AR.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/summernote/summernote-ext-rtl.js') }}"></script>

  <script>
      $(document).ready(function() {
       $("#editor1").summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['insert', ['link','picture', 'video', 'hr']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['fullscreen', 'codeview']]
            ],
             height:300,
             fontsize:'18px'
        });
      });
  </script>
</head>
<body id="page-top">
  @include('admin.layouts.nav')
  @include('admin.layouts.sidebar')
  @yield('content')
  @include('admin.layouts.footer')