<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生專區</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_profile/dep_profile.css') }}">
</head>

<body>


    <div class="container-full">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class=" text-center mb-5">請選擇需系所簡介 <br> 要修改的部分。</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="middle">
                    <a href="{{route('introduction')}}" class="btn  btn-secondary">系所簡介</a>
                    <a href="{{route('dep_formulate')}}" class="btn  btn-secondary ml-2">系所辦法</a>
                    <a href="{{route('dep_equipment')}}" class="btn  btn-secondary ml-2">教學設備</a>
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
