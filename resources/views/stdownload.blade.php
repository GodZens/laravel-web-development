@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stdownload.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.students')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                                下載專區</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('students', ['year' => date('Y') - 1911]) }}" class="color-gray"> 學生專區</a></li><span>></span>
                        <li>下載專區</li>
                    </ul>
                </div>
                <div class="col-12 mt-3 ">
                    <h3 class="download_subtitle fs-18 mx-auto"><i class="fa-solid fa-circle-arrow-right mr-2"></i>簡介</h3>
                    <table class="table table-striped download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="50%">檔案名稱</th>
                                <th scope="col" width="50%">檔案連結</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($downloads as $download)
                                <tr>
                                    <td style="width:50%">{{ $download->description }}</td>
                                    @if (substr($download->file, -3) == 'doc' || substr($download->file, -4) == 'docx')
                                    <td style="width:50%"><a href="{{ asset('download/' . $download->file) }}"><img
                                                src="{{ asset('img/doc.png') }}" alt="doc">{{ $download->file }}</a></td>
                                    @elseif (substr($download->file, -3) == 'pdf')
                                    <td style="width:50%"><a href="{{ asset('download/' . $download->file) }}"><img
                                                src="{{ asset('img/pdf.png') }}" alt="pdf">{{ $download->file }}</a></td>
                                    @else
                                    <td style="width:50%"><a href="{{ asset('download/' . $download->file) }}"><img
                                                src="{{ asset('img/odt.png') }}" alt="odt">{{ $download->file }}</a></td>
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

    <!-- 側邊選單+教育目標 -->
@endsection
@section('javascript')
@endsection
