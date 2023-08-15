@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_practical_topics/re_pt_download.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($toprelatedforms as $toprelatedform)
            <form action="{{ route('re_pt_download',['id' => $toprelatedform->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改下載檔案</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        <label for="file-description"><b>檔案描述(中文)</b></label>
                        <input type="text" name="file-description" value="{{$toprelatedform->description}}" required>

                        <label for="file-description-eng"><b>檔案描述(英文)</b></label>
                        <input type="text" name="file-description-eng" value="{{$toprelatedform->edescription}}" required>

                        <div class="col-12 p-0 mb-2">
                            <label for="file-pdf" class="d-block"><b>檔案(PDF)</b></label>
                            <input type="file" name="file-pdf" id="file-pdf">
                        </div>

                        <div class="col-12 p-0 mb-2">
                            <label for="file-word" class="d-block"><b>檔案(WORD)</b></label>
                            <input type="file" name="file-word" id="file-word">
                        </div>
                        <div class="col-12 p-0 mb-2">
                            <label for="file-odt" class="d-block"><b>檔案(ODT)</b></label>
                            <input type="file" name="file-odt" id="file-odt">
                        </div>
                        <div class="col-12 p-0 mb-2">
                            <label for="file-eng" class="d-block"><b>檔案(英文)</b></label>
                            <input type="file" name="file-eng" id="file-eng">
                        </div>
                        <p style="font-size:20px">若要修改檔案請重新上傳， 否則請勿更動。</p>
                        <div class="clearfix">
                            <button type="submit" class="signupbtn">修改
                            </button>
                            <a href="{{ route('practical_topics') }}"><button type="button"
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
