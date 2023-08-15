@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/admission/re_institute.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($exams as $exam)
            <div class="row">
                <div class="col-12">
                    <h1>修改考古題</h1>

                    <hr>
                    <form action='{{ route('re_institute',['id' => $exam->id]) }}' method="POST">
                        @csrf
                        <label for="year" class="d-block mt-3"><b>年度</b></label>
                        <input type="text" name="year" value="{{ $exam->year }}" required>

                        <label for="type" class="d-block mt-3"><b>類型</b></label>

                        <select name="type" id="year" class="">
                            <option value="institute" {{ $exam->type == 'institute' ? 'selected' : '' }}>研究所</option>
                            <option value="ssc" {{ $exam->type == 'ssc' ? 'selected' : '' }}>在職專班</option>
                            <option value="transfer" {{ $exam->type == 'transfer' ? 'selected' : '' }}>轉學考英文考題</option>
                        </select>

                        <label for="link" class="d-block mt-3"><b>連結位置</b></label>
                        <input type="text" name="link" value="{{ $exam->link }}" required>
                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('admission') }}"><button type="button" class="cancelbtn">返回</button></a>
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
    </script>
@endsection
