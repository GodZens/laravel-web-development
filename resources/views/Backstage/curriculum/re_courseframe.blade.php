@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/curriculum/re_courseframe.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($courseframes as $courseframe)
            <form action="{{ route('re_courseframe', ['id' => $courseframe->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改課程架構圖</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        <div class="col-12 p-0 mb-2">
                            <span class="mr-3">學年度</span>
                            <select name="year">
                                <option value="0">請選擇</option>
                                @foreach ($courseframe_years as $courseframe_year)
                                    <option value="{{ $courseframe_year->year }}"
                                        {{ $courseframe->year == $courseframe_year->year ? 'selected' : '' }}>
                                        {{ $courseframe_year->year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="file_name" class="d-block"><b>檔案名稱</b></label>
                        <div class="col-12 p-0 mb-2">
                            <label for="file" class="d-block"><b>{{ $courseframe->file }}</b></label>
                            <input type="file" name="file" id="file">
                        </div>
                        <p>若修改檔案，舊檔案則會被刪除~!!!</p>
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
