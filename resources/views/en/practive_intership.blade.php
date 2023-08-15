@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/practive_intership.css') }}">
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
                        <li><a href="{{ route('en_students', ['year' => date('Y') - 1911]) }}" class="color-gray"> Student
                                Zone</a>
                        </li><span>></span>
                        <li> Previous internship units</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-6 mt-3">
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th scope="col" width="50%" class="text-center">Cultural and Creative Business
                                        Group</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internships as $internship)
                                    <tr>
                                        @if ($internship->eunit != null)
                                            <td class="text-center"><a
                                                    href="{{ route('en_pr_intership_content', ['id' => $internship->id]) }}">{{ $internship->eunit }}</a>
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
                                    <th scope="col" width="50%" class="text-center">Creative English Teaching Group
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($e_internships as $e_internship)
                                    <tr>
                                        @if ($e_internship->eunit != null)
                                            <td class="text-center"><a
                                                    href="{{ route('en_pr_intership_content', ['id' => $e_internship->id]) }}">{{ $e_internship->eunit }}</a>
                                            </td>
                                        @endif
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
