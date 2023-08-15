@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/depnews_content.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.depnews')
            <div class="col-12 col-lg-10">
                @foreach ($DAS as $DA)
                    <div class="d-flex justify-content-between ">
                        <h1 class="fs-18 color-red mt-5  height-25 shared-title"><b>
                                {{ $DA->type }}</b></h1>
                        <ul class="d-flex ">
                            <li><a href="{{ route('Home') }}" class="color-gray">首頁</a></li><span>></span>
                            <li><a href="{{ route('depnews', ['id' => '0']) }}" class="color-gray">系所公告</a></li><span>></span>
                            <li>{{ $DA->type }}</li>
                        </ul>
                    </div>
                    <!-- 分頁 -->
                    <div class="list-wrapper">
                        <div class="list-item mb-4">

                            <table class="table table-bordered fs-25">
                                <tbody>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">標題</th>
                                        <td>{{ $DA->title }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">張貼日</th>
                                        <td>{{ $DA->date }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">截止日</th>
                                        <td>{{ $DA->deadline }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {!! $DA->content !!}

                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-3">
                    <h3 class="download_subtitle fs-18"><i class="fa-solid fa-circle-arrow-right mr-2"></i>相關檔案與連結</h3>
                    <table class="table table-striped download_table table-borderepdfd">
                        <thead>
                            <tr>
                                <th scope="col" width="30%">檔案名稱</th>
                                <th scope="col" width="70%">檔案連結</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DAS_links as $DAS_link)
                                <tr>
                                    <td>{{ $DAS_link->description }}</td>
                                    <td>
                                        <a href="{{ $DAS_link->link }}">{{ $DAS_link->link }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($DAS_files as $DAS_file)
                                <tr>
                                    <td>{{ $DAS_file->description }}</td>
                                    <td>
                                        @if (substr($DAS_file->file, -3) == 'doc' || substr($DAS_file->file, -4) == 'docx')
                                            <a href="{{ asset('download/' . $DAS_file->file) }}"><img
                                                    src="{{ asset('img/doc.png') }}"
                                                    alt="doc">{{ $DAS_file->file }}</a>
                                        @elseif (substr($DAS_file->file, -3) == 'pdf')
                                            <a href="{{ asset('download/' . $DAS_file->file) }}"><img
                                                    src="{{ asset('img/pdf.png') }}"
                                                    alt="pdf">{{ $DAS_file->file }}</a>
                                        @else
                                            <a href="{{ asset('download/' . $DAS_file->file) }}"><img
                                                    src="{{ asset('img/odt.png') }}"
                                                    alt="odt">{{ $DAS_file->file }}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('javascript')
    @endsection
