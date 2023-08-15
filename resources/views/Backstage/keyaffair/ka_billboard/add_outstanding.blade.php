@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/add_outstanding.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>新增傑出校友</h1>

                <hr>
                <form action="{{ route('add_outstanding') }}" method="POST" class="col-12">
                    @csrf
                    <label for="alumni" class="d-block mt-3"><b>校友名稱（中文）</b></label>
                    <input type="text" name="alumni" required>

                    <label for="alumni-eng" class="d-block mt-3"><b>校友名稱（英文）</b></label>
                    <input type="text" name="alumni-eng">

                    <label for="Performance" class="d-block mt-3"><b>傑出表現（中文）</b></label>
                    <input type="text" name="Performance" required>

                    <label for="Performance-eng" class="d-block mt-3"><b>傑出表現（英文）</b></label>
                    <input type="text" name="Performance-eng">


                    <span class="d-block mr-3"><b>類別（中文）</b></span>
                    <select name="type">
                        <option value="0">請選擇</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->mode }}">{{ $type->mode }}
                            </option>
                        @endforeach
                    </select>

                    <div class="clearfix  mt-3">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('outstanding') }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
                </form>
            </div>
        </div>

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
