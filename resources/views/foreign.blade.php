@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/foreign.css') }}">
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
                                學生得獎紀錄</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('foreign', ['year' => date('Y') - 1911]) }}" class="color-gray">應外風雲榜</a></li>
                        <span>></span>
                        <li>學生得獎紀錄</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('foreign') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='foreign?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="20%">參賽者</th>
                                <th scope="col" width="20%">得獎名次</th>
                                <th scope="col" width="40%">競賽名稱</th>
                                <th scope="col" width="20%">指導老師</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentcompetitions as $studentcompetition)
                                <tr>
                                    <td style="width:20%" scope="row">
                                        @foreach ($students as $student)
                                            @if ($student->sid == $studentcompetition->id)
                                                {{ $student->name }}<br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="width:20%" scope="row">{{ $studentcompetition->ranking }}</td>
                                    <td style="width:40%">{{ $studentcompetition->projectname }}</td>
                                    <td style="width:20%">{{ $studentcompetition->t_name }}</td>
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
