@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/st_exchange.css') }}">
@endsection
@section('content')
    <div class="container-full">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class=" text-center mb-5">請選擇國際交換生 <br> 需修改的部分。</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="middle">
                    <a href="{{route('petition_form')}}" class="btn  btn-secondary">申請資格</a>
                    <a href="{{route('student_list',['year' => date('Y')-1911])}}" class="btn  btn-secondary ml-2">交換生名單</a>
                    <a href="{{route('report')}}" class="btn  btn-secondary ml-2">學習心得報告</a>
                    <a href="{{route('activity_photo')}}" class="btn  btn-secondary ml-2">活動照片</a>
                    <a href="{{route('keyaffair')}}" class="btn  btn-danger ml-2">返回</a>
                </div>

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
