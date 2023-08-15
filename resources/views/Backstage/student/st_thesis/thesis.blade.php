@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_thesis/thesis.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>碩士論文</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_method_file_view') }}"><button type="button"
                            class="btn-size btn btn-outline-danger ml-3">新增相關辦法檔案</button></a>
                    <a href="{{ route('add_related_form_view') }}"><button type="button"
                            class="btn-size btn btn-outline-success ml-3">新增相關表單檔案</button></a>
                    <a href="{{ route('add_thesis_view') }}"><button type="button"
                            class="btn-size btn btn-outline-primary ml-3">新增碩士論文</button></a>
                </div>
                <hr>
                <h2 class='h2'>相關辦法</h2>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案名稱</th>
                                <th scope="col">檔案描述</th>
                                <th scope="col">檔案修改</th>
                                <th scope="col">檔案刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            <form action="{{ route('delete_method_file') }}" method="POST">
                                @foreach ($method_files as $method_file)
                                    @csrf
                                    <tr>
                                        <td>{{ $method_file->file }}<br>{{ $method_file->file_en }}</td>
                                        <td>{{ $method_file->description }}<br>{{ $method_file->edescription }}</td>
                                        <td><a
                                                href="{{ route('re_method_file_view', ['id' => $method_file->id]) }}">{{ $method_file->id }}修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $method_file->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $method_file->id }}刪除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
                <h2 class='h2'>相關表單</h2>
                <div class="col-12 m-auto  mb-5 mt-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案名稱</th>
                                <th scope="col">檔案描述</th>
                                <th scope="col">檔案修改</th>
                                <th scope="col">檔案刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            <form action="{{ route('delete_related_form') }}" method="POST">
                                @csrf
                                @foreach ($relate_files as $relate_file)
                                    <tr>
                                        <td>{{ $relate_file->file }}<br>{{ $relate_file->file_en }}</td>
                                        <td>{{ $relate_file->description }}<br>{{ $relate_file->edescription }}</td>
                                        <td><a
                                                href="{{ route('re_related_form_view', ['id' => $relate_file->id]) }}">{{ $relate_file->id }}修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $relate_file->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $relate_file->id }}刪除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
                <h2 class='h2'>碩士論文</h2>
                <div class="col-12 d-flex justify-content-center mb-3 mt-4">
                    <form action='{{ route('back_thesis') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='back_thesis?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>

                <div class="col-12 m-auto  mb-5 mt-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">作者</th>
                                <th scope="col">題目</th>
                                <th scope="col">指導老師</th>
                                <th scope="col">學年度</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            <form action="{{ route('delete_thesis') }}" method="POST">
                                @csrf
                                @foreach ($thesis_files as $thesis_file)
                                    <tr>
                                        <td>{{ $thesis_file->author }}<br>{{ $thesis_file->eauthor }}</td>
                                        <td>{{ $thesis_file->topic }}<br>{{ $thesis_file->etopic }}</td>
                                        <td>{{ $thesis_file->teacher }} </td>
                                        <td>{{ $thesis_file->year }} </td>
                                        <td><a
                                                href="{{ route('re_thesis_view', ['id' => $thesis_file->id]) }}">{{ $thesis_file->id }}修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $thesis_file->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $thesis_file->id }}刪除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix mt-5">
                    <a href="{{ route('back_student') }}"><button type="button" class="cancelbtn">返回</button></a>
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
