@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_plan/add_technology_plan.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <form action="{{ route('add_technology_plan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h1>新增科技部計畫</h1>

                    <hr>
                    <label for="start" class="d-block"><b>計畫執行日期</b></label>
                    <input type="date" class="datepicker hasDatepicker" id="start" name="start"
                        placeholder="請選擇日期">

                    <label for="end" class="d-block mt-2"><b>計畫結束日期</b></label>
                    <input type="date" class="datepicker hasDatepicker" id="end" name="end"
                        placeholder="請選擇日期">

                    <label for="plan-name-ch"><b>計劃名稱(中文)</b></label>
                    <input type="text" name="plan-name-ch" required>

                    <label for="plan-name-eng"><b>計劃名稱(英文)</b></label>
                    <input type="text" name="plan-name-eng" required>

                    <div class="d-block">
                        <label for="plan-people"><b>計劃主持人</b></label>
                        <select name="teacher_ch">
                            <option value="0">請選擇</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->name }}">{{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-block mt-2">
                        <label for="plan-people-eng"><b>計劃主持人(英文)</b></label>
                        <select name="teacher_eng">
                            <option value="0">請選擇</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->ename }}">{{ $teacher->ename }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-block mt-2">
                        <label for="plan-people-eng"><b>計劃學年度</b></label>
                        <select name="year">
                            <option value="0">請選擇</option>
                            @foreach ($departmentplan_years as $departmentplan_year)
                                <option value="{{ $departmentplan_year->year }}">{{ $departmentplan_year->year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="clearfix  mt-3">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('technology_plan') }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @if (Session::has('success'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('error') }}
        </div>
    @endif
@endsection
@section('javascript')
    <script>
        // 顯示警告框
        document.getElementById("alert").style.display = "block";

        // 設定一段時間後隱藏警告框
        setTimeout(function() {
            document.getElementById("alert").style.display = "none";
        }, 2000); // 2000 毫秒為 2 秒
    </script>
@endsection
