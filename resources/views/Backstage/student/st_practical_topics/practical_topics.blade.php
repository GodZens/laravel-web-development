@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/Backstage/student/st_practical_topics/practical_topics.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>英文實務專題</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('add_implement_method_view') }}"><button type="button"
                            class="btn-size btn btn-outline-primary">新增實務辦法</button></a>
                    <a href="{{ route('add_pt_download_view') }}"><button type="button"
                            class="btn-size btn btn-outline-info ml-3">新增下載檔案</button></a>
                    <a href="{{ route('add_internship_view') }}"><button type="button"
                            class="btn-size btn btn-outline-success ml-3">新增實習單位</button></a>
                    <a href="{{ route('add_result_view') }}"><button type="button"
                            class="btn-size btn btn-outline-secondary ml-3">新增成果</button></a>
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <form action='{{ route('practical_topics') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='practical_topics?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <span class="d-block text-center mt-2">目前為 {{ $year }} 學年度</span>
                <span class="text-center d-block">此學年度與碩士論文的學年度一樣，若要新增學年度請到碩士論文新增</span>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <span class="d-block text-center mt-2 mb-2"><b>實施辦法</b></span>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">語言</th>
                                <th scope="col">更新日期 </th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($specialtopic_methods as $specialtopic_method)
                                {{-- 修改和刪除還沒做 --}}
                                <form action="{{ route('delete_implement_method') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $specialtopic_method->lang }}</td>
                                        <td>{{ $specialtopic_method->date }}</td>
                                        <td><a
                                                href="{{ route('re_implement_method_view', ['id' => $specialtopic_method->id]) }}">{{ $specialtopic_method->id }}修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $specialtopic_method->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $specialtopic_method->id }}刪除</button>
                                        </td>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 m-auto  mb-5">
                    <span class="d-block text-center mt-2 mb-2"><b>相關表單</b></span>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">檔案描述</th>
                                <th scope="col">檔案名稱 </th>
                                <th scope="col">檔案名稱word</th>
                                <th scope="col">檔案修改</th>
                                <th scope="col">檔案刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($pt_downloads as $pt_download)
                                {{-- 修改和刪除還沒做 --}}
                                <form action="{{ route('delete_pt_download') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $pt_download->description }}<br />{{ $pt_download->edescription }}</td>
                                        <td>{{ $pt_download->file }}<br />{{ $pt_download->file_en }}</td>
                                        <td>{{ $pt_download->file_word }}</td>
                                        <td><a
                                                href="{{ route('re_pt_download_view', ['id' => $pt_download->id]) }}">{{ $pt_download->id }}修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $pt_download->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $pt_download->id }}刪除</button></td>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 m-auto  mb-5">
                    <span class="d-block text-center mt-2 mb-2"><b>實習單位</b></span>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">實習單位</th>
                                <th scope="col">連絡人 </th>
                                <th scope="col">連絡電話</th>
                                <th scope="col">課程模組類別</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($internships as $internship)
                                {{-- 修改和刪除還沒做 --}}
                                <form action="{{ route('delete_internship') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $internship->unit }}</td>
                                        <td>{{ $internship->people }}</td>
                                        <td>{{ $internship->number }}</td>
                                        <td>{{ $internship->mode }}</td>
                                        <td><a
                                                href="{{ route('re_internship_view', ['id' => $internship->id]) }}">{{ $internship->id }}修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $internship->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $internship->id }}刪除</button></td>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 m-auto  mb-5">
                    <span class="d-block text-center mt-2 mb-2"><b>成果</b></span>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">學號</th>
                                <th scope="col">學生姓名 </th>
                                <th scope="col">專題題目</th>
                                <th scope="col">指導老師</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            {{-- 修改和刪除還沒做 --}}
                            @foreach ($results as $result)
                                @foreach ($result_students as $result_student)
                                    @if ($result->id == $result_student->id)
                                        <form action="{{ route('delete_result') }}" method="POST">
                                            @csrf
                                            <tr>
                                                <td>{{ $result_student->number }}</td>
                                                <td>{{ $result_student->name }}</td>
                                                <td>{{ $result->topic }}</td>
                                                <td>{{ $result->teacher }}</td>
                                                <td><a
                                                        href="{{ route('re_result_view', ['id' => $result->id]) }}">{{ $result->id }}修改</a>
                                                </td>
                                                <td><button type="submit" value="{{ $result->id.'@'.$result_student->st_id }}"
                                                        name="id" class="btn btn-primary btn-sm m-0">{{ $result_student->st_id }}刪除</button>
                                                </td>
                                                </td>
                                            </tr>
                                        </form>
                                    @endif
                                @endforeach
                            @endforeach
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
