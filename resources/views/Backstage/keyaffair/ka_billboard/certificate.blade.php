@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/certificate.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>證照統計表</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_certificate_view') }}" class="btn-size btn btn-outline-primary ml-3">新增證照統計</a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">擺放位置</th>
                                <th scope="col">日期 </th>
                                <th scope="col">選項 </th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($licensecolleges as $licensecollege)
                                <tr>
                                    <td>大學部統計</td>
                                    <td>{{ $licensecollege->date }}</td>
                                    <td><a href="{{ route('re_statistics_view', ['id' => $licensecollege->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($licenseoldcolleges as $licenseoldcollege)
                                <tr>
                                    <td>研究所統計</td>
                                    <td>{{ $licenseoldcollege->date }}</td>
                                    <td><a
                                            href="{{ route('re_statistics_view', ['id' => $licenseoldcollege->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">學年度 </th>
                                <th scope="col">分類 </th>
                                <th scope="col">學生數</th>
                                <th scope="col">最高分</th>
                                <th scope="col">畢業門檻通過率</th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($licenses as $license)
                                <form action='{{ route('delete_certificate') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $license->year }}</td>
                                        <td>{{ $license->type }}</td>
                                        <td>{{ $license->student }}</td>
                                        <td>{{ $license->top_score }}</td>
                                        <td>{{ $license->graduation }}</td>
                                        <td><a href="{{ route('re_certificate_view', ['id' => $license->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $license->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $license->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('ka_billboard') }}"><button type="button" class="cancelbtn">返回</button></a>
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
