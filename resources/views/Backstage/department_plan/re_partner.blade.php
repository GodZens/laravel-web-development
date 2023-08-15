@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_plan/re_partner.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($re_partners as $re_partner)
        <div class="row">
            <div class="col-12">
                <h1>新增合作廠商計畫</h1>
                <hr>
                <form action="{{ route('re_partner',['id' => $re_partner->id]) }}" method="POST">
                    @csrf
                    <label for="name-ch"><b>廠商名稱(中文)</b></label>
                    <input type="text" name="name-ch" value="{{ $re_partner->firm }}" required>
                    <label for="name-eng"><b>廠商名稱(英文)</b></label>
                    <input type="text" name="name-eng" value="{{ $re_partner->efirm }}" required>
                    <div class="clearfix  mt-3">
                        <button type="submit" class="signupbtn">修改</button>
                        <a href="{{ route('partner') }}"><button type="button" class="cancelbtn signupbtn">返回</button></a>
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
