<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login/guest">ゲストログイン</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('mypage',['user' => Auth::id()]) }}">
                                    {{ __('マイページ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post.create') }}" class="nav-link">投稿する</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-4">
            @yield('content')
        </main>
    </div>

    <input id="js-getLat" value="{{ $post->lat ?? '' }}" type="text" hidden>
    <input id="js-getLng" value="{{ $post->lng ?? '' }}" type="text" hidden>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
    @if(Request::routeIs('post.create'))
    <script>
        let map;

        function initMap() {
            //////////////////////////////
            //【posts.create.blade.php】//
            //////////////////////////////
            // ポスト作成時のマーカーの初期位置
            let defaultLat = 35.71484559979886;
            let defaultLng = 139.79670113988192;

            // インプットに代入
            let inputLat = document.getElementById("sample_lat");
            let inputLng = document.getElementById("sample_lng");
            inputLat.value = defaultLat;
            inputLng.value = defaultLng;

            // マーカーの初期位置を浅草寺に設定
            const sennsouji = {
                lat: defaultLat,
                lng: defaultLng
            };

            //ポスト作成画面にgooglemapを表示
            map = new google.maps.Map(document.getElementById("map"), {
                center: sennsouji,
                zoom: 15,
            });

            //ポスト作成画面のgooglemapにマーカーを表示
            marker = new google.maps.Marker({
                draggable: true,
                position: sennsouji,
                map: map,
            });

            infowindow = new google.maps.InfoWindow({
                content: 'ドラッグ＆ドロップで好きな場所に動かせます。',
                position: sennsouji,
            });

            infowindow.open(map);

            //マーカーをドラッグ＆ドロップした座標を取得
            marker.addListener("dragend", function(e) {
                inputLat.value = e.latLng.lat();
                inputLng.value = e.latLng.lng();
            });
        }
    </script>
    @elseif (Request::routeIs('post.show'))
    <script>
        let map;

        function initMap() {
            //////////////////////////////
            //【posts.show.blade.php】////
            //////////////////////////////
            var showLat = parseFloat(document.getElementById('js-getLat').value);
            var showLng = parseFloat(document.getElementById('js-getLng').value);

            //マーカーの初期位置をDBから取得した値に設定
            const show_position = {
                lat: showLat,
                lng: showLng,
            };

            //ポスト詳細画面にgooglemapを表示
            let map = new google.maps.Map(document.getElementById("show_map"), {
                center: show_position,
                zoom: 15,
            });

            //ポスト詳細画面のgooglemapにマーカーを表示
            let marker = new google.maps.Marker({
                draggable: false,
                position: show_position,
                map: map,
            });
        }
    </script>
    @elseif (Request::routeIs('post.edit'))
    <script>
        let map;

        function initMap() {
            //////////////////////////////
            //【posts.edit.blade.php】////
            //////////////////////////////
            var editLat = parseFloat(document.getElementById('js-getLat').value);
            var editLng = parseFloat(document.getElementById('js-getLng').value);

            // インプットに代入
            let inputLat = document.getElementById("sample_lat");
            let inputLng = document.getElementById("sample_lng");
            inputLat.value = editLat;
            inputLng.value = editLng;

            //マーカーの初期位置をDBから取得した値に設定
            const edit_position = {
                lat: editLat,
                lng: editLng,
            };

            //ポスト詳細画面にgooglemapを表示
            let map = new google.maps.Map(document.getElementById("edit_map"), {
                center: edit_position,
                zoom: 15,
            });

            //ポスト詳細画面のgooglemapにマーカーを表示
            let marker = new google.maps.Marker({
                draggable: true,
                position: edit_position,
                map: map,
            });

            infowindow = new google.maps.InfoWindow({
                content: 'ドラッグ＆ドロップで好きな場所に動かせます。',
                position: edit_position,
            });

            infowindow.open(map);

            //マーカーをドラッグ＆ドロップした座標を取得
            marker.addListener("dragend", function(e) {
                inputLat.value = e.latLng.lat();
                inputLng.value = e.latLng.lng();
            });
        }
    </script>
    @endif
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw6n16TVvvodS0JmNYna1Aq2sTBXl_cyI&callback=initMap&v=weekly" defer></script>
</body>

</html>
