@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/re_forms.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.thesis')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            related form</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_students', ['year' => date('Y') - 1911]) }}" class="color-gray"> Student Zone</a>
                        </li>
                        <span>></span>
                        <li>related form</li>

                    </ul>
                </div>

                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="70%">file name</th>
                                <th scope="col" width="30%">file</th>
                            </tr>
                        </thead>
                        @foreach ($thesisdownloads as $thesisdownload)
                            <tbody>
                                <tr>
                                    <th style="width:70%" scope="row">{{ $thesisdownload->edescription }}</th>
                                    @if (substr($thesisdownload->file_en, -3) == 'doc' || substr($thesisdownload->file_en, -4) == 'docx')
                                        <td style="width:30%"><a
                                                href="{{ asset('download/' . $thesisdownload->file_en) }}"><img
                                                    src="{{ asset('img/doc.png') }}"
                                                    alt="doc">{{ $thesisdownload->file_en }}</a></td>
                                    @elseif (substr($thesisdownload->file_en, -3) == 'pdf')
                                        <td style="width:30%"><a
                                                href="{{ asset('download/' . $thesisdownload->file_en) }}"><img
                                                    src="{{ asset('img/pdf.png') }}"
                                                    alt="pdf">{{ $thesisdownload->file_en }}</a></td>
                                    @else
                                        <td style="width:30%"><a
                                                href="{{ asset('download/' . $thesisdownload->file_en) }}"><img
                                                    src="{{ asset('img/odt.png') }}"
                                                    alt="odt">{{ $thesisdownload->file_en }}</a></td>
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
