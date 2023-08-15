@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/depmethod.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.depintroduct')
            <div class="col-12 col-lg-10 p-0">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                                系所辦法</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray">首頁</a></li><span>></span>
                        <li><a href="{{route('depintroduct')}}" class="color-gray">系所簡介</a></li><span>></span>
                        <li>系所辦法</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="download_subtitle fs-18"><i class="fa-solid fa-circle-arrow-right mr-2"></i>檔案</h3>
                    <table class="table table-striped download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="70%">檔案名稱</th>
                                <th scope="col" width="30%">檔案連結</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" width="70%">國立雲林科技大學應用外語系推廣教育碩士學分抵免規定-1100915</th>
                                <td>
                                    <a href="#"><img src="../學生專區/doc.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/pdf.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/odt.png" alt=""></a>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row" width="70%">應用外語系研究所可修習外所課程-1110623</th>
                                <td>
                                    <a href="#"><img src="../學生專區/doc.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/pdf.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/odt.png" alt=""></a>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row" width="70%">國立雲林科技大學應用外語系專任教師獎勵要點-1110623</th>
                                <td>
                                    <a href="#"><img src="{{ asset('img/doc.png') }}" alt="doc"></a>
                                    <a href="#"><img src="{{ asset('img/pdf.png') }}" alt="pdf"></a>
                                    <a href="#"><img src="{{ asset('img/odt.png') }}" alt="odt"></a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
