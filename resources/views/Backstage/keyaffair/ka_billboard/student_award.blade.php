@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/student_award.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>學生得獎記錄</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{route('add_student_award_view')}}" class="btn-size btn btn-outline-danger ml-3">新增得獎紀錄</a>
                </div>
                <hr>


                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">學年度</th>
                                <th scope="col">學期 </th>
                                <th scope="col">參賽者</th>
                                <th scope="col">得獎名次</th>
                                <th scope="col">競賽名稱(作品名稱)</th>
                                <th scope="col">指導老師 </th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($studentcompetitions as $studentcompetition)
                                <form action='{{ route('delete_student_award') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $studentcompetition->year }}</td>
                                        <td>{{ $studentcompetition->sem }}</td>
                                        <td>{{ $studentcompetition->s_name }}</td>
                                        <td>{{ $studentcompetition->ranking }}</td>
                                        <td>{{ $studentcompetition->projectname }}</td>
                                        <td>{{ $studentcompetition->t_name }}</td>
                                        <td><a href="{{ route('re_student_award_view', ['id' => $studentcompetition->id]) }}">修改</a></td>
                                        <td><button type="submit" name="id" value="{{ $studentcompetition->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $studentcompetition->id }}刪除</button>
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
