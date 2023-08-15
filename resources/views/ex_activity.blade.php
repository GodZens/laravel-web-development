@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ex_activity.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.ex_student')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                活動照片</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('ex_student') }}" class="color-gray">國際交換生</a></li>
                        <span>></span>
                        <li>活動照片</li>

                    </ul>
                </div>
                <div class="col-12">
                    <table class="equipment_table w-100" border="1px">
                        <tbody>
                            <tr>
                                <td><strong><span>活動照片</span></strong></td>
                                <td><strong><span>心得</span></strong></td>
                            </tr>
                            @foreach ( $studentphotos as $studentphoto)
                            <tr>
                                <td class="text-center" width="50%">
                                    <span class="d-block">{{$studentphoto->title}}</span>
                                    <img class="w-100 classroom_pic" src="{{ asset('download/'.$studentphoto->image) }}" alt="活動照片">
                                </td>
                                <td class="text-center" width="50%">
                                    <ul>
                                        <li>{{$studentphoto->description}}</li>
                                    </ul>
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
