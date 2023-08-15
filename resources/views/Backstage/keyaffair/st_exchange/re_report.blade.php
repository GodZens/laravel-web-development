@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/re_report.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($reports as $report)
            <div class="row">
                <div class="col-12">
                    <h1>修改心得報告</h1>

                    <hr>
                    <form action='{{ route('re_report',['id' => $report->id]) }}' method="POST" enctype="multipart/form-data">
                        @csrf
                        <span class="d-block mr-3"><b>國家</b></span>
                        <select name="country">
                            <option value="0">請選擇</option>
                            @foreach ($countrys as $country)
                                <option value="{{ $country->country }}"
                                    {{ $report->country == $country->id ? 'selected' : '' }}>
                                    {{ $country->country }}
                                </option>
                            @endforeach
                        </select>

                        <label for="grade " class="d-block mt-2 mb-0"><b>年級</b></label>
                        <select name="grade">
                            <option value="0">請選擇</option>
                            <option value="應外系大一" {{ $report->dep == "應外系大一" ? 'selected' : '' }}>應外系大一</option>
                            <option value="應外系大二" {{ $report->dep == "應外系大二" ? 'selected' : '' }}>應外系大二</option>
                            <option value="應外系大三" {{ $report->dep == "應外系大三" ? 'selected' : '' }}>應外系大三</option>
                            <option value="應外系大四" {{ $report->dep == "應外系大四" ? 'selected' : '' }}>應外系大四</option>
                            <option value="應外所碩一" {{ $report->dep == "應外所碩一" ? 'selected' : '' }}>應外所碩一</option>
                            <option value="應外所碩二" {{ $report->dep == "應外所碩二" ? 'selected' : '' }}>應外所碩二</option>
                            <option value="應外所碩三" {{ $report->dep == "應外所碩三" ? 'selected' : '' }}>應外所碩三</option>
                            <option value="應外所碩四" {{ $report->dep == "應外所碩四" ? 'selected' : '' }}>應外所碩四</option>
                            <option value="應外所碩五" {{ $report->dep == "應外所碩五" ? 'selected' : '' }}>應外所碩五</option>
                        </select>

                        <label for="name-ch" class="d-block mt-3"><b>姓名(中文)</b></label>
                        <input type="text" name="name-ch" value="{{$report->name}}" required>

                        <label for="name-eng" class="mt-2 d-block">姓名(英文)</label>
                        <input type="text" name="name-eng" value="{{$report->ename}}">

                        <label for="school" class="mt-2 d-block">學校</label>
                        <input type="text" name="school" value="{{$report->school}}" required>

                        <label for="file" class="mt-2 d-block">檔案</label>
                        <input maxlength="100" autocomplete="off" type="file" name="file">
                        <p>{{$report->file}}</p>

                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('report') }}"><button type="button" class="cancelbtn">返回</button></a>
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
