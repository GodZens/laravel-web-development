@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stdownload.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.students')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                            Downloads</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_students', ['year' => date('Y') - 1911]) }}" class="color-gray"> Student Zone</a></li><span>></span>
                        <li>Downloads</li>
                    </ul>
                </div>
                <div class="col-12 mt-3 ">
                    <h3 class="download_subtitle fs-18 mx-auto"><i class="fa-solid fa-circle-arrow-right mr-2"></i>Introduction</h3>
                    <table class="table table-striped download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="50%">file name</th>
                                <th scope="col" width="50%">file link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($downloads as $download)
                                <tr>
                                    <td style="width:50%">{{ $download->edescription }}</td>
                                    @if (substr($download->file_en, -3) == 'doc' || substr($download->file_en, -4) == 'docx')
                                    <td style="width:50%"><a href="{{ asset('download/' . $download->file_en) }}"><img
                                                src="{{ asset('img/doc.png') }}" alt="doc">{{ $download->file_en }}</a></td>
                                    @elseif (substr($download->file_en, -3) == 'pdf')
                                    <td style="width:50%"><a href="{{ asset('download/' . $download->file_en) }}"><img
                                                src="{{ asset('img/pdf.png') }}" alt="pdf">{{ $download->file_en }}</a></td>
                                    @else
                                    <td style="width:50%"><a href="{{ asset('download/' . $download->file_en) }}"><img
                                                src="{{ asset('img/odt.png') }}" alt="odt">{{ $download->file_en }}</a></td>
                                    @endif
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
@endsection
