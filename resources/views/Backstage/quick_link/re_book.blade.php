@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/quick_link/re_book.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($librarys as $library)
            <div class="row">
                <div class="col-12">
                    <h1>新增書籍</h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>

                    <form action='{{ route('re_book', ['id' => $library->id]) }}' method="POST">
                        @csrf

                        <div class="col-12 ml-auto mr-auto mt-3">
                            <span class="mr-3"><b>書名</b></span>
                            <input type="text" name="bookname" id="bookname" value="{{ $library->bookname }}" required>
                        </div>
                        <div class="col-12 ml-auto mr-auto mt-3">
                            <span class="mr-3"><b>作者</b></span>
                            <input type="text" name="author" id="author" value="{{ $library->author }}" required>
                        </div>
                        <div class="col-12 ml-auto mr-auto mt-3">
                            <span class="mr-3"><b>出版社</b></span>
                            <input type="text" name="publish" id="publish" value="{{ $library->publish }}" required>
                        </div>
                        <div class="col-12 ml-auto mr-auto mt-3">
                            <span class="mr-3"><b>ISBN</b></span>
                            <input type="text" name="isbn" id="isbn" value="{{ $library->isbn }}" required>
                        </div>
                        <div class="col-12 ml-auto mr-auto mt-3">
                            <span class="mr-3"><b>出版日期</b></span>
                            <input type="date" name="date" id="date" value="{{ $library->date }}" required>
                        </div>
                        <div class="col-12 m-auto ">
                            <span class="mr-3"><b>新書</b></span>
                            @if ($library->new == 1)
                                <input type="checkbox" value="1" name="newbook" id="newbook" checked>
                            @else
                                <input type="checkbox" value="1" name="newbook" id="newbook">
                            @endif
                        </div>
                        <div class="col-12 m-auto ">
                            <span class="mr-3"><b>推薦</b></span>
                            @if ($library->top == 1)
                                <input type="checkbox" value="1" name="top" id="top" checked>
                            @else
                                <input type="checkbox" value="1" name="top" id="top">
                            @endif
                        </div>
                        <div class="col-12 m-auto ">
                            <span class="d-block mr-3"><b>類別</b></span>
                            <select name="type">
                                <option value="0">請選擇</option>
                                @foreach ($librarytypes as $librarytype)
                                    <option value="{{ $librarytype->type }}"
                                        {{ $librarytype->type == $library->type ? 'selected' : '' }}>
                                        {{ $librarytype->type }}
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
    <script>
        $(document).ready(function() {

            $('#naddfile').click(function() {
                $('<br /><input maxlength="100" autocomplete="off" type="file" name="file[]">').appendTo(
                    '#refile');
            });

        });
    </script>
@endsection
