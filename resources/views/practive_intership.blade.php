@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/practive_intership.css') }}">
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
                        <li><a href="{{ route('students', ['year' => date('Y') - 1911]) }}" class="color-gray"> 學生專區</a>
                        </li><span>></span>
                        <li> 歷屆實習單位</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-6 mt-3">
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th scope="col" width="50%" class="text-center">文創商溝組</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internships as $internship)
                                    <tr>
                                        @if ($internship->unit != null)
                                            <td class="text-center"><a
                                                    href="{{ route('pr_intership_content', ['id' => $internship->id]) }}">{{ $internship->unit }}</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 mt-3">
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th scope="col" width="50%" class="text-center">創意英語教學組</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($e_internships as $e_internship)
                                    <tr>
                                        <td class="text-center"><a
                                                href="{{ route('pr_intership_content', ['id' => $e_internship->id]) }}">{{ $e_internship->unit }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
