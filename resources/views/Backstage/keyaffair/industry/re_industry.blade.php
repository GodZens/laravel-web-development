@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/industry/re_industry.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($industrys as $industry)
            <div class="row">
                <div class="col-12">
                    <h1>修改學生產業實習</h1>

                    <hr>
                    <form action='{{ route('re_industry',['id' => $industry->id]) }}' method="POST">
                        @csrf
                        <span class="d-block mr-3"><b>學年度</b></span>
                        <select name="year">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}"
                                    {{ $ka_billboard_year->year == $industry->year ? 'selected' : '' }}>{{ $ka_billboard_year->year }}
                                </option>
                            @endforeach
                        </select>

                        <label for="semester " class="d-block mt-2 mb-0"><b>學期</b></label>
                        <select name="semester">
                            <option value="0">請選擇</option>
                            <option value="1" {{ $industry->sem == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $industry->sem == 2 ? 'selected' : '' }}>2</option>
                        </select>

                        <label for="department-class " class="d-block mt-2 mb-0"><b>系所班級</b></label>
                        <select name="department-class">
                            <option value="0">請選擇</option>
                            <option value="應外系大一" {{ $industry->dep == "應外系大一" ? 'selected' : '' }}>應外系大一</option>
                            <option value="應外系大二" {{ $industry->dep == "應外系大二" ? 'selected' : '' }}>應外系大二</option>
                            <option value="應外系大三" {{ $industry->dep == "應外系大三" ? 'selected' : '' }}>應外系大三</option>
                            <option value="應外系大四" {{ $industry->dep == "應外系大四" ? 'selected' : '' }}>應外系大四</option>
                            <option value="應外所碩一" {{ $industry->dep == "應外所碩一" ? 'selected' : '' }}>應外所碩一</option>
                            <option value="應外所碩二" {{ $industry->dep == "應外所碩二" ? 'selected' : '' }}>應外所碩二</option>
                            <option value="應外所碩三" {{ $industry->dep == "應外所碩三" ? 'selected' : '' }}>應外所碩三</option>
                            <option value="應外所碩四" {{ $industry->dep == "應外所碩四" ? 'selected' : '' }}>應外所碩四</option>
                            <option value="應外所碩五" {{ $industry->dep == "應外所碩五" ? 'selected' : '' }}>應外所碩五</option>
                        </select>

                        <label for="name" class="d-block mt-3"><b>姓名</b></label>
                        <input type="text" name="name" value="{{ $industry->name }}" required>

                        <label for="unit" class="d-block mt-2 mb-0"><b>實習單位</b></label>
                        <input type="text" name="unit" value="{{ $industry->position }}" required>

                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('industry', ['year' => date('Y') - 1911]) }}"><button type="button"
                                    class="cancelbtn">返回</button></a>
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
