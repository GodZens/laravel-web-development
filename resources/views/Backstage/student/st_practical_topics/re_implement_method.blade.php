@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/Backstage/student/st_practical_topics/re_implement_method.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($specialtopic_methods as $specialtopic_method)
            <div class="row">
                <div class="col-12">
                    <h1><b>新增實施辦法</b></h1>
                    <!-- <p>Please fill in this form to create an account.</p> -->
                    <hr>
                    <form action='{{ route('re_implement_method',['id' => $specialtopic_method->id]) }}' method='POST' class="col-12">
                        @csrf
                        <div class="col-8 m-auto ">
                            <span class="mr-3">學年度</span>
                            <select name="year">
                                <option value="0">請選擇</option>
                                @foreach ($practical_topics_years as $practical_topics_year)
                                    <option value="{{ $practical_topics_year->year }}"
                                        {{ $specialtopic_method->year == $practical_topics_year->year ? 'selected' : '' }}>
                                        {{ $practical_topics_year->year }}
                                    </option>
                                @endforeach
                            </select>
                            <h5 class="fs-16 mt-2">中文版</h5>
                            <textarea name="editor" id="editor">
                                @if ($specialtopic_method->lang == '中'){{ $specialtopic_method->dtext }}@endif
                            </textarea>
                            <h5 class="fs-16 mt-2">英文版</h5>
                            <textarea name="editor_en" id="editor_en">
                                @if ($specialtopic_method->lang == '英'){{ $specialtopic_method->dtext }}@endif
                            </textarea>
                        </div>
                        <div class="clearfix">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('practical_topics') }}"><button type="button"
                                    class="cancelbtn">返回</button></a>
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
        // CKEITOR.replace('editor',{
        //     filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        //     filebrowserUploadMethod:'form',
        // })
    </script>
@endsection
