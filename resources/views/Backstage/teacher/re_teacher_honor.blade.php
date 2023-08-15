@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/re_teacher_honor.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>修改教師榮譽事項</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <label for="name" class="d-block mb-0 "><b>{{ $name }}</b></label>
                {{-- 教師經歷 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">教師經歷</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">經歷(中文) </th>
                                <th scope="col">經歷(英文) </th>
                                <th scope="col">開始日期</th>
                                <th scope="col">結束日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_texperiences as $T_texperience)
                                <form action='{{ route('delete_texperience') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_texperience->description }}</th>
                                        <th scope="row">{{ $T_texperience->edescription }}</th>
                                        <th scope="row">{{ $T_texperience->start }}</th>
                                        <th scope="row">{{ $T_texperience->end }}</th>
                                        <td><a href="{{ route('re_texperience_view', ['id' => $T_texperience->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_texperience->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- 期刊論文 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">期刊論文</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">期刊論文 </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_thesispapers as $T_thesispaper)
                                <form action='{{ route('delete_thesispaper') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_thesispaper->description }}</th>
                                        <th scope="row">{{ $T_thesispaper->date }}</th>
                                        <td><a href="{{ route('re_thesispaper_view', ['id' => $T_thesispaper->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_thesispaper->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 研討會論文 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">研討會論文</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">研討會論文 </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_conpapers as $T_conpaper)
                                <form action='{{ route('delete_conpaper') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_conpaper->description }}</th>
                                        <th scope="row">{{ $T_conpaper->date }}</th>
                                        <td><a href="{{ route('re_conpaper_view', ['id' => $T_conpaper->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_conpaper->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 新增研討會發表 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">研討會發表</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">研討會發表 </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_conpublications as $T_conpublication)
                                <form action='{{ route('delete_conpublic') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_conpublication->description }}</th>
                                        <th scope="row">{{ $T_conpublication->date }}</th>
                                        <td><a
                                                href="{{ route('re_conpublic_view', ['id' => $T_conpublication->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_conpublication->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 技術報告 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">技術報告</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">技術報告 </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_techpapers as $T_techpaper)
                                <form action='{{ route('delete_techpaper') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_techpaper->description }}</th>
                                        <th scope="row">{{ $T_techpaper->date }}</th>
                                        <td><a href="{{ route('re_techpaper_view', ['id' => $T_techpaper->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_techpaper->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 專利 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">專利</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">專利 </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_techpatents as $T_techpatent)
                                <form action='{{ route('delete_techpatent') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_techpatent->description }}</th>
                                        <th scope="row">{{ $T_techpatent->date }}</th>
                                        <td><a href="{{ route('re_techpatent_view', ['id' => $T_techpatent->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_techpatent->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 專書 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">專書</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">專書 </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_books as $T_book)
                                <form action='{{ route('delete_book') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_book->description }}</th>
                                        <th scope="row">{{ $T_book->date }}</th>
                                        <td><a href="{{ route('re_book_view', ['id' => $T_book->id]) }}">修改</a></td>
                                        <td><button type="submit" name="id" value="{{ $T_book->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 其他著作 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">其他著作</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">其他著作 </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_otherbooks as $T_otherbook)
                                <form action='{{ route('delete_otherbook') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_otherbook->description }}</th>
                                        <th scope="row">{{ $T_otherbook->date }}</th>
                                        <td><a href="{{ route('re_otherbook_view', ['id' => $T_otherbook->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_otherbook->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 榮譽 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">榮譽</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">榮譽(中文) </th>
                                <th scope="col">榮譽(英文) </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_honors as $T_honor)
                                <form action='{{ route('delete_honor') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_honor->description }}</th>
                                        <th scope="row">{{ $T_honor->edescription }}</th>
                                        <th scope="row">{{ $T_honor->date }}</th>
                                        <td><a href="{{ route('re_honor_view', ['id' => $T_honor->id]) }}">修改</a></td>
                                        <td><button type="submit" name="id" value="{{ $T_honor->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- 社會服務 --}}
                <div class="col-10 m-auto  mb-5">
                    <h2 class="fs-small">社會服務</h2>
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">經歷(中文) </th>
                                <th scope="col">經歷(英文) </th>
                                <th scope="col">日期</th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($T_socialservicess as $T_socialservices)
                                <form action='{{ route('delete_social') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $T_socialservices->description }}</th>
                                        <th scope="row">{{ $T_socialservices->edescription }}</th>
                                        <th scope="row">{{ $T_socialservices->date }}</th>
                                        <td><a
                                                href="{{ route('re_social_view', ['id' => $T_socialservices->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $T_socialservices->id }}"
                                                class="btn btn-primary btn-sm m-0">刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('back_teacher') }}"><button type="button" class="cancelbtn">返回</button></a>
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
