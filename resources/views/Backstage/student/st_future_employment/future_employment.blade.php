@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/Backstage/student/st_future_employment/future_employment.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>業界合作計畫</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('addcategory_view') }}"><button type="button"
                            class="btn-size btn btn-outline-primary">新增類別</button></a>
                    <a href="{{ route('addjobtitle_view') }}"><button type="button"
                            class="btn-size btn btn-outline-secondary ml-3">新增職稱</button></a>
                    <a href="{{ route('addinformation_view') }}"><button type="button"
                            class="btn-size btn btn-outline-success ml-3">新增資料</button></a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">學制</th>
                                <th scope="col">畢業學年度 </th>
                                <th scope="col">服務單位</th>
                                <th scope="col">類別</th>
                                <th scope="col">單位部門及職稱</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            <form action="{{ route('de_future_employment') }}" method="POST">
                                @csrf
                                @foreach ($future_employments as $future_employment)
                                    <tr>
                                        <td>{{ $future_employment->type }}</td>
                                        <td>{{ $future_employment->year }}</td>
                                        <td>{{ $future_employment->unit }}</td>
                                        <td>{{ $future_employment->class }}</td>
                                        <td>{{ $future_employment->department }}</td>
                                        <td><a
                                                href="{{ route('fe_modification_view', ['id' => $future_employment->fe_id]) }}">{{ $future_employment->fe_id }}修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $future_employment->fe_id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $future_employment->fe_id }}刪除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('back_student') }}"><button type="button"
                        class="cancelbtn signupbtn">返回</button></a>
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
