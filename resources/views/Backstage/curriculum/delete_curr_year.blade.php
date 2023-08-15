@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/curriculum/delete_curr_year.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>刪除學年度</b></h1>
                <form action="{{ route('delete_curr_year') }}" method="POST" class="col-12">
                    @csrf
                    <div class="col-8 m-auto ">
                        <span class="mr-3">目前的學年度</span>
                        <select name="delete_year">
                            <option value="0">請選擇</option>
                            @foreach ($courseframe_years as $courseframe_year)
                                <option value="{{ $courseframe_year->year }}">{{ $courseframe_year->year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="clearfix mt-5">
                        <button type="submit" class="signupbtn">刪除</button>
                        <a href="{{ route('back_curriculum') }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('success') }}
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
