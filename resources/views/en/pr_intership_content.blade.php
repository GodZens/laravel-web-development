@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pr_intership_content.css') }}">
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
                            Previous internship units</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_students', ['year' => date('Y') - 1911]) }}" class="color-gray">Student Zone</a>
                        </li><span>></span>
                        <li> Previous internship units</li>
                    </ul>
                </div>
                <!-- 分頁 -->
                @foreach ($internships as $internship)
                    <div class="list-wrapper">
                        <div class="list-item mb-4">

                            <table class="table table-bordered fs-25">
                                <tbody>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">Internships</th>
                                        <td>{{ $internship->eunit }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">contact person</th>
                                        <td>{{ $internship->people }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">contact number</th>
                                        <td>{{ $internship->number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {!! $internship->content_en !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
