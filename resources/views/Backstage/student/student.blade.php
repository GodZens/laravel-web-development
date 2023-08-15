<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生專區</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/student.css') }}">
</head>

<body>


    <div class="container-full">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class=" text-center mb-5">請選擇需學生專區 <br> 要修改的部分。</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="middle">
                    <a href="{{route('add_st_year_view')}}" class="btn  btn-secondary ml-2">新增學年度</a>
                    <a href="{{route('delete_st_year_view')}}" class="btn  btn-secondary ml-2">刪除學年度</a>
                    <a href="{{route('future_employment')}}" class="btn  btn-secondary ml-2">未來就業</a>
                    <a href="{{route('student_work_view',['year' => date('Y')-1911])}}" class="btn  btn-secondary ml-2">學生作品</a>
                    <a href="{{route('student_activate_view')}}" class="btn  btn-secondary ml-2">學生活動</a>
                    <a href="{{route('back_thesis',['year' => date('Y')-1911])}}" class="btn  btn-secondary ml-2">碩士論文</a>
                    <a href="{{route('practical_topics',['year' => date('Y')-1911])}}" class="btn  btn-secondary ml-2">實務專題</a>
                    <a href="{{route('st_download')}}" class="btn  btn-secondary ml-2">下載專區</a>
                    <a href="{{route('index')}}" class="btn  btn-danger ml-2">返回</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/a02478fc6d.js') }}" crossorigin="anonymous"></script>
</body>
</html>
