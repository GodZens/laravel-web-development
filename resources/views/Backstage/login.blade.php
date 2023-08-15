<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入畫面</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/login.css') }}">
</head>

<body>
    <div class="login">
        <form class="form" action='{{ route('login') }}' method='POST'>
            @csrf
            <h2>會員登入</h2>
            <div class="group">
                <label for="user_id">帳號</label>
                <input type="text" name="account" id="user_id">
            </div>
            <div class="group">
                <label for="user_password">密碼</label>
                <input type="text" name="password" id="user_password">
            </div>
            <div class="btn-group">
                <button class="btn  btn-light ">登入</button>
                <button class="btn  btn-light">取消</button>
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
