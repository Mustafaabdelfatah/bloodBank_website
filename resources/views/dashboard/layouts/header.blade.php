<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blood Bank</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->



  <!-- dir -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
        <!-- Custom style for RTL -->
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/rtl/custom.css">

        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400&display=swap&subset=arabic,latin-ext" rel="stylesheet">
        <!-- ./dir-->
        <style>
        html,body,h1,h2,h3{
        font-family: 'Cairo', sans-serif;
        }

body:not(.sidebar-mini-md) .content-wrapper,
body:not(.sidebar-mini-md) .main-footer,
 body:not(.sidebar-mini-md) .main-header {
    transition: margin-left .3s ease-in-out;
    margin-left: 0px;
 }

        </style>
        @else
    <link rel="stylesheet" href="{{url('design/adminlte/dist/css/AdminLTE.min.css')}}">
    @endif


  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
