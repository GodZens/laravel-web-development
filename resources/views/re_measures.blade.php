@extends('layouts.layout')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/re_measures.css') }}">
@endsection
@section('content')
<div class="container ">
    <div class="row justify-content-between">
        @include('sidebar.thesis')
        <!-- 右邊內容 -->
        <div class="col-12 col-lg-10 ">
            <div class="col-12 d-flex justify-content-between ">
                <span>
                    <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                        相關辦法</b></h1>
                </span>
                <ul class="d-flex ">
                    <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                    <li><a href="{{ route('students',['year' => date('Y')-1911]) }}" class="color-gray"> 學生專區</a></li><span>></span>
                    <li>相關辦法</li>

                </ul>
            </div>

            <div class="col-12 mt-3">
                <table class=" shared_table  table-border table">
                    <thead>
                        <tr>
                            <th scope="col" width="70%" >檔案名稱</th>
                            <th scope="col" width="30%" >檔案</th>
                        </tr>
                    </thead>
                    @foreach ( $thesismethods as $thesismethod)
                    <tbody>
                        <tr>
                            <th style="width:70%" scope="row">{{$thesismethod->description}}</th>
                            <td style="width:30%" ><a href="{{ asset('download/' . $thesismethod->file) }}"><img src="{{ asset('img/pdf.png') }}" alt="pdf">{{$thesismethod->file}}</a></td>
                        </tr>
                    </tbody>
                    @endforeach
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
