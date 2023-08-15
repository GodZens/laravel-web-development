@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/student.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.students')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            student work</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_students',['year' => date('Y')-1911]) }}" class="color-gray"> Student Zone</a></li><span>></span>
                        <li>student work</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('en_students') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='en_students?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ($options_year as $option_year)
                                <option value="{{ $option_year->year }}">{{ $option_year->year }}</option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="20%">student name</th>
                                <th scope="col" width="60%">Title of work</th>
                                <th scope="col" width="20%">instructor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentworks as $studentwork)
                                <tr>
                                    <th style="width:20%" scope="row">{{ $studentwork->ename }}</th>
                                    <td style="width:60%"><a href="{{ route('en_students_content',['id' => $studentwork->id]) }}">{{ $studentwork->etopic }}</a></td>
                                    <td style="width:20%">{{ $studentwork->eteacher }}</td>
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
