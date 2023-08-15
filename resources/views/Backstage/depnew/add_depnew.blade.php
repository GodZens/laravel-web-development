@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/depnew/add_depnew.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>新增系所公告</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <form action="{{ route('add_depnew') }}" method="POST" class="col-12" enctype="multipart/form-data">
                    @csrf
                    <label for="title"><b>標題</b></label>
                    <input type="text" placeholder="Enter Title" name="title" required>

                    <label for="eng-title"><b>英文標題</b></label>
                    <input type="text" placeholder="Enter English Title" name="eng-title" required>

                    <label for="end-time"><b>截止日期</b></label>
                    <input type="date" class="d-block" name="end-time">

                    <label for="news-type" class="d-block"><b>類型</b></label>
                    <select name="news-type">
                        <option value="0">請選擇</option>
                        @foreach ($newscategorys as $newscategory)
                            <option value="{{ $newscategory->typeid }}">{{ $newscategory->type }}
                            </option>
                        @endforeach
                    </select>

                    <label for="precategory" class="d-block mt-2"><b>前置符號</b></label>
                    <select name="precategory">
                        <option value="0">請選擇</option>
                        @foreach ($precategorys as $precategory)
                            <option value="{{ $precategory->pid }}">{{ $precategory->type }}
                            </option>
                        @endforeach
                    </select>

                    <label for="refile" class="d-block mt-3"><b>相關檔案</b></label>
                    <div id="refilename">
                        <span> 檔案名稱（中文）</span><input autocomplete="off" class="intext" maxlength="50" type="text"
                            name="filename[]">
                    </div>
                    <div id="reefilename">
                        <span> 檔案名稱（英文）</span><input autocomplete="off" class="intext" maxlength="100" type="text"
                            name="efilename[]">
                    </div>
                    <div id="refile">
                        <span class="d-block"> 檔案位置</span><input maxlength="100" autocomplete="off" type="file" name="file[]">
                    </div>
                    <input type="button" class="btn  btn-secondary mt-3" name="naddfile" id="naddfile" value="新增更多檔案">

                    <div class="col-12 m-auto ">
                        <h5 class="fs-16 mt-2">中文版</h5>
                        <textarea name="editor" id="editor"></textarea>
                        <h5 class="fs-16 mt-2">英文版</h5>
                        <textarea name="editor_en" id="editor_en"></textarea>
                    </div>

                    <div class="clearfix">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('depnew',['type' => 'all']) }}"><button type="button" class="cancelbtn">返回</button></a>
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
        ClassicEditor.create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}"
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create(document.querySelector('#editor_en'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}"
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#naddfile').click(function() {
                $('<br /><input type="text" name="filename[]" id="filename" maxlength="40" />')
                    .appendTo('#refilename');
                $('<br /><input type="text" name="efilename[]" id="efilename" maxlength="40" />')
                    .appendTo('#reefilename');
                $('<br /><input maxlength="100" autocomplete="off" type="file" name="file[]">').appendTo(
                    '#refile');
            });

        });
    </script>
@endsection
