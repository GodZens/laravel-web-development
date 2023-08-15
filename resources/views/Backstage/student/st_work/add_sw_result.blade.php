@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_work/add_sw_result.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <form action="{{ route('add_sw_result') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h1>新增學生作品</h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>

                    <label for="system" class="d-block mb-0 "><b>年度</b></label>
                    <select name="year">
                        <option value="0">請選擇</option>
                        @foreach ($practical_topics_years as $practical_topics_year)
                            <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                            </option>
                        @endforeach
                    </select>&nbsp;學年度

                    <label for="type" class="d-block mb-0 mt-3"><b>類型</b></label>
                    <select name="type">
                        <option value="1">課程作品</option>
                    </select><br>


                    <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="addname"
                        id="addname" value="新增欄位" />
                    <label for="student-name" class="d-block mt-3"><b>學生姓名(中文)</b></label>
                    <div id="compname">
                        <input type="text" name="student-name[]" required>
                    </div>

                    <label for="student-name-eng"><b>學生姓名(英文)</b></label>
                    <div id="en_compname">
                        <input type="text" name="student-name-eng[]" required>
                    </div>
                    <label for="topic-ch"><b>題目(中文)</b></label>
                    <input type="text" name="topic-ch" required>

                    <label for="topic-eng"><b>題目(英文)</b></label>
                    <input type="text" name="topic-eng" required>

                    <label for="teacher" class="d-block mt-2"><b>指導老師</b></label>
                    <select name="teacher">
                        <option value="1">請選擇</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->name . '@' . $teacher->ename }}">
                                {{ $teacher->name . '(' . $teacher->ename . ')' }}
                            </option>
                        @endforeach
                    </select>

                    <div class="m-auto">
                        <h5 class="fs-16 mt-2">中文版</h5>
                        <textarea name="editor" id="editor"></textarea>
                        <h5 class="fs-16 mt-2">英文版</h5>
                        <textarea name="editor_en" id="editor_en"></textarea>
                    </div>

                    <div class="clearfix mt-5">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('student_work_view', ['year' => date('Y') - 1911]) }}"><button type="button"
                                class="cancelbtn">返回</button></a>
                    </div>
                </div>
            </div>
        </form>
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
@endsection
