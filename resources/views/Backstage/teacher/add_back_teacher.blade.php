@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/add_back_teacher.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('add_back_teacher') }}" method="POST" class="col-12">
                    @csrf
                    <h1>新增教師帳號</h1>
                    <hr>
                    <label for="account"><b>帳號</b></label>
                    <input type="text" placeholder="Enter Account" name="account" required>

                    <label for="password"><b>密碼</b></label>
                    <input type="text" placeholder="Enter Password" name="password" required>

                    <label for="name"><b>姓名</b></label>
                    <input type="text" placeholder="Enter Name" name="name" required>

                    <span class="d-block"><b>教師種類</b></span>
                    <select name="category">
                        @foreach ($T_categorys as $T_category)
                            <option value="{{ $loop->iteration }}">{{ $T_category->type }}
                            </option>
                        @endforeach
                    </select>

                    <div class="clearfix mt-5">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('back_teacher') }}"><button type="button" class="cancelbtn">返回</button></a>
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
    <script>
        $(document).ready(function() {

            $('#addname').click(function() {
                $('<br /><input type="text" name="student-name[]" id="name" maxlength="40" /></div>')
                    .appendTo(
                        '#compname');
                $('<br /><input type="text" name="student-name-eng[]" id="ename" maxlength="40" /></div>')
                    .appendTo(
                        '#en_compname');
            });

        });
    </script>
@endsection
