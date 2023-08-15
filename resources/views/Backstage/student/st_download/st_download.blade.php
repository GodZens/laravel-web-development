@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_download/st_download.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>下載專區</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{route('add_download_view')}}"><button type="button" class="btn-size btn btn-outline-primary">新增下載檔案</button></a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <form action="{{ route('delete_download') }}" method="POST">
                        @csrf
                        <table class="table table-hover text-center border">
                            <thead class="thead-dark ">
                                <tr>
                                    <th scope="col">檔案描述</th>
                                    <th scope="col">檔案名稱</th>
                                    <th scope="col">刪除</th>
                                </tr>
                            </thead>
                            <tbody class=" m-auto">
                                @foreach ($downloads as $download)
                                    <tr>
                                        <td>{{ $download->description }}</td>
                                        <td>{{ $download->file }}</td>
                                        <td><button type="submit" name="id" value="{{ $download->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $download->id }}刪除</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="clearfix mt-5">
                    <a href="{{ route('back_student') }}"><button type="button" class="cancelbtn">返回</button></a>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
    <div id="alert" class="alert alert-success">
        {{ Session::get('success') }}
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
