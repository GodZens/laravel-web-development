@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_acc_teacher.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($T_accs as $T_acc)
            <div class="row">
                <div class="col-12">
                    <h1><b>修改帳密</b></h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>
                    <form action="{{ route('re_acc_teacher', ['id' => $T_acc->id]) }}" method="POST" class="col-12">
                        @csrf

                        <label for="account"><b>帳號</b></label>
                        <input type="text" placeholder="Enter Account" name="account" value="{{$T_acc->acc}}" required>

                        <label for="password"><b>密碼</b></label>
                        <input type="text" placeholder="Enter Password" name="password" value="{{$T_acc->pass}}" required>

                        <div class="clearfix mt-5">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('back_teacher') }}"><button type="button" class="cancelbtn">返回</button></a>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    @if (Session::has('success'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('error') }}
        </div>
    @endif
@endsection
@section('javascript')
    <script>
        // 顯示警告框
        document.getElementById("alert").style.display = "block";

        // 設定一段時間後隱藏警告框
        setTimeout(function() {
            document.getElementById("alert").style.display = "none";
        }, 2000); // 2000 毫秒為 2 秒
    </script>
@endsection
