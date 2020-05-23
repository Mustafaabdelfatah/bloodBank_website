@include('dashboard.layouts.header')
@include('dashboard.layouts.navbar')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        @yield('page_title')
        <small> @yield('small_title')</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('dashboard.layouts.message')
        @yield('content')
    </section>
        <!-- /.content -->
    </div>

@include('dashboard.layouts.footer')
