@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ad_guide.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.admissions')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            Admissions introduction, questions</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}"
                                class="color-gray">Admissions</a></li>
                        <span>></span>
                        <li>Admissions introduction, questions</li>

                    </ul>
                </div>
                <div class="row">
                    <div class="col-5 mt-3">
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th>University Department</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @foreach ($universitys as $university)
                                            <ul>
                                                <li>
                                                    <a href="{{ $university->link }}">{{ $university->name }}</a>
                                                </li>
                                            </ul>
                                        @endforeach
                                        @foreach ($transfers as $transfer)
                                            <ul>
                                                <li>
                                                    <h4>transfer exam</h4>
                                                    <a href="{{ $transfer->link }}">{{ $transfer->name }}</a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-5 mt-3">
                        <table class=" shared_table  table-border table">
                            <thead>
                                <tr>
                                    <th>graduate School</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @foreach ($auditions as $audition)
                                            <ul>
                                                <li>
                                                    <h4>Master's Examination</h4>
                                                    <a href="{{ $audition->link }}">{{ $audition->name }}</a>
                                                </li>
                                            </ul>
                                        @endforeach
                                        @foreach ($exams as $exam)
                                            <ul>
                                                <li>
                                                    <h4>Master's Admissions Examination</h4>
                                                    <a href="{{ $exam->link }}">{{ $exam->name }}</a>
                                                </li>
                                            </ul>
                                        @endforeach
                                        @foreach ($classes as $classe)
                                            <ul>
                                                <li>
                                                    <h4>Master's on-the-job special class</h4>
                                                    <a href="{{ $classe->link }}">{{ $classe->name }}</a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="col-10 mt-3">
                    <h4>Past Archeology Questions of the Department of Applied Foreign Languages</h4>
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th>department</th>
                                <th>file</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>graduate School</td>
                                <td>
                                    @foreach ($institutes as $index => $institute)
                                        @if ($index == 9)
                                            <br>
                                        @endif
                                        <a href="{{ $institute->link }}">{{ $institute->year }}<img
                                                src="{{ asset('img/pdf.png') }}" alt="pdf"></a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>On-the-job classes</td>
                                <td>
                                    @foreach ($sscs as $ssc)
                                        <a href="{{ $ssc->link }}">{{ $ssc->year }}<img
                                                src="{{ asset('img/pdf.png') }}"alt="pdf"></a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Transfer Exam English Exam Questions</td>
                                <td>
                                    @foreach ($transfers_ex as $transfer_ex)
                                        <a href="{{ $transfer_ex->link }}">{{ $transfer_ex->year }}<img
                                                src="{{ asset('img/pdf.png') }}" alt="pdf"></a>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
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
