@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_office_job.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>新增職務</b></h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                @foreach ($positioncontents as $positioncontent)
                    <form action="{{ route('re_office_job', ['id' => $positioncontent->id]) }}" method="POST" class="col-12">
                        @csrf
                        <label for="position"><b>職務(中文)</b></label>
                        <input type="text" placeholder="Enter position" name="position" value="{{$positioncontent->description}}" required>

                        <label for="eposition"><b>職務(英文)</b></label>
                        <input type="text" placeholder="Enter eposition" name="eposition" value="{{$positioncontent->edescription}}" required>

                        <div class="clearfix mt-5">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('office_job_view', ['name' => $positioncontent->name]) }}"><button type="button"
                                    class="cancelbtn">返回</button></a>
                        </div>
                    </form>
                @endforeach
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
