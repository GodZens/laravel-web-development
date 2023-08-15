@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/re_forms.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.thesis')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                相關表單</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('students', ['year' => date('Y') - 1911]) }}" class="color-gray"> 學生專區</a>
                        </li>
                        <span>></span>
                        <li>相關表單</li>

                    </ul>
                </div>

                <div class="col-12 mt-3">
                    <table class="table download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="40%">檔案名稱</th>
                                <th scope="col" width="20%">PDF</th>
                                <th scope="col" width="20%">WORD</th>
                                <th scope="col" width="20%">ODT</th>
                            </tr>
                        </thead>
                        @foreach ($thesisdownloads as $thesisdownload)
                            <tbody>
                                <tr>
                                    <th style="width:40%" scope="row">{{ $thesisdownload->description }}</th>
                                    @if (substr($thesisdownload->file, -3) == 'pdf')
                                        <td style="width:20%"><a
                                                href="{{ asset('download/' . $thesisdownload->file) }}"><img
                                                    src="{{ asset('img/pdf.png') }}"
                                                    alt="pdf">{{ $thesisdownload->file }}</a></td>
                                    @else
                                        <td style="width:20%"></td>
                                    @endif
                                    @if (substr($thesisdownload->file, -3) == 'doc' || substr($thesisdownload->file, -4) == 'docx')
                                        <td style="width:20%"><a
                                                href="{{ asset('download/' . $thesisdownload->file) }}"><img
                                                    src="{{ asset('img/doc.png') }}"
                                                    alt="doc">{{ $thesisdownload->file }}</a></td>
                                    @else
                                        <td style="width:20%"></td>
                                    @endif
                                    @if (substr($thesisdownload->file, -3) == 'odt')
                                        <td style="width:20%"><a
                                                href="{{ asset('download/' . $thesisdownload->file) }}"><img
                                                    src="{{ asset('img/odt.png') }}"alt="odt">{{ $thesisdownload->file }}</a>
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
