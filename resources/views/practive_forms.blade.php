@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/practive_forms.css') }}">
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
                                相關表單</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('students', ['year' => date('Y') - 1911]) }}" class="color-gray"> 學生專區</a>
                        </li><span>></span>
                        <li> 相關表單</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class="table table-striped download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="40%">檔案名稱</th>
                                <th scope="col" width="20%">PDF</th>
                                <th scope="col" width="20%">WORD</th>
                                <th scope="col" width="20%">ODT</th>
                            </tr>
                        </thead>
                        @foreach ($toprelatedforms as $toprelatedform)
                            <tbody>
                                <tr>
                                    <th style="width:40%" scope="row">{{ $toprelatedform->description }}</th>
                                    @if (substr($toprelatedform->file, -3) == 'pdf')
                                        <td style="width:20%"><a
                                                href="{{ asset('download/' . $toprelatedform->file) }}"><img
                                                    src="{{ asset('img/pdf.png') }}"
                                                    alt="pdf">{{ $toprelatedform->file }}</a></td>
                                    @else
                                        <td style="width:20%"></td>
                                    @endif
                                    @if (substr($toprelatedform->file_word, -3) == 'doc' || substr($toprelatedform->file_word, -4) == 'docx')
                                        <td style="width:20%"><a
                                                href="{{ asset('download/' . $toprelatedform->file_word) }}"><img
                                                    src="{{ asset('img/doc.png') }}"
                                                    alt="doc">{{ $toprelatedform->file_word }}</a></td>
                                    @else
                                        <td style="width:20%"></td>
                                    @endif
                                    @if (substr($toprelatedform->file_odt, -3) == 'odt')
                                        <td style="width:20%"><a
                                                href="{{ asset('download/' . $toprelatedform->file_odt) }}"><img
                                                    src="{{ asset('img/odt.png') }}"alt="odt">{{ $toprelatedform->file_odt }}</a>
                                        </td>
                                    @else
                                        <td style="width:20%"></td>
                                    @endif
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
