@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/quick_link/library.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>系圖書館</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_booktype_view') }}" class="btn-size btn btn-outline-primary ml-3">新增類型</a>
                    <a href="{{ route('delete_booktype_view') }}" class="btn-size btn btn-outline-success ml-3">刪除類型</a>
                    <a href="{{ route('add_book_view') }}" class="btn-size btn btn-outline-secondary ml-3">新增書籍</a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">放置位置</th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>

                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($alltexts as $alltext)
                                <tr>
                                    <td>使用及借閱規則</td>
                                    <td>{{ $alltext->date }}</td>
                                    <td><a href="{{ route('re_bookrule_view', ['id' => $alltext->id]) }}">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 m-auto  mb-5 mt-3">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">書名</th>
                                <th scope="col">作者</th>
                                <th scope="col">出版社</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">類型</th>
                                <th scope="col">新書</th>
                                <th scope="col">推薦</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($librarys as $library)
                                <form action='{{ route('delete_book') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $library->bookname }}</td>
                                        <td>{{ $library->author }}</td>
                                        <td>{{ $library->publish }}</td>
                                        <td>{{ $library->isbn }}</td>
                                        <td>{{ $library->type }}</td>
                                        @if ($library->new == 1)
                                            <td>是</td>
                                        @else
                                            <td>否</td>
                                        @endif
                                        @if ($library->top == 1)
                                            <td>是</td>
                                        @else
                                            <td>否</td>
                                        @endif
                                        <td><a href="{{ route('re_book_view', ['id' => $library->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $library->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $library->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('quick_link') }}"><button type="button" class="cancelbtn">返回</button></a>
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
