@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/f_certificate.css') }}">
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
                                證照統計表</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('foreign', ['year' => date('Y') - 1911]) }}" class="color-gray">應外風雲榜</a></li>
                        <span>></span>
                        <li>證照統計表</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('f_certificate') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='f_certificate?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <h3 class="col-12 mt-3">大學部畢業門檻標準</h3>
                <div class="col-12 mt-3">
                    @foreach ($licenses_c as $license_c)
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th scope="col" width="30%">學生數</th>
                                    <th scope="col" width="30%">最高分</th>
                                    <th scope="col" width="40%">畢業門檻總通過數</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:30%">{{ $license_c->student }}</td>
                                    <td style="width:30%">{{ $license_c->top_score }}</td>
                                    <td style="width:40%">{{ $license_c->graduation }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="chartp"><img
                                src="http://chart.apis.google.com/chart?cht=p3&chd=t:{{ $license_c->graduation }},{{ $license_c->student - $license_c->graduation }}&chs=400x200&chl=%E9%80%9A%E9%81%8E|%E6%9C%AA%E9%80%9A%E9%81%8E"
                                width="400px" height="200px" /></div>
                    @endforeach
                    @foreach ($licensecolleges as $licensecollege)
                        {!! $licensecollege->dtext !!}
                    @endforeach
                </div>

                <h3 class="col-12 mt-3">研究所畢業門檻標準</h3>
                <div class="col-12 mt-3">
                    @foreach ($licenses_cold as $license_cold)
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th scope="col" width="30%">學生數</th>
                                    <th scope="col" width="30%">最高分</th>
                                    <th scope="col" width="40%">畢業門檻總通過數</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:30%">{{ $license_cold->student }}</td>
                                    <td style="width:30%">{{ $license_cold->top_score }}</td>
                                    <td style="width:40%">{{ $license_cold->graduation }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="chartp"><img
                                src="http://chart.apis.google.com/chart?cht=p3&chd=t:{{ $license_cold->graduation }},{{ $license_cold->student - $license_cold->graduation }}&chs=400x200&chl=%E9%80%9A%E9%81%8E|%E6%9C%AA%E9%80%9A%E9%81%8E"
                                width="400px" height="200px" /></div>
                    @endforeach
                    @foreach ($licenseoldcolleges as $licenseoldcollege)
                        {!! $licenseoldcollege->dtext !!}
                    @endforeach
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
