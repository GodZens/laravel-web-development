@extends('en.layouts.layout')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/future_employment.css') }}">
@endsection
@section('content')
<div class="container ">
    <div class="row justify-content-between">
        <!-- 側邊選單 -->
        <div class="col-12 col-lg-2 side-menu mt-5">
            <h1 class="fs-20 mb-3">Future Employment Zone</h1>
            <nav>
                <a href="{{ route('en_future') }}">
                    <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Departmental Friends Graduation Outlet</span>
                </a>
                <a href="{{ route('en_statistical') }}">
                    <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Statistics in various fields</span>
                </a>
            </nav>
        </div>
        <!-- 右邊內容 -->
        <div class="col-12 col-lg-10 ">
            <div class="col-12 d-flex justify-content-between ">
                <span>
                    <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                        future employment</b></h1>
                </span>
                <ul class="d-flex ">
                    <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                    <li><a href="{{ route('en_students', ['year' => date('Y') - 1911]) }}" class="color-gray"> Student Zone</a></li><span>></span>
                    <li>future employment</li>
                </ul>
            </div>
            <div class="col-12 mt-3">
                <table class=" shared_table  table-border table">
                    <thead>
                        <tr>
                            <th scope="col" width="50%" >Service Units</th>
                            <th scope="col" width="50%" >Unit department and job title</th>
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
@endsection
@section('javascript')
@endsection
