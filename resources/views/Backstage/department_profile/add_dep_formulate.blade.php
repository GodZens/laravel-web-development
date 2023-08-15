@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_profile/add_dep_formulate.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <form action="{{ route('add_dep_formulate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h1>新增訂定辦法</h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>

                    <label for="file-description"><b>檔案描述(中文)</b></label>
                    <input type="text" name="description" required>

                    <label for="file-description-eng"><b>檔案描述(英文)</b></label>
                    <input type="text" name="edescription" required>

                    <div class="col-12 p-0 mb-2">
                        <label for="file" class="d-block"><b>檔案(中文PDF)</b></label>
                        <input type="file" name="file_PDF" id="file_PDF">
                    </div>

                    <div class="col-12 p-0 mb-2">
                        <label for="file" class="d-block"><b>檔案(中文WORD)</b></label>
                        <input type="file" name="file_WORD" id="file_WORD">
                    </div>

                    <div class="col-12 p-0 mb-2">
                        <label for="file" class="d-block"><b>檔案(中文ODT)</b></label>
                        <input type="file" name="file_ODT" id="file_ODT">
                    </div>

                    <div class="col-12 p-0 mb-2">
                        <label for="file-eng" class="d-block"><b>檔案(英文)</b></label>
                        <input type="file" name="file_en" id="file_en">
                    </div>

                    <div class="clearfix">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('dep_formulate') }}"><button type="button" class="cancelbtn">返回</button></a>
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
