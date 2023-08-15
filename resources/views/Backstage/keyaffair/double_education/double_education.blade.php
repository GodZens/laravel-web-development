@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/double_education/double_education.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>國際雙聯學制</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_double_education_view') }}" class="btn-size btn btn-outline-danger ml-3">新增申請資料</a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">放置位置</th>
                                <th scope="col">檔案名稱 </th>
                                <th scope="col">修改</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($doublemethods as $doublemethod)
                                <tr>
                                    <td>實施辦法</td>
                                    <td>{{ $doublemethod->date }}</td>
                                    <td><a
                                            href="{{ route('re_doublemethod_view', ['id' => $doublemethod->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($doubleprocedures as $doubleprocedure)
                                <tr>
                                    <td>申請手續</td>
                                    <td>{{ $doubleprocedure->date }}</td>
                                    <td><a
                                            href="{{ route('re_doublemethod_view', ['id' => $doubleprocedure->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($doubleprocesses as $doubleprocess)
                                <tr>
                                    <td>申請流程</td>
                                    <td>{{ $doubleprocess->date }}</td>
                                    <td><a
                                            href="{{ route('re_doublemethod_view', ['id' => $doubleprocess->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($doublecourseprocesses as $doublecourseprocess)
                                <tr>
                                    <td>雙聯學制課程流程圖</td>
                                    <td>{{ $doublecourseprocess->date }}</td>
                                    <td><a
                                            href="{{ route('re_doublemethod_view', ['id' => $doublecourseprocess->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($doublecourseaustrprocesses as $doublecourseaustrprocess)
                                <tr>
                                    <td>澳洲坎培拉大學選修課程流程圖</td>
                                    <td>{{ $doublecourseaustrprocess->date }}</td>
                                    <td><a
                                            href="{{ route('re_doublemethod_view', ['id' => $doublecourseaustrprocess->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($doublecoursefrees as $doublecoursefree)
                                <tr>
                                    <td>學分抵免</td>
                                    <td>{{ $doublecoursefree->date }}</td>
                                    <td><a
                                            href="{{ route('re_doublemethod_view', ['id' => $doublecoursefree->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($doubleaustrlifes as $doubleaustrlife)
                                <tr>
                                    <td>坎培拉生活</td>
                                    <td>{{ $doubleaustrlife->date }}</td>
                                    <td><a
                                            href="{{ route('re_doublemethod_view', ['id' => $doubleaustrlife->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <span class="d-block text-center mb-2"><b>申請文件及手冊</b></span>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案名稱</th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($double_educations as $double_education)
                            <form action='{{ route('delete_double_education') }}' method='POST'>
                                @csrf
                                <tr>
                                    <td>{{ $double_education->file }}</td>
                                    <td>{{ $double_education->date }}</td>
                                    <td><a
                                            href="{{ route('re_double_education_view', ['id' => $double_education->id]) }}">修改</a>
                                    </td>
                                    <td><button type="submit" name="id" value="{{ $double_education->id }}"
                                            class="btn btn-primary btn-sm m-0">{{ $double_education->id }}刪除</button>
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
