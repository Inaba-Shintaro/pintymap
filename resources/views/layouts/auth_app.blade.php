<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('layouts.head')
</head>
<body>
  <div id="app">
    @include('layouts.nav')
    <section class="vh-100" style="background-color: #508bfc;">
      <div class="h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5 p-md-0 p-4">
            @yield('content')
          </div>
        </div>
      </div>
    </section>
  </div>
  @include('layouts.script')
</body>
</html>
