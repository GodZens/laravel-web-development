@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_honor.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($T_honors as $T_honor)
            <form action='{{ route('re_honor',['id' => $T_honor->id]) }}' method='POST'>
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改榮譽</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        {{-- 修改榮譽 --}}
                        <label for="name" class="d-block mb-0 "><b>{{ $T_honor->name }}</b></label>

                        <div id="add_texper_all">
                            <label for="honor_year" class="d-block mt-3"><b>榮譽年份</b></label>
                            <input type="text" name="honor_year" value="{{$T_honor->date}}">
                            <label for="honor" class="d-block mt-3"><b>榮譽(中文)</b></label>
                            <input type="text" name="honor" value="{{$T_honor->description}}">
                            <label for="ehonor" class="d-block mt-3"><b>榮譽(英文)</b></label>
                            <input type="text" name="ehonor" value="{{$T_honor->edescription}}">
                        </div>

                        <div class="clearfix mt-5">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('re_teacher_honor_view',['name' => $T_honor->name]) }}"><button type="button"
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
