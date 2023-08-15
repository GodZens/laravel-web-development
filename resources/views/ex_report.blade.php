@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ex_report.css') }}">
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
                                交換心得報告</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('ex_student') }}" class="color-gray">國際交換生</a></li>
                        <span>></span>
                        <li>交換心得報告</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <form action="{{ route('ex_report') }}" method='POST'>
                        @csrf
                        <select name="country" onchange="location.href='ex_report?country='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($countrys as $country)
                                <option value="{{ $country->country }}">{{ $country->country }}</option>
                            @endforeach
                        </select>&nbsp;國家
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class="equipment_table w-100" border="1px">
                        <tbody>
                            <tr>
                                <td><strong><span>系所班級</span></strong></td>
                                <td><strong><span>姓名</span></strong></td>
                                <td><strong><span>國家/學校</span></strong></td>
                                <td><strong><span>檔案</span></strong></td>
                            </tr>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->dep }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->school }}</td>
                                    <td><a href="{{ asset('download/' . $report->file) }}">{{ $report->file }}<img
                                                src="{{ asset('img/pdf.png') }}"alt="pdf"></a></td>
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
