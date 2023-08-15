@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home_page.css') }}">
@endsection
@section('content')
    <!-- 輪播圖 -->
    <div class="container p-0">
        <div class="row justify-content-center m-0">
            <div class="home_carousel col-12">
                <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($frontpics as $frontpic)
                            @if ($loop->first)
                                <div class="carousel-item active" data-interval="2000">
                                    <img src="{{ asset('frontpics/' . $frontpic->file) }}" class="d-block w-100">
                                </div>
                            @else
                                <div class="carousel-item " data-interval="2000">
                                    <img src="{{ asset('frontpics/' . $frontpic->file) }}" class="d-block w-100">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- 系所公告+相關連結 -->
    <div class="container p-0 mt-3">
        <div class="row justify-content-center m-0">
            <div class="col-lg-9 col-12  announcement">
                <img src="{{ asset('img/系所公告.jpg') }}" alt="系所公告">
                <span class="dottedline d-block"></span>
                <!-- 各條消息 -->
                @foreach ($DAS as $DA)
                    <h2>
                        <span>
                            {{ substr($DA->date, 0, 10) }}
                        </span>
                        <a href="{{ route('depnews_content', ['id' => $DA->id]) }}">
                            <strong>
                                {{ $DA->title }}
                            </strong>
                        </a>
                    </h2>
                @endforeach
                <!-- 活動訊息 -->
                <img class="mt-3" src="{{ asset('img/活動訊息.jpg') }}" alt="活動訊息">
                <span class="dottedline d-block"></span>
                @foreach ($ENS as $EN)
                    <h2>
                        <span>
                            {{ substr($EN->date, 0, 10) }}
                        </span>
                        <a href="{{ route('depnews_content', ['id' => $EN->id]) }}">
                            <strong>
                                {{ $EN->title }}
                            </strong>
                        </a>
                    </h2>
                @endforeach
                <!-- 榮譽榜 -->
                <img class="mt-3" src="{{ asset('img/榮譽榜.jpg') }}" alt="榮譽榜">
                <span class="dottedline d-block"></span>
                @foreach ($HRS as $HR)
                    <h2>
                        <span>
                            {{ substr($HR->date, 0, 10) }}
                        </span>
                        <a href="{{ route('depnews_content', ['id' => $HR->id]) }}">
                            <strong>
                                {{ $HR->title }}
                            </strong>
                        </a>
                    </h2>
                @endforeach
                <!-- 徵才公告 -->
                <img class="mt-3" src="{{ asset('img/徵才公告.jpg') }}" alt="徵才公告">
                <span class="dottedline d-block"></span>
                @foreach ($RAS as $RA)
                    <h2>
                        <span>
                            {{ substr($RA->date, 0, 10) }}
                        </span>
                        <a href="{{ route('depnews_content', ['id' => $RA->id]) }}">
                            <strong>
                                {{ $RA->title }}
                            </strong>
                        </a>
                    </h2>
                @endforeach
            </div>
            <div class="col-lg-2 col-12 ">
                <a href="#" class="mt-2">
                    <img src="./相關連結.jpg" alt="">
                </a>
                <span class="dottedline d-block"></span>
                <!-- 相關連結 -->
                <span class="d-block">
                    <a href="{{ route('foreign', ['year' => date('Y') - 1911]) }}">
                        <img class="teacher-pic" src="{{ asset('img/應外風雲榜.png') }}" alt="應外風雲榜">
                    </a>
                    <b class="b_text">應外風雲榜</b>
                </span>
                <span class="d-block">
                    <a href="{{ route('admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}">
                        <img class="teacher-pic" src="{{ asset('img/招生專區.png') }}" alt="招生專區">
                    </a>
                    <b class="b_text">招生專區</b>
                </span>
                <span class="d-block">
                    <a href="{{ route('ex_student') }}">
                        <img class="teacher-pic" src="{{ asset('img/國際交換生.png') }}" alt="國際交換生">
                    </a>
                    <b class="b_text">國際交換生</b>
                </span>
                <span class="d-block">
                    <a href="{{route('foreignseries', ['title' => '91學年度第二學期','page' => 1])}}">
                        <img class="teacher-pic" src="{{ asset('img/應外系刊.png') }}" alt="應外系刊">
                    </a>
                    <b class="b_text">應外系刊</b>
                </span>
                <span class="d-block">
                    <a href="{{route('de_meeting')}}">
                        <img class="teacher-pic" src="{{ asset('img/系務會議.png') }}" alt="系務會議">
                    </a>
                    <b class="b_text">系務會議</b>
                </span>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        // 碰到該物件自動觸發click事件
        $('.dropdown').hover(function() {
            $('.dropdown-toggle').trigger('click');
        });
    </script>
@endsection
