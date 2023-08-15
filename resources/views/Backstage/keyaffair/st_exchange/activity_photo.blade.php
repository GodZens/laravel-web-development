@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/activity_photo.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">

                <h1>活動照片</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_activity_photo_view') }}" class="btn-size btn btn-outline-primary">新增活動照片</a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">圖片標題</th>
                                <th scope="col">圖片說明 </th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($activity_photos as $activity_photo)
                                <form action='{{ route('delete_activity_photo') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $activity_photo->title }}</td>
                                        <td>{{ $activity_photo->description }}</td>
                                        <td><a
                                                href="{{ route('re_activity_photo_view', ['id' => $activity_photo->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $activity_photo->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $activity_photo->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix  mt-3">
                        <a href="{{ route('keyaffair') }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
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
    @endsection
