@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/f_certificate.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.foreign')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            Certificate statistics table</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_foreign', ['year' => date('Y') - 1911]) }}" class="color-gray">Foreign Billboard</a></li>
                        <span>></span>
                        <li>Certificate statistics table</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('en_f_certificate') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='en_f_certificate?year='+this.value">
                            <option value="0">please choos</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}</option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <h3 class="col-12 mt-3">University Department Graduation Threshold Criteria</h3>
                <div class="col-12 mt-3">
                    @foreach ($licenses_c as $license_c)
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th scope="col" width="30%">number of students</th>
                                    <th scope="col" width="30%">highest score</th>
                                    <th scope="col" width="40%">The total number of graduation thresholds passed</th>
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
                        {!! $licensecollege->dtext_en !!}
                    @endforeach
                </div>

                <h3 class="col-12 mt-3">Graduate School Graduation Threshold Criteria</h3>
                <div class="col-12 mt-3">
                    @foreach ($licenses_cold as $license_cold)
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th scope="col" width="30%">number of students</th>
                                    <th scope="col" width="30%">highest score</th>
                                    <th scope="col" width="40%">The total number of graduation thresholds passed</th>
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
                        {!! $licenseoldcollege->dtext_en !!}
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
