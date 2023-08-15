@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/student_list.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>交換生名單</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_student_list_view') }}" class="btn-size btn btn-outline-primary">新增交換生名單</a>
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <form action='{{ route('student_list') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='student_list?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <hr>

                <span class="d-block mt-2 text-center mb-2">目前為{{ $year }}學年度</span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">系所班級</th>
                                <th scope="col">姓名 </th>
                                <th scope="col">國家/學校</th>
                                <th scope="col">起迄年月</th>
                                <th scope="col">去/來</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($student_lists_1 as $student_list_1)
                                <form action='{{ route('delete_student_list') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $student_list_1->dep }}</td>
                                        <td>{{ $student_list_1->name }}</td>
                                        <td>{{ $student_list_1->position }}</td>
                                        <td>{{ $student_list_1->period }}</td>
                                        <td>{{ $student_list_1->type }}</td>
                                        <td><a
                                                href="{{ route('re_student_list_view', ['id' => $student_list_1->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $student_list_1->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $student_list_1->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <span class="d-block mt-2 text-center mb-2">{{ $year }}學年度第二學期</span>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">系所班級</th>
                                <th scope="col">姓名 </th>
                                <th scope="col">國家/學校</th>
                                <th scope="col">起迄年月</th>
                                <th scope="col">去/來</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($student_lists_2 as $student_list_2)
                                <form action='{{ route('delete_student_list') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $student_list_2->dep }}</td>
                                        <td>{{ $student_list_2->name }}</td>
                                        <td>{{ $student_list_2->position }}</td>
                                        <td>{{ $student_list_2->period }}</td>
                                        <td>{{ $student_list_2->type }}</td>
                                        <td><a
                                                href="{{ route('re_student_list_view', ['id' => $student_list_2->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $student_list_2->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $student_list_2->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="clearfix mt-5">
                        <a href="{{ route('st_exchange') }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>

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
