@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_practical_topics/add_result.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <form action="{{ route('add_result') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h1>新增實務專題</h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>

                    <label for="system" class="d-block mb-0 "><b>年度</b></label>
                    <select name="year" id="year" class="">
                        @foreach ($practical_topics_years as $practical_topics_year)
                            <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                            </option>
                        @endforeach
                    </select>

                    <label for="classification" class="d-block mb-0 mt-3"><b>類型</b></label>
                    <select name="classification">
                        <option value="0">請選擇</option>
                        <option value="1">二技</option>
                        <option value="2">四技</option>
                    </select>

                    <label for="type" class="d-block mb-0 mt-3"><b>類型</b></label>
                    <select name="type">
                        <option value="0">請選擇</option>
                        <option value="1">實習組</option>
                        <option value="2">專題組</option>
                        <option value="3">歷屆得獎影片</option>
                    </select>

                    <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="addname"
                        id="addname" value="新增欄位" />
                    <label for="student-name" class="d-block mt-3"><b>學生姓名(中文)</b></label>
                    <div id="compname">
                        <input type="text" name="student-name[]" required>
                    </div>

                    <label for="student-name-eng"><b>學生姓名(英文)</b></label>
                    <div id="en_compname">
                        <input type="text" name="student-name-eng[]" required>
                    </div>

                    <label for="student-number"><b>學生學號</b></label>
                    <div id="nu_compname">
                        <input type="text" name="student-number[]" required>
                    </div>

                    <label for="topic-ch"><b>題目(中文)</b></label>
                    <input type="text" name="topic-ch" required>

                    <label for="topic-eng"><b>題目(英文)</b></label>
                    <input type="text" name="topic-eng" required>


                    <label for="teacher" class="d-block mt-2"><b>指導老師</b></label>
                    <select name="teacher">
                        <option value="1">請選擇</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->name . '@' . $teacher->ename }}">
                                {{ $teacher->name . '(' . $teacher->ename . ')' }}
                            </option>
                        @endforeach
                    </select>

                    <span class="d-block mt-3"> 檔案位置</span><input maxlength="100" autocomplete="off" type="file"
                        name="file">

                    <div class="clearfix">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('practical_topics', ['year' => date('Y') - 1911]) }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
                </div>
            </div>
        </form>
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
    <script>
        $(document).ready(function() {

            $('#addname').click(function() {
                $('<br /><input type="text" name="student-name[]" id="name" maxlength="40" /></div>')
                    .appendTo(
                        '#compname');
                $('<br /><input type="text" name="student-name-eng[]" id="ename" maxlength="40" /></div>')
                    .appendTo(
                        '#en_compname');
                $('<br /><input type="text" name="student-number[]" id="ename" maxlength="40" /></div>')
                    .appendTo(
                        '#nu_compname');
            });

        });
    </script>
@endsection
