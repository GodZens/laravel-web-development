@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/re_billboard.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($honors as $honor)
            <div class="row">
                <div class="col-12">
                    <h1>修改榮譽教師</h1>

                    <hr>
                    <form action='{{ route('re_billboard',['id' => $honor->id]) }}' method="POST">
                        @csrf

                        <span class="mr-3"><b>學年度</b></span>
                        <select name="year">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}"
                                    {{ $ka_billboard_year->year == (($honor->date)-1911) ? 'selected' : '' }}>
                                    {{ $ka_billboard_year->year }}
                                </option>
                            @endforeach
                        </select>

                        <label for="alumni" class="d-block mt-3"><b>教師名稱</b></label>
                        <input type="text" name="alumni" value="{{ $honor->name }}" >

                        <label for="Performance" class="d-block mt-3"><b>榮譽表現（中文）</b></label>
                        <input type="text" name="Performance" value="{{ $honor->description }}">

                        <label for="Performance-eng" class="d-block mt-3"><b>榮譽表現（英文）</b></label>
                        <input type="text" name="Performance_eng" value="{{ $honor->edescription }}">


                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('ka_billboard') }}"><button type="button" class="cancelbtn">返回</button></a>
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
