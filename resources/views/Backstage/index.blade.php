<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後臺首頁</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/index.css') }}">
</head>

<body>
    <div class="container-full">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="text-white text-center">歡迎進入管理系統。<br>

                    請選擇需要修改的部分。</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="middle">
                    <a href="{{route('back_carousel')}}" class="btn btn1">輪播圖</a>
                    <a href="{{route('depnew',['type' => 'all'])}}" class="btn btn2">系所公告</a>
                    <a href="{{route('dep_profile')}}" class="btn btn3">系所簡介</a>
                    <a href="{{route('back_curriculum',['year' => date('Y')-1911])}}" class="btn btn4">課程架構</a>
                    <a href="{{route('back_teacher')}}" class="btn btn5">系所師資</a>
                </div>

            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="middle">
                    <a href="{{route('department_plan')}}" class="btn btn6">系所計畫</a>
                    <a href="{{route('back_student')}}" class="btn btn7">學生專區</a>
                    <a href="{{route('keyaffair')}}" class="btn btn8">重點事務</a>
                    <a href="{{route('quick_link')}}" class="btn btn9">快速連結</a>
                    <a href="{{route('Home')}}" class="btn btn10">返回首頁</a>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- fontawesome -->
    <script src="{{ asset('js/a02478fc6d.js') }}" crossorigin="anonymous"></script>
</body>

</html>
