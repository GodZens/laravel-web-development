@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_work/re_sw_result.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($sw_results as $sw_result)
            <form action="{{ route('re_sw_result', ['st_id' => $sw_result->student_id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>修改學生作品</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        <label for="system" class="d-block mb-0 "><b>年度</b></label>
                        <p>{{ $sw_result->year }}學年度</p>

                        <label for="type" class="d-block mb-0 mt-3"><b>類型</b></label>
                        <p>課程作品</p>

                        <label for="student-name" class="d-block mt-3"><b>學生姓名(中文)</b></label>
                        <div id="compname">
                            <input type="text" name="student-name" value='{{ $sw_result->name }}' required>
                        </div>

                        <label for="student-name-eng"><b>學生姓名(英文)</b></label>
                        <div id="en_compname">
                            <input type="text" name="student-name-eng" value='{{ $sw_result->ename }}' required>
                        </div>
                        <label for="topic-ch"><b>題目(中文)</b></label>
                        <p>{{ $sw_result->topic }}</p>

                        <label for="topic-eng"><b>題目(英文)</b></label>
                        <p>{{ $sw_result->etopic }}</p>

                        <label for="teacher" class="d-block mt-2"><b>指導老師</b></label>
                        <p>{{ $sw_result->teacher . '@' . $sw_result->eteacher }}</p>

                        <div class="m-auto">
                            <h5 class="fs-16 mt-2">中文版</h5>
                            <p>{!! $sw_result->content !!}</p>
                            <h5 class="fs-16 mt-2">英文版</h5>
                            <p>{!! $sw_result->econtent !!}</p>
                        </div>

                        <div class="clearfix mt-5">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('student_work_view', ['year' => date('Y') - 1911]) }}"><button type="button"
                                    class="cancelbtn">返回</button></a>
                        </div>
                    </div>
                </div>
        @endforeach
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
