@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/depnews_content.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.depnews')
            <div class="col-12 col-lg-10">
                @foreach ($DAS as $DA)
                    <div class="d-flex justify-content-between ">
                        <h1 class="fs-18 color-red mt-5  height-25 shared-title"><b>
                                {{ $DA->etype }}</b></h1>
                        <ul class="d-flex ">
                            <li><a href="{{ route('en_home') }}" class="color-gray">front page</a></li><span>></span>
                            <li><a href="{{ route('en_depnews', ['id' => '0']) }}" class="color-gray">Department announcement</a></li><span>></span>
                            <li>{{ $DA->etype }}</li>
                        </ul>
                    </div>
                    <!-- 分頁 -->
                    <div class="list-wrapper">
                        <div class="list-item mb-4">

                            <table class="table table-bordered fs-25">
                                <tbody>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">title</th>
                                        <td>{{ $DA->etitle }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">posting day</th>
                                        <td>{{ $DA->date }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary" style="width:20%" scope="row">deadline</th>
                                        <td>{{ $DA->deadline }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {!! $DA->econtent !!}

                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-3">
                    <h3 class="download_subtitle fs-18"><i class="fa-solid fa-circle-arrow-right mr-2"></i>Related Files and Links</h3>
                    <table class="table table-striped download_table table-borderepdfd">
                        <thead>
                            <tr>
                                <th scope="col" width="30%">file name</th>
                                <th scope="col" width="70%">file link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DAS_links as $DAS_link)
                                <tr>
                                    <td>{{ $DAS_link->edescription }}</td>
                                    <td>
                                        <a href="{{ $DAS_link->link }}">{{ $DAS_link->link }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($DAS_files as $DAS_file)
                                <tr>
                                    <td>{{ $DAS_file->edescription }}</td>
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
