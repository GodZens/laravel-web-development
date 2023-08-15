@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pr_intership_content.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.practicearea')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                                歷屆實習單位</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('students', ['year' => date('Y') - 1911]) }}" class="color-gray">學生專區</a>
                        </li><span>></span>
                        <li> 歷屆實習單位</li>
                    </ul>
                </div>
                <!-- 分頁 -->
                @foreach ($internships as $internship)
                    <div class="list-wrapper">
                        <div class="list-item mb-4">

                            <table class="table table-bordered fs-25">
                                <tbody>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">實習單位</th>
                                        <td>{{ $internship->unit }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">聯絡人</th>
                                        <td>{{ $internship->people }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">連絡電話</th>
                                        <td>{{ $internship->number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {!! $internship->content !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
