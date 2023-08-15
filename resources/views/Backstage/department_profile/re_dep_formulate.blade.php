@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_profile/re_dep_formulate.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($depmethods as $depmethod)
            <form action="{{ route('re_dep_formulate',['id' => $depmethod->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改訂定辦法</h1>

                        <hr>

                        <label for="file-description"><b>檔案描述(中文)</b></label>
                        <input type="text" name="description" value="{{ $depmethod->description }}" required>

                        <label for="file-description-eng"><b>檔案描述(英文)</b></label>
                        <input type="text" name="edescription" value="{{ $depmethod->description_en }}" required>

                        <div class="col-12 p-0 mb-2">
                            <label for="file" class="d-block"><b>檔案(中文PDF)</b></label>
                            <input type="file" name="file_PDF" id="file_PDF">
                            <p>{{ $depmethod->file }}</p>
                        </div>

                        <div class="col-12 p-0 mb-2">
                            <label for="file" class="d-block"><b>檔案(中文WORD)</b></label>
                            <input type="file" name="file_WORD" id="file_WORD">
                            <p>{{ $depmethod->file_word }}</p>
                        </div>

                        <div class="col-12 p-0 mb-2">
                            <label for="file" class="d-block"><b>檔案(中文ODT)</b></label>
                            <input type="file" name="file_ODT" id="file_ODT">
                            <p>{{ $depmethod->file_odt }}</p>
                        </div>

                        <div class="col-12 p-0 mb-2">
                            <label for="file-eng" class="d-block"><b>檔案(英文)</b></label>
                            <input type="file" name="file_en" id="file_en">
                            <p>{{ $depmethod->file_en }}</p>
                        </div>

                        <div class="clearfix">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('dep_formulate') }}"><button type="button" class="cancelbtn">返回</button></a>
                        </div>
                    </div>
                </div>
            </form>
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
