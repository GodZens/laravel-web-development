@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/admission/re_alumni.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($alumnis as $alumni)
            <div class="row">
                <div class="col-12">
                    <h1>修改校友</h1>

                    <hr>
                    <form action='{{ route('re_alumni', ['id' => $alumni->id]) }}' method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="alumni" class="d-block mt-3"><b>校友名稱(中文)</b></label>
                        <input type="text" name="alumni" value="{{ $alumni->classname }}" required>

                        <label for="alumni-eng" class="d-block mt-3"><b>校友名稱(英文)</b></label>
                        <input type="text" name="alumni-eng" value="{{ $alumni->classname_en }}">

                        <label for="work-unit" class="d-block mt-3"><b>任職單位(中文)</b></label>
                        <textarea cols="35" rows="10" name="work-unit" rosw="200" required>{{ $alumni->equipment }}</textarea>

                        <label for="work-unit-eng" class="d-block mt-3"><b>任職單位(英文)</b></label>
                        <textarea cols="35" rows="10" name="work-unit-eng" rosw="200">{{ $alumni->equipment_en }}</textarea>

                        <label for="performance" class="d-block mt-3"><b>優秀表現(中文)</b></label>
                        <textarea cols="35" rows="10" name="performance" rosw="200" required>{{ $alumni->performance }}</textarea>

                        <label for="performance-eng" class="d-block mt-3"><b>優秀表現(英文)</b></label>
                        <textarea cols="35" rows="10" name="performance-eng" rosw="200">{{ $alumni->performance_en }}</textarea>

                        <label for="info" class="d-block mt-3"><b>相關報導(中文)</b></label>
                        <textarea cols="35" rows="10" name="info" rosw="200" required>{{ $alumni->info }}</textarea>

                        <label for="file" class="mt-2 d-block">檔案</label>
                        <input maxlength="100" autocomplete="off" type="file" name="file">
                        <p>{{ $alumni->img }}</p>

                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('admission') }}"><button type="button" class="cancelbtn">返回</button></a>
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
