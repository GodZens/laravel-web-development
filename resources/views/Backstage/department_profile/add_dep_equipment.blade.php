@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_profile/add_dep_equipment.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>新增設備</b></h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <form action='{{ route('add_dep_equipment') }}' method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="classname"><b>教室名稱(中文) </b></label>
                    <input type="text" name="classname" required>

                    <label for="classname_en"><b>教室名稱(英文)</b></label>
                    <input type="text" name="classname_en" required>

                    <div class="col-8 m-auto ">
                        <h5 class="fs-16 mt-2">設備(中文)</h5>
                        <textarea name="editor" id="editor"></textarea>
                        <h5 class="fs-16 mt-2">設備(英文)</h5>
                        <textarea name="editor_en" id="editor_en"></textarea>
                        <h5 class="fs-16 mt-2">功能(中文)</h5>
                        <textarea name="f_editor" id="f_editor"></textarea>
                        <h5 class="fs-16 mt-2">功能(英文)</h5>
                        <textarea name="f_editor_en" id="f_editor_en"></textarea>
                    </div>
                    <div class="col-12 p-0 mb-2">
                        <label for="file" class="d-block"><b>照片檔案</b></label>
                        <input type="file" name="file_img" id="file_img">
                    </div>
                    <div class="clearfix">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('dep_equipment') }}"><button type="button" class="cancelbtn">返回</button></a>
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

        ClassicEditor.create(document.querySelector('#f_editor'), {
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

        ClassicEditor.create(document.querySelector('#f_editor_en'), {
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
@endsection
