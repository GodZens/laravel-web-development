@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/department_profile/introduction.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12 ">
                <h1>系所簡介</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <div class="col-8 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">放置位置</th>
                                <th scope="col" width="60%">更新日期</th>
                                <th scope="col">修改</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($edutargets as $edutarget)
                                <tr>
                                    <th scope="row">教育目標</th>
                                    <td>{{ $edutarget->date }}</td>
                                    <td><a
                                            href="{{ route('re_introduction_view', ['id' => $edutarget->id]) }}">{{ $edutarget->id }}修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($depintroducts as $depintroduct)
                                <tr>
                                    <th scope="row">系所簡介</th>
                                    <td>{{ $depintroduct->date }}</td>
                                    <td><a
                                            href="{{ route('re_introduction_view', ['id' => $depintroduct->id]) }}">{{ $depintroduct->id }}修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($depintroductns as $depintroductn)
                                <tr>
                                    <th scope="row">系所特色</th>
                                    <td>{{ $depintroductn->date }}</td>
                                    <td><a
                                            href="{{ route('re_introduction_view', ['id' => $depintroductn->id]) }}">{{ $depintroductn->id }}修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($depintroductn1s as $depintroductn1)
                                <tr>
                                    <th scope="row">教學創新</th>
                                    <td>{{ $depintroductn1->date }}</td>
                                    <td><a
                                            href="{{ route('re_introduction_view', ['id' => $depintroductn1->id]) }}">{{ $depintroductn1->id }}修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($studentabilitys as $studentability)
                                <tr>
                                    <th scope="row">學生核心能力</th>
                                    <td>{{ $studentability->date }}</td>
                                    <td><a
                                            href="{{ route('re_introduction_view', ['id' => $studentability->id]) }}">{{ $studentability->id }}修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($tests as $test)
                                <tr>
                                    <th scope="row">test</th>
                                    <td>{{ $test->date }}</td>
                                    <td><a
                                            href="{{ route('re_introduction_view', ['id' => $test->id]) }}">{{ $test->id }}修改</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('dep_profile') }}"><button type="button" class="cancelbtn">返回</button></a>
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
