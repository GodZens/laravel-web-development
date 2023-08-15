@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_plan/add_depart_year.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>新增學年度</b></h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <form action="{{ route('add_depart_year') }}" method="POST" class="col-12">
                    @csrf
                    <div class="col-8 m-auto ">
                        <span class="mr-3">目前的學年度</span>
                        <select name="year">
                            <option value="0">請選擇</option>
                            @foreach ($departmentplan_years as $departmentplan_year)
                                <option value="{{ $departmentplan_year->year }}">{{ $departmentplan_year->year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-8 ml-auto mr-auto mt-4">
                        <span class="mr-3">新增的學年度 </span>
                        <input type="text" name="new_year" id="new_year">
                    </div>
                    <div class="clearfix mt-5">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('ka_billboard') }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
    <div id="alert" class="alert alert-success">
        {{ Session::get('success') }}
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
