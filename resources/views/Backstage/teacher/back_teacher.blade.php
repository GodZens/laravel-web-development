@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/back_teacher.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12 ">
                <h1>系所師資</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{route('add_back_teacher_view')}}"><button type="button" class="btn-size btn btn-outline-primary">新增教師帳號</button></a>
                </div>
                <p class="col-12 d-flex justify-content-center">刪除會將該名教師的所有資料刪掉，因此請慎重~!!!</p>
                <hr>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">專任教師</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">姓名</th>
                                <th scope="col">帳號密碼修改 </th>
                                <th scope="col">教師資料修改</th>
                                <th scope="col">新增榮譽事項</th>
                                <th scope="col">修改榮譽事項</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($F_teachers as $F_teacher)
                                <form action='{{ route('delete_F_teacher') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $F_teacher->name }}</th>
                                        <td><a href="{{ route('re_acc_teacher_view', ['name' => $F_teacher->name]) }}">帳號密碼修改</a></td>
                                        <td><a href="{{ route('re_teacher_profile_view', ['name' => $F_teacher->name]) }}">教師資料修改</a></td>
                                        <td><a href="{{ route('add_teacher_honor_view', ['name' => $F_teacher->name]) }}">新增榮譽事項</a></td>
                                        <td><a href="{{ route('re_teacher_honor_view', ['name' => $F_teacher->name]) }}">修改榮譽事項</a></td>
                                        <td><button type="submit" name="name" value="{{ $F_teacher->name }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="col-10 ml-auto mr-auto mt-5">
                    <h2 class="fs-small">兼任教師</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">姓名</th>
                                <th scope="col">帳號密碼修改 </th>
                                <th scope="col">教師資料修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($P_teachers as $P_teacher)
                                <form action='{{ route('delete_P_teacher') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $P_teacher->name }}</th>
                                        <td><a href="{{ route('re_acc_teacher_view', ['name' => $P_teacher->name]) }}">帳號密碼修改</a></td>
                                        <td><a href="{{ route('re_p_teacher_view', ['name' => $P_teacher->name]) }}">教師資料修改</a></td>
                                        <td><button type="submit" name="name" value="{{ $P_teacher->name }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 ml-auto mr-auto mt-5">
                    <h2 class="fs-small">相關教師</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">姓名</th>
                                <th scope="col">帳號密碼修改 </th>
                                <th scope="col">教師資料修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($Relate_teachers as $Relate_teacher)
                                <form action='{{ route('delete_relate_teacher') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $Relate_teacher->name }}</th>
                                        <td><a href="{{ route('re_acc_teacher_view', ['name' => $Relate_teacher->name]) }}">帳號密碼修改</a></td>
                                        <td><a href="{{ route('re_relate_teacher_view', ['name' => $Relate_teacher->name]) }}">教師資料修改</a></td>
                                        <td><button type="submit" name="name" value="{{ $Relate_teacher->name }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">辦公人員</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">姓名</th>
                                <th scope="col">帳號密碼修改 </th>
                                <th scope="col">基本資料修改</th>
                                <th scope="col">職務</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($Office_staffs as $Office_staff)
                                <form action='{{ route('delete_office_staff') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $Office_staff->name }}</th>
                                        <td><a href="{{ route('re_acc_teacher_view', ['name' => $Office_staff->name]) }}">帳號密碼修改</a></td>
                                        <td><a href="{{ route('re_office_staff_view', ['name' => $Office_staff->name]) }}">基本資料修改</a></td>
                                        <td><a href="{{ route('office_job_view', ['name' => $Office_staff->name]) }}">職務</a></td>
                                        <td><button type="submit" name="name" value="{{ $Office_staff->name }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 ml-auto mr-auto mt-5">
                    <h2 class="fs-small">退休人員</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">姓名</th>
                                <th scope="col">帳號密碼修改 </th>
                                <th scope="col">教師資料修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($Retire_teachers as $Retire_teacher)
                                <form action='{{ route('delete_retire_teacher') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $Retire_teacher->name }}</th>
                                        <td><a href="{{ route('re_acc_teacher_view', ['name' => $Retire_teacher->name]) }}">帳號密碼修改</a></td>
                                        <td><a href="{{ route('re_retire_teacher_view', ['name' => $Retire_teacher->name]) }}">教師資料修改</a></td>
                                        <td><button type="submit" name="name" value="{{ $Retire_teacher->name }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('index') }}"><button type="button" class="cancelbtn">返回</button></a>
                </div>

            </div>
        </div>

        </form>
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
