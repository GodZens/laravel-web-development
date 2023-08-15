@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_work/student_work.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>學生作品</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_sw_result_view') }}"><button type="button"
                            class="btn-size btn btn-outline-primary">新增成果</button></a>
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <form action='{{ route('student_work_view') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='student_work_view?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">學生姓名</th>
                                <th scope="col">作品名稱 </th>
                                <th scope="col">指導老師</th>
                                <th scope="col">作品影片</th>

                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($studentworks as $studentwork)
                                <form action='{{ route('delete_studentwork') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $studentwork->name }}</td>
                                        <td>{{ $studentwork->topic }}</td>
                                        <td>{{ $studentwork->teacher }}</td>
                                        <td>{{ $studentwork->filemovie }}</td>
                                        <td><a href="{{ route('re_sw_result_view', ['id' => $studentwork->id , 'st_id' => $studentwork->student_id]) }}">修改學生姓名</a> </td>
                                        <td><button type="submit" name="id" value="{{ $studentwork->student_id.'@'.$studentwork->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
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
