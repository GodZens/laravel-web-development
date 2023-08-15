@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/f_teacher.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.foreign')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                教師獲獎榮譽</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('foreign', ['year' => date('Y') - 1911]) }}" class="color-gray">應外風雲榜</a></li>
                        <span>></span>
                        <li>教師獲獎榮譽</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="20%">教師姓名</th>
                                <th scope="col" width="80%">獲獎榮譽</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($names as $name)
                                <tr>
                                    <td style="width:20%">{{ $name->name }}</td>
                                    <td style="width:80%">
                                        @foreach ($honors as $honor)
                                            @if ($honor->name == $name->name)
                                                {{ $honor->description }}<br>
                                            @endif
                                        @endforeach
                                    </td>
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
    <script>
        // 碰到該物件自動觸發click事件
        $('.dropdown').hover(function() {
            $('.dropdown-toggle').trigger('click');
        });
    </script>
@endsection
