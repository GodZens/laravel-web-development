@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_plan/technology_plan.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-2">
        <div class="row">
            <div class="col-12 ">
                <h1>科技部計劃</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_technology_plan_view') }}"><button type="button" class="btn-size btn btn-outline-primary">新增科技部計劃</button></a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">計畫執行時間</th>
                                <th scope="col">計畫結束時間</th>
                                <th scope="col">計畫名稱 </th>
                                <th scope="col">計畫名稱(英)</th>
                                <th scope="col">計劃主持人</th>
                                <th scope="col">計劃主持人(英)</th>
                                <th scope="col">計劃學年度</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($technology_plans as $technology_plan)
                                <form action="{{ route('delete_technology_plan') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $technology_plan->plan_start }}</td>
                                        <td>{{ $technology_plan->plan_end }}</td>
                                        <td>{{ $technology_plan->projectname }}</td>
                                        <td>{{ $technology_plan->eprojectname }} </td>
                                        <td>{{ $technology_plan->leader }} </td>
                                        <td>{{ $technology_plan->eleader }}</td>
                                        <td>{{ $technology_plan->year }} </td>
                                        <td><a
                                                href="{{ route('re_technology_plan_view', ['id' => $technology_plan->id]) }}">{{ $technology_plan->id }}修改</a>
                                        </td>
                                        <td><button type="submit" value="{{ $technology_plan->id }}" name="id"
                                                class="btn btn-primary btn-sm m-0">{{ $technology_plan->id }}刪除</button>
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
