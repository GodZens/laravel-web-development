@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/foreignseries.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-12 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                應外系刊</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('foreignseries') }}" class="color-gray">應外系刊</a></li>

                    </ul>
                </div>
                <div class="row">
                    <div class="col-6">
                        <table class="table table-striped shared_table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="70%">上學期檔案</th>
                                    <th scope="col" width="30%">檔案連結</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semester_1 as $semester)
                                    <tr>
                                        <th scope="row" width="70%">{{ $semester->title }}</th>
                                        <td>
                                            @if ($semester->file!=null)
                                            <a href="{{ asset('download/'.$semester->file) }}"><img src="{{ asset('img/doc.png') }}"
                                                alt=""></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-striped shared_table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="70%">下學期檔案</th>
                                    <th scope="col" width="30%">檔案連結</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semester_2 as $semester)
                                <tr>
                                    <th scope="row" width="70%">{{ $semester->title }}</th>
                                    <td>
                                        @if ($semester->file!=null)
                                        <a href="{{ asset('download/'.$semester->file) }}"><img src="{{ asset('img/doc.png') }}"
                                            alt=""></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 側邊選單+教育目標 -->
@endsection
@section('javascript')
@endsection
