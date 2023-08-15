@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_conpaper.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($T_conpapers as $T_conpaper)
            <form action='{{ route('re_conpaper',['id' => $T_conpaper->id]) }}' method='POST'>
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改研討會論文</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        {{-- 修改研討會論文 --}}
                        <label for="name" class="d-block mb-0 "><b>{{ $T_conpaper->name }}</b></label>

                        <div id="add_texper_all">
                            <label for="conpaper_year" class="d-block mt-3"><b>研討會論文年份</b></label>
                            <input type="text" name="conpaper_year" value="{{$T_conpaper->date}}">
                            <label for="conpaper" class="d-block mt-3"><b>論文名稱</b></label>
                            <input type="text" name="conpaper" value="{{$T_conpaper->description}}" >
                        </div>

                        <div class="clearfix mt-5">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('re_teacher_honor_view',['name' => $T_conpaper->name]) }}"><button type="button"
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
