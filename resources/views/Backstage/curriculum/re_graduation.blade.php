@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/curriculum/re_graduation.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($graduations as $graduation)
            <form action="{{ route('re_graduation', ['id' => $graduation->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改畢業門檻</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        <label for="file-description"><b>檔案描述(中文)</b></label>
                        <input type="text" name="file-description" value="{{$graduation->description}}" required>

                        <label for="file-description-eng"><b>檔案描述(英文)</b></label>
                        <input type="text" name="file-description-eng" value="{{$graduation->edescription}}" required>

                        <div class="col-12 p-0 mb-2">
                            <label for="file" class="d-block"><b>檔案(中文)</b></label>
                            <input type="file" name="file" id="file" value="{{$graduation->file}}">
                        </div>

                        <div class="col-12 p-0 mb-2">
                            <label for="file-eng" class="d-block"><b>檔案(英文)</b></label>
                            <input type="file" name="file_en" id="file_en" value="{{$graduation->file_en}}">
                        </div>

                        <p>若修改檔案，舊的檔案會被刪掉~!!!</p>

                        <div class="clearfix">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('back_curriculum', ['year' => date('Y') - 1911]) }}"><button type="button"
                                    class="cancelbtn">返回</button></a>
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
