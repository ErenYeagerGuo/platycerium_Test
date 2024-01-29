<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    @guest
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @else
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="api-token" content="{{ Auth::user()->api_token }}">
    @endguest

    <script src="{{ asset('js/app.js') }}"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    {{--    用戶導航欄--}}
    @unlessrole('admin')
    @include('layouts.userLayout')
    @endunlessrole

    {{--    管理員導航欄--}}
    @hasrole('admin')
        @include('layouts.adminLayout')
    @endrole

    {{--    主體--}}

    <main>
        <div class="container">
{{--            統一處理錯誤訊息--}}
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @php
                            //TODO 移動到middleware層
                            session()->forget('alert-' . $msg);
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
        @yield('content')
    </main>
</div>
</body>
</html>
