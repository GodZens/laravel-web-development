@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/Backstage/keyaffair/double_education/re_double_education.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($double_educations as $double_education)
            <div class="row">
                <div class="col-12">
                    <h1>新增申請資料</h1>

                    <hr>
                    <form action='{{ route('re_double_education',['id' => $double_education->id]) }}' method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="describe" class="d-block mt-3"><b>描述(中文)</b></label>
                        <input type="text" name="describe" value="{{ $double_education->description }}" required>

                        <label for="describe_en" class="d-block mt-3"><b>描述(英文)</b></label>
                        <input type="text" name="describe_en" value="{{ $double_education->description_en }}">

                        <label for="file" class="mt-2 d-block">檔案</label>
                        <input maxlength="100" autocomplete="off" type="file" name="file">
                        <p>{{$double_education->file}}</p>
                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('double_education') }}"><button type="button"
                                    class="cancelbtn">返回</button></a>
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
