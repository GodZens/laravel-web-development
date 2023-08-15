@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/ka_billboard.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>應外風雲榜</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{route('add_ka_billboard_years_view')}}" class="btn-size btn btn-outline-danger ml-3">新增學年度</a>
                    <a href="{{route('delete_ka_billboard_years_view')}}" class="btn-size btn btn-outline-warning ml-3">刪除學年度</a>
                    <a href="{{route('add_billboard_view')}}" class="btn-size btn btn-outline-info ml-3">新增教師榮譽</a>
                    <a href="{{route('student_award')}}" class="btn-size btn btn-outline-primary  ml-3">學生得獎紀錄</a>
                    <a href="{{route('certificate')}}" class="btn-size btn btn-outline-secondary ml-3">證照統計表</a>
                    <a href="{{route('outstanding')}}" class="btn-size btn btn-outline-success ml-3">畢業校友傑出表現</a>
                </div>
                <hr>


                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">教師姓名</th>
                                <th scope="col">獲獎榮譽</th>
                                <th scope="col">英文獲獎榮譽</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($billboards as $billboard)
                                <form action='{{ route('delete_billboard') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $billboard->name }}</td>
                                        <td>{{ $billboard->description }}</td>
                                        <td>{{ $billboard->edescription }}</td>
                                        <td><a href="{{ route('re_billboard_view', ['id' => $billboard->id]) }}">修改</a></td>
                                        <td><button type="submit" name="id" value="{{ $billboard->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $billboard->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
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
