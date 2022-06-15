<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('layouts.head')
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        <main class="p-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.script')
</body>
</html>
