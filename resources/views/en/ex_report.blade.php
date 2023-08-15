@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ex_report.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.ex_student')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            exchange experience report</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_ex_student') }}" class="color-gray">International exchange student</a></li>
                        <span>></span>
                        <li>exchange experience report</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <form action='{{ route('en_ex_report') }}' method='POST'>
                        @csrf
                        <select name="country" onchange="location.href='en_ex_report?country='+this.value">
                            <option value="0">please choose</option>
                            @foreach ($countrys as $country)
                                <option value="{{ $country->country }}">{{ $country->country }}</option>
                            @endforeach
                        </select>&nbsp;nation
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class="equipment_table w-100" border="1px">
                        <tbody>
                            <tr>
                                <td><strong><span>Department class</span></strong></td>
                                <td><strong><span>Name</span></strong></td>
                                <td><strong><span>Country/School</span></strong></td>
                                <td><strong><span>file</span></strong></td>
                            </tr>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->dep }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->school }}</td>
                                    <td><a href="{{ asset('download/' . $report->file) }}">{{ $report->file }}<img
                                                src="{{ asset('img/pdf.png') }}"alt="pdf"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
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
