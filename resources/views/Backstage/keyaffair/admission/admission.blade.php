@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/admission/admission.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>招生專區</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_admission_view') }}" class="btn-size btn btn-outline-primary ml-3">新增招生公告(大學部)</a>
                    <a href="{{ route('add_institute_view') }}" class="btn-size btn btn-outline-secondary ml-3">新增考古題</a>
                    <a href="{{ route('add_alumni_view') }}" class="btn-size btn btn-outline-success ml-3">新增標竿校友</a>
                </div>
                <hr>

                <span class="d-block text-center mb-2"><b>大學部</b></span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">語言</th>
                                <th scope="col">年度 </th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($admissions as $admission)
                                <form action='{{ route('delete_admission') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $admission->language }}</td>
                                        <td>{{ $admission->year }}</td>
                                        <td><a
                                                href="{{ route('re_admission_view', ['id' => $admission->admissions_id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $admission->admissions_id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $admission->admissions_id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <span class="d-block text-center mb-2"><b>碩士班、碩士班在職專班、推廣學分班</b></span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">放置位置</th>
                                <th scope="col">修改</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($masters as $master)
                                <tr>
                                    <td>{{ $master->name }}</td>
                                    <td><a href="{{ route('re_master_view', ['id' => $master->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <span class="d-block text-center mb-2"><b>招生簡章、歷屆考古題(大學部、研究所)</b></span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">放置位置</th>
                                <th scope="col">連結位置</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($recruitstudents as $recruitstudent)
                                <form action='{{ route('delete_recruitstudent') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $recruitstudent->name }}</td>
                                        <td>{{ $recruitstudent->link }}</td>
                                        <td><a
                                                href="{{ route('re_recruitstudent_view', ['id' => $recruitstudent->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $recruitstudent->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $recruitstudent->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <span class="d-block text-center mb-2"><b>考古題 - 研究所</b></span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">年度</th>
                                <th scope="col">連結位置</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($institutes as $institute)
                                <form action='{{ route('delete_institute') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $institute->year }}</td>
                                        <td>{{ $institute->link }}</td>
                                        <td><a href="{{ route('re_institute_view', ['id' => $institute->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $institute->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $institute->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <span class="d-block text-center mb-2"><b>考古題 - 在職專班</b></span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">年度</th>
                                <th scope="col">連結位置</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($sscs as $ssc)
                                <form action='{{ route('delete_institute') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $ssc->year }}</td>
                                        <td>{{ $ssc->link }}</td>
                                        <td><a href="{{ route('re_institute_view', ['id' => $ssc->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $ssc->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $ssc->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <span class="d-block text-center mb-2"><b>考古題 - 轉學考英文考題</b></span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">年度</th>
                                <th scope="col">連結位置</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($transfers as $transfer)
                                <form action='{{ route('delete_institute') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $transfer->year }}</td>
                                        <td>{{ $transfer->link }}</td>
                                        <td><a href="{{ route('re_institute_view', ['id' => $transfer->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $transfer->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $transfer->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <span class="d-block text-center mb-2"><b>標竿校友</b></span>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">校友名稱</th>
                                <th scope="col">任職單位</th>
                                <th scope="col">優秀表現</th>
                                <th scope="col">相關報導/資訊</th>
                                <th scope="col">修改內容</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($eduequipment2s as $eduequipment2)
                                <form action='{{ route('delete_alumni') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $eduequipment2->classname }}</td>
                                        <td>{{ $eduequipment2->equipment }}</td>
                                        <td>{{ $eduequipment2->performance }}</td>
                                        <td>{{ $eduequipment2->info }}</td>
                                        <td><a href="{{ route('re_alumni_view', ['id' => $eduequipment2->id]) }}">修改</a>
                                        <td><button type="submit" name="id" value="{{ $eduequipment2->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $eduequipment2->id }}刪除</button>
                                        </td>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="clearfix mt-5">
                    <a href="{{ route('keyaffair') }}"><button type="button" class="cancelbtn">返回</button></a>
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
