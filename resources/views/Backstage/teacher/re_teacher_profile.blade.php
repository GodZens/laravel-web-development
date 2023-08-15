@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_teacher_profile.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($T_profiles as $T_profile)
            <div class="row">
                <div class="col-12">
                    <h1><b>修改教師基本資料</b></h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>
                    <form action="{{ route('re_teacher_profile') }}" method="POST" class="col-12">
                        @csrf

                        <label for="name"><b>姓名(中文)</b></label>
                        <input type="text" placeholder="Enter name" name="name" value="{{$T_profile->name}}">

                        <label for="ename"><b>姓名(英文)</b></label>
                        <input type="text" placeholder="Enter ename" name="ename"  value="{{$T_profile->ename}}">

                        <label for="job_title"><b>職稱(中文)</b></label>
                        <input type="text" placeholder="Enter job_title" name="job_title"  value="{{$T_profile->position}}">

                        <label for="ejob_title"><b>職稱(英文)</b></label>
                        <input type="text" placeholder="Enter ejob_title" name="ejob_title"  value="{{$T_profile->eposition}}">

                        <label for="highest_education"><b>最高學歷(中文)</b></label>
                        <input type="text" placeholder="highest_education" name="highest_education"  value="{{$T_profile->education}}">

                        <label for="ehighest_education"><b>最高學歷(英文)</b></label>
                        <input type="text" placeholder="ehighest_education" name="ehighest_education"  value="{{$T_profile->eeducation}}">

                        <label for="office"><b>辦公室</b></label>
                        <input type="text" placeholder="office" name="office"  value="{{$T_profile->Researchroom}}">

                        <label for="extension"><b>教師研究室分機</b></label>
                        <input type="text" placeholder="extension" name="extension"  value="{{$T_profile->extension}}">

                        <label for="mail"><b>電子信箱(E-mail)</b></label>
                        <input type="text" placeholder="mail" name="mail"  value="{{$T_profile->email}}">

                        <label for="website"><b>網站(website)</b></label>
                        <input type="text" placeholder="website" name="website"  value="{{$T_profile->website}}">

                        <label for="Professional_specialty"><b>專業特長</b></label>
                        <input type="text" placeholder="Professional_specialty" name="Professional_specialty"  value="{{$T_profile->professionalspecialty}}">

                        <label for="word_to_st"><b>給學生的一段話</b></label>
                        <input type="text" placeholder="word_to_st" name="word_to_st"  value="{{$T_profile->tostudent}}">

                        <label for="books_for_st"><b>給學生閱讀的書</b></label>
                        <input type="text" placeholder="books_for_st" name="books_for_st"  value="{{$T_profile->tobook}}">

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
