@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_office_staff.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($Office_staffs as $Office_staff)
            <div class="row">
                <div class="col-12">
                    <h1><b>修改辦公人員基本資料</b></h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>
                    <form action="{{ route('re_office_staff') }}" method="POST" class="col-12">
                        @csrf

                        <label for="name"><b>姓名(中文)</b></label>
                        <input type="text" placeholder="Enter name" name="name" value="{{$Office_staff->name}}">

                        <label for="ename"><b>姓名(英文)</b></label>
                        <input type="text" placeholder="Enter ename" name="ename"  value="{{$Office_staff->ename}}">

                        <label for="job_title"><b>職稱(中文)</b></label>
                        <input type="text" placeholder="Enter job_title" name="job_title"  value="{{$Office_staff->position}}">

                        <label for="ejob_title"><b>職稱(英文)</b></label>
                        <input type="text" placeholder="Enter ejob_title" name="ejob_title"  value="{{$Office_staff->eposition}}">

                        <label for="extension"><b>教師研究室分機</b></label>
                        <input type="text" placeholder="extension" name="extension"  value="{{$Office_staff->extension}}">

                        <label for="mail"><b>電子信箱(E-mail)</b></label>
                        <input type="text" placeholder="mail" name="mail"  value="{{$Office_staff->email}}">

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
