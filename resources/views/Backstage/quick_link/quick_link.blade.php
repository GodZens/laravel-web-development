@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/quick_link/quick_link.css') }}">
@endsection
@section('content')

<div class="container-full">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <h1 class=" text-center mb-5">請選擇需快速連結 <br> 要修改的部分。</h1>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="middle">
                <a href="{{route('promote_education')}}" class="btn  btn-secondary">推廣教育</a>
                <a href="{{route('series')}}" class="btn  btn-secondary ml-2">應外系勘</a>
                <a href="{{route('library')}}" class="btn  btn-secondary ml-2">系圖書館</a>
                <a href="{{route('index')}}" class="btn  btn-danger ml-2">返回</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
@endsection
