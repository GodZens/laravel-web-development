@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/depnew/depnew.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>招生專區</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_depnew_view') }}" class="btn-size btn btn-outline-primary ml-3">新增系所公告</a>
                </div>
                <hr>

                <div class="col-12 d-flex justify-content-center"><b>請選擇公告類型</b></div>

                <div class="col-12 d-flex justify-content-center">

                    <form action='{{ route('depnew') }}' method='POST'>
                        @csrf
                        <select name="type" onchange="location.href='depnew?type='+this.value">
                            <option value="all">全部</option>
                            @foreach ($newscategorys as $newscategory)
                                <option value="{{ $newscategory->typeid }}"
                                    {{ $newscategory->typeid == $type ? 'selected' : '' }}>
                                    {{ $newscategory->type }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">發佈日期</th>
                                <th scope="col">最新消息</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                                <th scope="col">上移</th>
                                <th scope="col">下移</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            <!-- @foreach ($depnews as $depnew)
                                <form action='{{ route('delete_depnew') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $depnew->id }}</td>
                                        <td>{{ $depnew->date }}</td>
                                        <td>{{ $depnew->title }}</td>
                                        <td><a href="{{ route('re_depnew_view', ['id' => $depnew->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $depnew->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                        <td>
                                            <a href="{{ route('move_up_depnew', ['id' => $depnew->id]) }}" class="btn btn-primary btn-sm m-0">上移</a>
                                            <a href="{{ route('move_down_depnew', ['id' => $depnew->id]) }}" class="btn btn-primary btn-sm m-0">下移</a>
                                        </td>
                                    </tr>
                                </form>

                            @endforeach -->
                            @foreach ($depnews as $depnew)
                                <form action="{{ route('delete_depnew') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $depnew->id }}</td>
                                        <td>{{ $depnew->date }}</td>
                                        <td>{{ $depnew->title }}</td>
                                        <td><a href="{{ route('re_depnew_view', ['id' => $depnew->id]) }}">修改</a></td>
                                        <td>
                                            <button type="submit" name="id" value="{{ $depnew->id }}" class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                        <td>
                                            <a href="{{ route('move_up_depnew', ['id' => $depnew->id]) }}" class="btn btn-primary btn-sm m-0">上移</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('move_down_depnew', ['id' => $depnew->id]) }}" class="btn btn-primary btn-sm m-0">下移</a>
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
        {{ $depnews->links() }}
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
