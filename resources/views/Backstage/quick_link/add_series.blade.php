@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/quick_link/add_series.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>系刊資料上傳</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <form action="{{ route('add_series') }}" method="POST" class="col-12" enctype="multipart/form-data">
                    @csrf
                    <label for="series-name"><b>系刊名稱(中文)</b></label>
                    <input type="text" name="series-name" required>

                    <label for="series-name-eng"><b>系刊名稱(英文)</b></label>
                    <input type="text" name="series-name-eng" required>

                    <div class="d-block">
                        <label for="semester"><b>學期</b></label>
                        <select name="semester">
                            <option value="1">第一學期</option>
                            <option value="2">第二學期</option>
                        </select>
                    </div>

                    <div id="refile" class="col-12 p-0 mb-2">
                        <label for="file" class="d-block"><b>檔案(中文)</b></label>
                        <input maxlength="100" autocomplete="off" type="file" name="file">
                    </div>

                    <div class="clearfix">
                        <button type="submit" class="signupbtn">上傳</button>
                        <a href="{{ route('series') }}"><button type="button" class="cancelbtn">返回</button></a>
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
