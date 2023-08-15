<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>應用外語系</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
    <script src="{{ asset('js/a02478fc6d.js') }}"></script>
    @yield('stylesheets')
</head>
<!-- header -->
<!-- 每個頁面的最上方 -->

<body>
    <!-- 每個頁面的最上方 -->
    <header class="container-fluid">
        <div class="row">
            <div class="col-12 header_background  p-0 clickable" onclick="redirectToURL('{{ route('Home') }}')">
                <ul class="header_selection space_height_200 w-100 justify-content-end d-flex  flex-wrap">
                    <li class="d-inline-block "> <a href="https://www.yuntech.edu.tw/"><span class="p-2"><b>雲科大首頁</b></span></a></li>
                    <li class="d-inline-block "> <a href="{{ route('Home') }}"><span class="p-2"><b>中文</b> </span></a></li>
                    <li class="d-inline-block "> <a href="{{ route('en_home') }}"><span class="p-2"><b>英文</b></span></a></li>
                </ul>
            </div>
            <div class="col-12  w-100 header_color p-0">
                <!-- ============= COMPONENT ============== -->
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto">
                            <li class="nav-item active p-0"> <a class="nav-link text-white"
                                    href="{{ route('depnews', ['id' => '0']) }}">系所公告 </a> </li>
                            <li class="nav-item active p-0"> <a class="nav-link text-white"
                                    href="{{ route('teacher') }}">系所師資 </a> </li>
                            <li class="nav-item active p-0"> <a class="nav-link text-white"
                                    href="{{ route('students', ['year' => date('Y') - 1911]) }}">學生專區 </a> </li>
                            <li class="nav-item active p-0"> <a class="nav-link text-white"
                                    href="{{ route('depintroduct') }}">關於系所 </a> </li>
                            <li class="nav-item active p-0"> <a class="nav-link text-white"
                                    href="{{ route('curriculumplan') }}">課程架構 </a> </li>
                            <li class="nav-item active p-0"> <a class="nav-link text-white"
                                    href="{{ route('partner_link') }}">產學連結 </a> </li>
                        </ul>
                    </div>
                 </nav>
                <!-- ============= COMPONENT END// ============== -->
            </div>
        </div>
    </header>
    <!-- 每個頁面的最上方 -->

    <!-- 其他內容 -->
    @yield('content')

    <!-- footer -->
    <!-- <footer class="container p-0 footer-background mt-3">
        <div class="row justify-content-center m-0">
            <div class="col-lg-6 col-12">
                <div class="col-12">
                    <span class="text-white fs-20 mr-2"><b>國立雲林科技大學</b> </span>
                    <span class="text-white fs-20"><b>應用外語系</b> </span>
                </div>
                <div class="col-12">
                    <span class="text-white mr-2">64002 雲林縣斗六市大學路3段123號 </span>
                    <span class="text-white ">Tel:05-5342601#3201-3203</span>
                </div>
                <div class="col-12">
                    <span class="text-white mr-2">Copyright 2018 @ IM in NYUST ALL Right Reserved</span>
                </div>
            </div>
            <div class="col-lg-4 col-12  footer-icon">
                <span class="text-white ">
                    <a href="#"><i class="fa-brands fa-facebook fs-20 text-white mr-2"></i></a>
                    <a href="#"><i class="fa-regular fa-envelope fs-20 text-white mr-2"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube fs-20 text-white"></i></a>
                </span>
            </div>
        </div>
    </footer> -->
    <footer class="footer-container-fluid">
        <div class="row justify-content-center m-0">
            <div class="col-lg-6 col-12">
                <div class="col-12">
                    <span class="text-black  fs-20 mr-2"><b>國立雲林科技大學</b> </span>
                    <span class="text-black  fs-20"><b>應用外語系</b> </span>
                </div>
                <div class="col-12">
                    <span class="text-black  mr-2">64002 雲林縣斗六市大學路3段123號 </span>
                    <span class="text-black  ">Tel:05-5342601#3201-3203</span>
                </div>
                <div class="col-12">
                    <span class="text-black  mr-2">Copyright 2018 @ IM in NYUST ALL Right Reserved</span>
                </div>
            </div>
            <div class="col-lg-4 col-12  footer-icon">
                <span class="text-black  ">
                    <a href="#"><i class="fa-brands fa-facebook fs-20 text-black  mr-2"></i></a>
                    <a href="#"><i class="fa-regular fa-envelope fs-20 text-black  mr-2"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube fs-20 text-black"></i></a>
                </span>
            </div>
        </div>
    </footer>
    <!-- <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script> -->
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('js/a02478fc6d.js') }}" crossorigin="anonymous"></script> -->
    <script>
        function redirectToURL(url) {
            window.location.href = url;
        }
    </script>
    @yield('javascript')
</body>

</html>
