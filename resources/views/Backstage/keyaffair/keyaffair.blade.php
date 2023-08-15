@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/keyaffair.css') }}">
@endsection
@section('content')

<div class="container-full">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <h1 class=" text-center mb-5">請選擇重點事務需要修改的部分。</h1>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="middle">
                <a href="{{route('ka_billboard')}}" class="btn  btn-secondary">應外風雲榜</a>
                <a href="{{route('double_education')}}" class="btn  btn-secondary ml-2">國際雙連制度</a>
                <a href="{{route('st_exchange')}}" class="btn  btn-secondary ml-2">國際交換生</a>
                <a href="{{route('admission')}}" class="btn  btn-secondary ml-2">招生專區</a>
                <a href="{{route('meeting')}}" class="btn  btn-secondary ml-2">系務會議</a>
                <a href="{{route('industry',['year' => date('Y')-1911])}}" class="btn  btn-secondary ml-2">學生產業實習</a>
                <a href="{{route('index')}}" class="btn  btn-danger ml-2">返回</a>
            </div>

        </div>

    </div>
</div>
@endsection
@section('javascript')
@endsection
