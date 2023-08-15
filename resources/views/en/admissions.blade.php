@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admissions.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.admissions')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            University Department</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}" class="color-gray">Admissions</a></li>
                        <span>></span>
                        <li>University Department</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('en_admissions') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='en_admissions?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ($admissions_years as $admissions_year)
                                <option value="{{ $admissions_year->year }}">{{ $admissions_year->year }}</option>
                            @endforeach
                        </select>&nbsp;category
                    </form>
                </div>
                <div class="col-12 mt-3">
                    @foreach ($admissions as $admission)
                        {!! $admission->content !!}
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
