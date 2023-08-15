@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/f_outstanding.css') }}">
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
                            畢業系友傑出表現</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('foreign', ['year' => date('Y') - 1911]) }}" class="color-gray">應外風雲榜</a></li>
                        <span>></span>
                        <li>畢業系友傑出表現</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="20%">學生姓名</th>
                                <th scope="col" width="60%">獲獎榮譽</th>
                                <th scope="col" width="20%">類別</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outstandings as $outstanding)
                                <tr>
                                    <td style="width:20%">{{ $outstanding->name }}</td>
                                    <td style="width:60%">{{ $outstanding->description }}</td>
                                    <td style="width:20%">{{ $outstanding->mode }}</td>
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
