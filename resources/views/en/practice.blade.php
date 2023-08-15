@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/practice.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.practicearea')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                                Implementation Measures</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_students', ['year' => date('Y') - 1911]) }}" class="color-gray"> Student
                                Zone</a></li><span>></span>
                        <li> Implementation Measures</li>
                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('en_practice') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='en_practice?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12 mt-3">
                    @foreach ($specialtopic_methods as $specialtopic_method)
                        @if ($specialtopic_method->lang == '英')
                            {!! $specialtopic_method->dtext !!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
