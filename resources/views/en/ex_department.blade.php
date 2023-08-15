@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ex_department.css') }}">
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
                            Exchange to this department</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_ex_student') }}" class="color-gray">International exchange student</a></li>
                        <span>></span>
                        <li>Exchange to this department</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <form action='{{ route('en_ex_department') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='en_ex_department?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}</option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class="equipment_table w-100" border="1px">
                        <tbody>
                            <tr>
                                <td><strong><span>Department class</span></strong></td>
                                <td><strong><span>Name</span></strong></td>
                                <td><strong><span>gender</span></strong></td>
                                <td><strong><span>Country/School</span></strong></td>
                                <td><strong><span>from year to month</span></strong></td>
                                <td><strong><span>semester</span></strong></td>
                            </tr>
                            @foreach ($student_lists as $student_list)
                                <tr>
                                    <td>{{ $student_list->dep }}</td>
                                    <td>{{ $student_list->name }}</td>
                                    <td>{{ $student_list->gender }}</td>
                                    <td>{{ $student_list->position }}</td>
                                    <td>{{ $student_list->period }}</td>
                                    <td>{{ $student_list->sem }}</td>
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
