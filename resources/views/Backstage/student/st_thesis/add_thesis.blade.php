@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_thesis/add_thesis.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <form action="{{ route('add_thesis') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h1>新增碩士論文</h1>
                    <hr>
                    <label for="Academic " class="d-block mt-2 mb-0"><b>學年度</b></label>
                    <select name="year">
                        <option value="0">請選擇</option>
                        @foreach ($practical_topics_years as $practical_topics_year)
                            <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                            </option>
                        @endforeach
                    </select>&nbsp;學年度

                    <label for="author" class="d-block mt-3"><b>作者(中文)</b></label>
                    <input type="text" name="author">

                    <label for="author-eng" class="d-block mt-3"><b>作者(英文)</b></label>
                    <input type="text" name="author-eng">

                    <label for="topic" class="d-block mt-3"><b>題目(中文)</b></label>
                    <input type="text" name="topic">

                    <label for="topic-eng" class="d-block mt-3"><b>題目(英文)</b></label>
                    <input type="text" name="topic-eng">

                    <label for="teacher" class="d-block mb-0 "><b>指導老師</b></label>
                    <select name="teacher">
                        <option value="1">請選擇</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->name . '@' . $teacher->ename }}">
                                {{ $teacher->name . '(' . $teacher->ename . ')' }}
                            </option>
                        @endforeach
                    </select>

                    <div class="clearfix  mt-3">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('back_thesis') }}"><button type="button" class="cancelbtn signupbtn">返回</button>
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
@endsection
