@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_plan/department_plan.css') }}">
@endsection
@section('content')
    <div class="container-full">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class=" text-center mb-5">請選擇需產學連結 <br> 要修改的部分。</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="middle">
                    <a href="{{route('add_depart_year_view')}}" class="btn  btn-secondary ml-2">新增學年度</a>
                    <a href="{{route('delete_depart_year_view')}}" class="btn  btn-secondary ml-2">刪除學年度</a>
                    <a href="{{route('partner')}}" class="btn  btn-secondary">合作廠商</a>
                    <a href="{{route('cooperation')}}" class="btn  btn-secondary ml-2">業界合作計畫</a>
                    <a href="{{route('technology_plan')}}" class="btn  btn-secondary ml-2">科技部計畫</a>
                    <a href="{{route('back_government')}}" class="btn  btn-secondary ml-2">政府部門補助</a>
                    <a href="{{route('index')}}" class="btn  btn-danger ml-2">返回</a>
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
