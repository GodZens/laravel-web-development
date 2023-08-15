@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/curriculum/curriculum.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12 ">
                <h1>課程架構</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_curr_year_view') }}"><button type="button"
                            class="btn-size btn btn-outline-primary">新增學年度</button></a>
                    <a href="{{ route('delete_curr_year_view') }}"><button type="button"
                            class="btn-size btn btn-outline-secondary">刪除學年度</button></a>
                    <a href="{{ route('add_courseflow_view') }}"><button type="button"
                            class="btn-size btn btn-outline-success">新增課程流程圖</button></a>
                    <a href="{{ route('add_coursemap_view') }}"><button type="button"
                            class="btn-size btn btn-outline-danger">新增課程地圖</button></a>
                    <a href="{{ route('add_courseframe_view') }}"><button type="button"
                            class="btn-size btn btn-outline-warning">新增課程架構圖</button></a>
                    <a href="{{ route('add_graduation_view') }}"><button type="button"
                            class="btn-size btn btn-outline-info">新增畢業門檻</button></a>
                </div>

                <hr>

                <div class="col-12 d-flex justify-content-center">
                    <form action='{{ route('back_curriculum') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='back_curriculum?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($courseframe_years as $courseframe_year)
                                <option value="{{ $courseframe_year->year }}">{{ $courseframe_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>

                <hr>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">課程流程圖</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案名稱</th>
                                <th scope="col">類型</th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($courseflows as $courseflow)
                                <form action='{{ route('delete_courseflow') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $courseflow->file }}</td>
                                        <td>{{ $courseflow->type }}</td>
                                        <td><a href="{{ route('re_courseflow_view', ['id' => $courseflow->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $courseflow->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">課程地圖圖片</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案名稱</th>
                                <th scope="col">類型</th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($coursemaps as $coursemap)
                                <form action='{{ route('delete_coursemap') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $coursemap->file }}</td>
                                        <td>{{ $coursemap->type }}</td>
                                        <td><a href="{{ route('re_coursemap_view', ['id' => $coursemap->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $coursemap->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">課程架構圖圖片</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案名稱</th>
                                <th scope="col">類型</th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($courseframes as $courseframe)
                                <form action='{{ route('delete_courseframe') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $courseframe->file }}</td>
                                        <td>{{ $courseframe->type }}</td>
                                        <td><a href="{{ route('re_courseframe_view', ['id' => $courseframe->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $courseframe->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">畢業門檻</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案名稱(中)</th>
                                <th scope="col">檔案名稱(英)</th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($graduations as $graduation)
                                <form action='{{ route('delete_graduation') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $graduation->description }}</td>
                                        <td>{{ $graduation->edescription }}</td>
                                        <td><a href="{{ route('re_graduation_view', ['id' => $graduation->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $graduation->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">課程規劃</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">上次修改時間</th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($courseplans as $courseplan)
                                <form action='{{ route('delete_courseplan') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $courseplan->date }}</td>
                                        <td><a href="{{ route('re_courseplan_view', ['id' => $courseplan->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $courseplan->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">第二外語</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">上次修改時間</th>
                                <th scope="col">修改 </th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($secondforeigns as $secondforeign)
                                <form action='{{ route('delete_secondforeign') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $secondforeign->date }}</td>
                                        <td><a
                                                href="{{ route('re_secondforeign_view', ['id' => $secondforeign->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $secondforeign->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">課程特色</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">上次修改時間</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($coursefeatures as $coursefeature)
                                <form action='{{ route('delete_coursefeature') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $coursefeature->date }}</td>
                                        <td><a
                                                href="{{ route('re_coursefeature_view', ['id' => $coursefeature->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $coursefeature->id }}"
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
