@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/report.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>學習心得報告</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_country_view') }}" class="btn-size btn btn-outline-secondary ml-3">新增國家</a>
                    <a href="{{ route('delete_country_view') }}" class="btn-size btn btn-outline-danger ml-3">刪除國家</a>
                    <a href="{{ route('add_report_view') }}" class="btn-size btn btn-outline-primary ml-3">新增心得報告</a>
                </div>
                <hr>
                @foreach ($countrys as $country)
                    <div class="col-12 m-auto  mb-5">
                        <span class="d-block"><b>{{ $country->country }}</b></span>
                        <table class="table table-hover text-center border">
                            <thead class="thead-dark ">
                                <tr>
                                    <th scope="col">系所班級</th>
                                    <th scope="col">姓名 </th>
                                    <th scope="col">學校</th>
                                    <th scope="col">檔案</th>
                                    <th scope="col">修改</th>
                                    <th scope="col">刪除</th>
                                </tr>
                            </thead>
                            <tbody class=" m-auto">
                                @foreach ($reports as $report)
                                    @if ($report->country == $country->country)
                                        <form action='{{ route('delete_report') }}' method='POST'>
                                            @csrf
                                            <tr>
                                                <td>{{ $report->dep }}</td>
                                                <td>{{ $report->name }}</td>
                                                <td>{{ $report->school }}</td>
                                                <td>{{ $report->file }}</td>
                                                <td><a href="{{ route('re_report_view', ['id' => $report->s_id]) }}">修改</a>
                                                </td>
                                                <td><button type="submit" name="id" value="{{ $report->s_id }}"
                                                        class="btn btn-primary btn-sm m-0">{{ $report->s_id }}刪除</button>
                                                </td>
                                            </tr>
                                        </form>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach

                <div class="clearfix mt-5">
                    <a href="{{ route('st_exchange') }}"><button type="button" class="cancelbtn">返回</button></a>
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
