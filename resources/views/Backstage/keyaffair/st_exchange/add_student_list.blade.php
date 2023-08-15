@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/add_student_list.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>新增交換生資料</h1>

                <hr>
                <form action='{{ route('add_student_list') }}' method="POST">
                    @csrf
                    <span class="d-block mr-3"><b>學年度</b></span>
                    <select name="year">
                        <option value="0">請選擇</option>
                        @foreach ($ka_billboard_years as $ka_billboard_year)
                            <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}
                            </option>
                        @endforeach
                    </select>

                    <label for="semester " class="d-block mt-2 mb-0"><b>學期</b></label>
                    <select name="semester">
                        <option value="0">請選擇</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>

                    <label for="department-class " class="d-block mt-2 mb-0"><b>系所班級</b></label>
                    <select name="department-class">
                        <option value="0">請選擇</option>
                        <option value="應外系大一">應外系大一</option>
                        <option value="應外系大二">應外系大二</option>
                        <option value="應外系大三">應外系大三</option>
                        <option value="應外系大四">應外系大四</option>
                        <option value="應外所碩一">應外所碩一</option>
                        <option value="應外所碩二">應外所碩二</option>
                        <option value="應外所碩三">應外所碩三</option>
                        <option value="應外所碩四">應外所碩四</option>
                        <option value="應外所碩五">應外所碩五</option>
                    </select>



                    <label for="name" class="d-block mt-3"><b>姓名</b></label>
                    <input type="text" name="name" required>

                    <label for="gender " class="d-block mt-2 mb-0"><b>性別</b></label>
                    <select name="gender">
                        <option value="0">請選擇</option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>

                    <label for="type " class="d-block mt-2 mb-0"><b>類型</b></label>
                    <select name="type">
                        <option value="0">請選擇</option>
                        <option value="去">去</option>
                        <option value="來">來</option>
                    </select>

                    <label for="location " class="d-block mt-2 mb-0"><b>位置</b></label>
                    <input type="text" name="location" required>

                    <label for="time " class="d-block mt-2 mb-0"><b>起迄年月</b></label>
                    <input type="text" name="time" required>

                    <div class="clearfix  mt-3">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('student_list',['year' => date('Y')-1911]) }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
                </form>
            </div>
        </div>

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
