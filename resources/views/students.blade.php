@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/student.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.students')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                學生作品</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('students',['year' => date('Y')-1911]) }}" class="color-gray"> 學生專區</a></li><span>></span>
                        <li>學生作品</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('students') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='students?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($options_year as $option_year)
                                <option value="{{ $option_year->year }}">{{ $option_year->year }}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="20%">學生姓名</th>
                                <th scope="col" width="60%">作品題目</th>
                                <th scope="col" width="20%">指導老師</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentworks as $studentwork)
                                <tr>
                                    <th style="width:20%" scope="row">{{ $studentwork->name }}</th>
                                    <td style="width:60%"><a href="{{ route('students_content',['id' => $studentwork->student_id]) }}">{{ $studentwork->topic }}</a></td>
                                    <td style="width:20%">{{ $studentwork->teacher }}</td>
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
