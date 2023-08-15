@extends('layouts.layout')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/future_employment.css') }}">
@endsection
@section('content')
<div class="container ">
    <div class="row justify-content-between">
        <!-- 側邊選單 -->
        <div class="col-12 col-lg-2 side-menu mt-5">
            <h1 class="fs-20 mb-3">未來就業專區</h1>
            <nav>
                <a href="{{ route('future') }}">
                    <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">系友畢業出路</span>
                </a>
                <a href="{{ route('statistical') }}">
                    <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">各領域統計資料</span>
                </a>
            </nav>
        </div>
        <!-- 右邊內容 -->
        <div class="col-12 col-lg-10 ">
            <div class="col-12 d-flex justify-content-between ">
                <span>
                    <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                        未來就業</b></h1>
                </span>
                <ul class="d-flex ">
                    <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                    <li><a href="{{ route('students', ['year' => date('Y') - 1911]) }}" class="color-gray"> 學生專區</a></li><span>></span>
                    <li>未來就業</li>
                </ul>
            </div>
            <div class="col-12 mt-3">
                <table class=" shared_table  table-border table">
                    <thead>
                        <tr>
                            <th scope="col" width="50%" >服務單位</th>
                            <th scope="col" width="50%" >單位部門及職稱</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $future_employments as $future_employment)
                            <tr>
                                <th style="width:50%" scope="row">{{$future_employment->unit}}</th>
                                <td style="width:50%" >{{$future_employment->department}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 側邊選單+教育目標 -->

<!-- 側邊選單+教育目標 -->
@endsection
@section('javascript')
@endsection
