@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_activities/re_st_activate.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($studentactivitys as $studentactivity)
            <form action="{{ route('re_st_activate', ['id' => $studentactivity->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改學生活動</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        <label for="event-date"><b>活動日期</b></label>
                        <input name="date" id="date" maxlength="12" type="date" name="event-date" value="{{$studentactivity->date}}" required>

                        <label for="event-location-ch" class="d-block"><b>活動地點(中文)</b></label>
                        <input type="text" name="event-location-ch" value="{{$studentactivity->location}}" required>

                        <label for="event-location-eng" class="d-block"><b>活動地點(英文)</b></label>
                        <input type="text" name="event-location-eng" value="{{$studentactivity->location_en}}" required>

                        <label for="event-name-ch" class="d-block"><b>活動名稱(中文)</b></label>
                        <input type="text" name="event-name-ch" value="{{$studentactivity->activityname}}" required>

                        <label for="event-name-eng" class="d-block"><b>活動名稱(英文)</b></label>
                        <input type="text" name="event-name-eng" value="{{$studentactivity->activityname_en}}" required>

                        <div class="m-auto">
                            <h5 class="fs-16 mt-2">中文版</h5>
                            <textarea name="editor" id="editor">{{$studentactivity->activitycontent}}</textarea>
                            <h5 class="fs-16 mt-2">英文版</h5>
                            <textarea name="editor_en" id="editor_en">{{$studentactivity->activitycontent_en}}</textarea>
                        </div>

                        <div class="clearfix">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('student_activate_view') }}"><button type="button"
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
