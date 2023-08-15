@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_practical_topics/add_internship.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>新增實習單位</b></h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <form action='{{ route('add_internship') }}' method='POST' class="col-12">
                    @csrf
                    <div class="col-8 m-auto ">
                        <span class="mr-3"><b>年度</b></span>
                        <select name="year" id="year" class="">
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-8 mr-auto ml-auto mt-3">
                        <label for="Internships"><b>實習單位(中文)</b></label>
                        <input type="text" name="Internships" required>

                    </div>
                    <div class="col-8 mr-auto ml-auto mt-3">
                        <label for="Internships-eng"><b>實習單位(英文)</b></label>
                        <input type="text" name="Internships-eng" required>

                    </div>
                    <div class="col-8 mr-auto ml-auto mt-3">
                        <label for="contact-person"><b>聯絡人</b></label>
                        <input type="text" name="contact-person" required>
                    </div>
                    <div class="col-8 mr-auto ml-auto mt-3">
                        <label for="contact-phone"><b>連絡電話</b></label>
                        <input type="text" name="contact-phone" required>
                    </div>
                    <div class="col-8 m-auto ">
                        <span class="mr-3"><b>組別</b></span>
                        <select name="contact-mode" id="contact-mode" class="">
                            @foreach ($modes as $mode)
                                <option value="{{ $mode->mode }}">{{ $mode->mode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-8 mr-auto ml-auto mt-3 d-flex align-items-cneter">
                        <label for="contentaa" class="mt-auto mb-auto"><b>實習內容(中文)</b></label>
                        <textarea name="editor" id="editor"></textarea>
                    </div>
                    <div class="col-8 mr-auto ml-auto mt-3 d-flex align-items-cneter">
                        <label for="contentaa-eng" class="mt-auto mb-auto"><b>實習內容(英文)</b></label>
                        <textarea name="editor_en" id="editor_en"></textarea>
                    </div>
                    <div class="clearfix">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('practical_topics', ['year' => date('Y') - 1911]) }}"><button type="button" class="cancelbtn">返回</button></a>
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
@endsection
