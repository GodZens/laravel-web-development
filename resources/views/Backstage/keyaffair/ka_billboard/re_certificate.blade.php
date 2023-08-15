@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/re_certificate.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($licenses as $license)
            <div class="row">
                <div class="col-12">
                    <h1>修改得獎紀錄</h1>
                    <hr>
                    <form action='{{ route('re_certificate', ['id' => $license->id]) }}' method="POST">
                        @csrf
                        <label for="year " class="d-block mt-2 mb-0"><b>學年度</b></label>
                        <select name="year">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}"
                                    {{ $ka_billboard_year->year == $license->year ? 'selected' : '' }}>
                                    {{ $ka_billboard_year->year }}
                                </option>
                            @endforeach
                        </select>

                        <label for="semester " class="d-block mt-2 mb-0"><b>分類</b></label>
                        <select name="semester">
                            <option value="0">請選擇</option>
                            <option value="大學部" {{ $license->type == "大學部" ? 'selected' : '' }}>大學部</option>
                            <option value="研究所" {{ $license->type == "研究所" ? 'selected' : '' }}>研究所</option>
                        </select>

                        <label for="student_num" class="d-block mt-3"><b>學生數</b></label>
                        <input type="text" name="student_num" value="{{$license->student}}" required>

                        <label for="point" class="d-block mt-3"><b>最高分</b></label>
                        <input type="text" name="point" value="{{$license->top_score}}" required>

                        <label for="passrate" class="d-block mt-3"><b>畢業門檻通過率</b></label>
                        <input type="text" name="passrate" value="{{$license->graduation}}" required>

                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('certificate') }}"><button type="button" class="cancelbtn">返回</button></a>
                        </div>
                    </form>
                </div>
            </div>
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
