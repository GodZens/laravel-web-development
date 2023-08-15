@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/quick_link/add_book.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>新增書籍</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <form action='{{ route('add_book') }}' method="POST">
                    @csrf

                    <div class="col-12 ml-auto mr-auto mt-3">
                        <span class="mr-3"><b>書名</b></span>
                        <input type="text" name="bookname" id="bookname">
                    </div>
                    <div class="col-12 ml-auto mr-auto mt-3">
                        <span class="mr-3"><b>作者</b></span>
                        <input type="text" name="author" id="author">
                    </div>
                    <div class="col-12 ml-auto mr-auto mt-3">
                        <span class="mr-3"><b>出版社</b></span>
                        <input type="text" name="publish" id="publish">
                    </div>
                    <div class="col-12 ml-auto mr-auto mt-3">
                        <span class="mr-3"><b>ISBN</b></span>
                        <input type="text" name="isbn" id="isbn">
                    </div>
                    <div class="col-12 ml-auto mr-auto mt-3">
                        <span class="mr-3"><b>出版日期</b></span>
                        <input type="date"  name="date" id="date">
                    </div>
                    <div class="col-12 m-auto ">
                        <span class="mr-3"><b>新書</b></span>
                        <input type="checkbox" value="1" name="newbook" id="newbook">
                    </div>
                    <div class="col-12 m-auto ">
                        <span class="mr-3"><b>推薦</b></span>
                        <input type="checkbox" value="1" name="top" id="top">
                    </div>
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
