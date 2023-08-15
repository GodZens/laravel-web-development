<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>應用外語系</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/a02478fc6d.js') }}"></script>
    @yield('stylesheets')
</head>

<body>

    <!-- 其他內容 -->
    @yield('content')

    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/a02478fc6d.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>
    @yield('javascript')
</body>
</html>
