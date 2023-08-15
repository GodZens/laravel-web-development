@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_plan/partner.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12 ">
                <h1>合作廠商</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_partner_view') }}"><button type="button" class="btn-size btn btn-outline-primary">新增合作廠商</button></a>
                </div>
                <hr>


                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">專任教師</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">廠商名稱(中文)</th>
                                <th scope="col">廠商名稱(英文)</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($partners as $partner)
                                <form action="{{ route('delete_partner') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $partner->firm }}</td>
                                        <td>{{ $partner->efirm }}</td>
                                        <td><a
                                                href="{{ route('re_partner_view', ['id' => $partner->id]) }}">{{ $partner->id }}修改</a>
                                        </td>
                                        <td><button type="submit" value="{{ $partner->id }}" name="id"
                                                class="btn btn-primary btn-sm m-0">{{ $partner->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="clearfix mt-5">
                    <a href="{{ route('department_plan') }}"><button type="button" class="cancelbtn">返回</button></a>
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
