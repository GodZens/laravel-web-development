@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/office_job.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-2">
        <div class="row">
            <div class="col-12 ">
                <h1>辦公室人員職務</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_office_job_view',['name'=>$name]) }}"><button type="button"
                            class="btn-size btn btn-outline-primary">新增職務</button></a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">職務(中文)</th>
                                <th scope="col">職務(英文)</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($positioncontents as $positioncontent)
                                <form action="{{ route('delete_office_job') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $positioncontent->description }}</td>
                                        <td>{{ $positioncontent->edescription }}</td>
                                        <td><a
                                                href="{{ route('re_office_job_view', ['id' => $positioncontent->id]) }}">{{ $positioncontent->id }}修改</a>
                                        </td>
                                        <td><button type="submit" value="{{ $positioncontent->id }}" name="id"
                                                class="btn btn-primary btn-sm m-0">{{ $positioncontent->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="clearfix mt-5">
                    <a href="{{ route('back_teacher') }}"><button type="button" class="cancelbtn">返回</button></a>
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
