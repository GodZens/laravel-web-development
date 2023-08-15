@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/quick_link/promote_education.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>推廣教育</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">放置位置</th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($promote_educations as $promote_education)
                                <tr>
                                    <td>推廣教育</td>
                                    <td>{{ $promote_education->date }}</td>
                                    <td><a
                                            href="{{ route('re_promote_education_view', ['id' => $promote_education->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('quick_link') }}"><button type="button" class="cancelbtn">返回</button></a>
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
