@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_texperience.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($T_texperiences as $T_texperience)
            <form action='{{ route('re_texperience',['id' => $T_texperience->id]) }}' method='POST'>
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改教師經歷</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        {{-- 教師經歷 --}}
                        <label for="name" class="d-block mb-0 "><b>{{ $T_texperience->name }}</b></label>

                        <div id="add_texper_all">
                            <label for="texper" class="d-block mt-3"><b>教師經歷(中文)</b></label>
                            <input type="text" name="texper" value="{{ $T_texperience->description }}">
                            <label for="etexper"><b>教師經歷(英文)</b></label>
                            <input type="text" name="etexper" value="{{ $T_texperience->edescription }}">
                            <label for="start" class="d-block"><b>起始日</b></label>
                            <input type="date" class="datepicker hasDatepicker" id="start" name="start"
                                placeholder="請選擇日期" value="{{ $T_texperience->start }}">
                            <label for="end" class="d-block mt-2"><b>結束日</b></label>
                            <input type="date" class="datepicker hasDatepicker" id="end" name="end"
                                placeholder="請選擇日期" value="{{ $T_texperience->end }}">
                        </div>

                        <div class="clearfix mt-5">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('re_teacher_honor_view',['name' => $T_texperience->name]) }}"><button type="button"
                                    class="cancelbtn">返回</button></a>
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
