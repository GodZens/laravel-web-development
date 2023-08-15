@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/quick_link/add_booktype.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>新增類型</b></h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <form action='{{ route('add_booktype') }}' method="POST">
                    @csrf
                    <div class="col-12 m-auto ">
                        <span class="d-block mr-3"><b>類別</b></span>
                        <select name="type">
                            <option value="0">請選擇</option>
                            @foreach ($librarytypes as $librarytype)
                                <option value="{{ $librarytype->type }}">{{ $librarytype->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 ml-auto mr-auto mt-4">
                        <span class="mr-3"><b>新增的類型</b></span>
                        <input type="text" name="newtype" id="newtype">
                    </div>

                    <div class="clearfix">
                        <button type="submit" class="signupbtn">送出</button>
                        <a href="{{ route('library') }}"><button type="button" class="cancelbtn">返回</button></a>
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

            $('#naddfile').click(function() {
                $('<br /><input maxlength="100" autocomplete="off" type="file" name="file[]">').appendTo(
                    '#refile');
            });

        });
    </script>
@endsection