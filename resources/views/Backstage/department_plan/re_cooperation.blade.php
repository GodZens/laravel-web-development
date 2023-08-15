@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_plan/re_cooperation.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($cooperations as $cooperation)
            <form action="{{ route('re_cooperation',['id' => $cooperation->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>新增業界合作計畫</h1>
                        <hr>
                        <label for="time"><b>執行期間</b></label>
                        <input type="text" name="time" value="{{ $cooperation->date }}" required>

                        <div class="d-block">
                            <label for="name-ch"><b>廠商名稱(中文)</b></label>
                            <select name="firm">
                                @foreach ($partners as $partner)
                                    <option value="{{ $partner->firm }}"
                                        {{ $cooperation->firm == $partner->firm ? 'selected' : '' }}>
                                        {{ $partner->firm }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="d-block mt-2">
                            <label for="name-eng"><b>廠商名稱(英文)</b></label>
                            <select name="efirm">
                                @foreach ($partners as $partner)
                                    <option value="{{ $partner->efirm }}"
                                        {{ $cooperation->efirm == $partner->efirm ? 'selected' : '' }}>
                                        {{ $partner->efirm }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <label for="plan-ch" class="mt-2"><b>計劃名稱(中文) </b></label>
                        <input type="text" name="plan-ch" value="{{ $cooperation->projectname }}" required>

                        <label for="plan-eng"><b>計劃名稱(英文) </b></label>
                        <input type="text" name="plan-eng" value="{{ $cooperation->eprojectname }}" required>


                        <div class="d-block mt-2">
                            <label for="plan-people"><b>計劃主持人</b></label>
                            <select name="teacher_ch">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->name }}"
                                        {{ $cooperation->leader == $teacher->name ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-block mt-2">
                            <label for="plan-people-eng"><b>計劃主持人(英文)</b></label>
                            <select name="teacher_eng">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->ename }}"
                                        {{ $cooperation->eleader == $teacher->ename ? 'selected' : '' }}>
                                        {{ $teacher->ename }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-block mt-2">
                            <label for="plan-people-eng"><b>計劃學年度</b></label>
                            <select name="year">
                                @foreach ($departmentplan_years as $departmentplan_year)
                                    <option value="{{ $departmentplan_year->year }}"
                                        {{ $cooperation->year == $departmentplan_year->year ? 'selected' : '' }}>
                                        {{ $departmentplan_year->year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('cooperation') }}"><button type="button" class="cancelbtn">返回</button></a>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
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
