@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/st_activity_content.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.students')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            Student Activities</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_students',['year' => date('Y')-1911]) }}" class="color-gray"> Student Zone</a></li><span>></span>
                        <li>Student Activities</li>

                    </ul>
                </div>
                <!-- 分頁 -->
                <div class="list-wrapper">
                    <div class="list-item mb-4">
                        @foreach ($studentsactivitys as $studentsactivity)
                            <table class="table table-bordered fs-25">
                                <tbody>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">date</th>
                                        <td>{{ $studentsactivity->date }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">place</th>
                                        <td>{{ $studentsactivity->location_en }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">name</th>
                                        <td>{{ $studentsactivity->activityname_en }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {!! $studentsactivity->activitycontent_en !!}
                        @endforeach
                    </div>
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
