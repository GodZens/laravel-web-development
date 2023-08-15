@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_relate_teacher.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($Relate_teachers as $Relate_teacher)
            <div class="row">
                <div class="col-12">
                    <h1><b>修改相關教師基本資料</b></h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>
                    <form action="{{ route('re_relate_teacher') }}" method="POST" class="col-12">
                        @csrf

                        <label for="name"><b>姓名(中文)</b></label>
                        <input type="text" placeholder="Enter name" name="name" value="{{$Relate_teacher->name}}">

                        <label for="ename"><b>姓名(英文)</b></label>
                        <input type="text" placeholder="Enter ename" name="ename"  value="{{$Relate_teacher->ename}}">

                        <label for="job_title"><b>職稱(中文)</b></label>
                        <input type="text" placeholder="Enter job_title" name="job_title"  value="{{$Relate_teacher->position}}">

                        <label for="ejob_title"><b>職稱(英文)</b></label>
                        <input type="text" placeholder="Enter ejob_title" name="ejob_title"  value="{{$Relate_teacher->eposition}}">

                        <label for="ability"><b>教學項目</b></label>
                        <input type="text" placeholder="Enter ability" name="ability"  value="{{$Relate_teacher->ability}}">

                        <label for="highest_education"><b>最高學歷(中文)</b></label>
                        <input type="text" placeholder="highest_education" name="highest_education"  value="{{$Relate_teacher->education}}">

                        <label for="ehighest_education"><b>最高學歷(英文)</b></label>
                        <input type="text" placeholder="ehighest_education" name="ehighest_education"  value="{{$Relate_teacher->eeducation}}">

                        <label for="mail"><b>電子信箱(E-mail)</b></label>
                        <input type="text" placeholder="mail" name="mail"  value="{{$Relate_teacher->email}}">

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
