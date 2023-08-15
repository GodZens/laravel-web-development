@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/re_activity_photo.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($studentphotos as $studentphoto)
            <div class="row">
                <div class="col-12">
                    <h1>新增活動照片</h1>
                    <hr>
                    <form action='{{ route('re_activity_photo',['id' => $studentphoto->id]) }}' method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="title" class="d-block mt-3"><b>標題</b></label>
                        <input type="text" name="title" value="{{ $studentphoto->title }}" required>

                        <label for="descrition" class="mt-2 d-block">圖片說明</label>
                        <textarea cols="35" rows="10" name="descrition" rosw="200" required>{{ $studentphoto->description }}</textarea>


                        <label for="file" class="mt-2 d-block">檔案</label>
                        <input maxlength="100" autocomplete="off" type="file" name="file">
                        <p>{{ $studentphoto->image }}</p>
                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('activity_photo') }}"><button type="button" class="cancelbtn">返回</button></a>
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
@endsection
