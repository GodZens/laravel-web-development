@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/retiredteacher.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.teacher')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                退休人員</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{route('teacher')}}" class="color-gray"> 系所師資</a></li><span>></span>
                        <li>退休人員</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="10%">教師姓名</th>
                                <th scope="col" width="30%">教學內容</th>
                                <th scope="col" width="25%">學歷</th>
                                <th scope="col" width="30%">聯絡方式</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $reteachers as $reteacher)
                            <tr>
                                <th scope="row" width="15%">{{$reteacher->name}}</th>
                                <td width="30">{{$reteacher->ability}}</td>
                                <td width="30">{{$reteacher->education}}</td>
                                <td width="30"><a href="mailto:{{$reteacher->email}}">{{$reteacher->email}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
