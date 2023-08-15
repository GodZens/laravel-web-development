@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/PTteacher.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.teacher')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                兼任師資</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{route('teacher')}}" class="color-gray"> 系所師資</a></li><span>></span>
                        <li>兼任師資</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="15%">教師姓名</th>
                                <th scope="col" width="35%">教師資料</th>
                                <th scope="col" width="15%">教師姓名</th>
                                <th scope="col" width="35%">教師資料</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < $PTcount; $i += 2)
                                <tr>
                                    <td scope="row" width="15%" class="bg-gray">{{ $PTteachers[$i]->name }}
                                    </td>
                                    <td width="35%" class="bg-gray">
                                        <span class="d-block">{{ $PTteachers[$i]->position }}</span>
                                        <span class="d-block">{{ $PTteachers[$i]->ability }}</span>
                                        <span class="d-block">{{ $PTteachers[$i]->education }}</span>
                                        <a href="{{ $PTteachers[$i]->email }}">{{ $PTteachers[$i]->email }}</a>
                                    </td>
                                    {{-- ?? ""代表當沒有值的時候以空值代替 --}}
                                    <td scope="row" width="15%">{{ $PTteachers[$i + 1]->name ?? '' }}
                                    </td>
                                    <td width="35%">
                                        <span class="d-block">{{ $PTteachers[$i + 1]->position ?? '' }}</span>
                                        <span class="d-block">{{ $PTteachers[$i + 1]->ability ?? '' }}</span>
                                        <span class="d-block">{{ $PTteachers[$i + 1]->education ?? '' }}</span>
                                        <a
                                            href="{{ $PTteachers[$i + 1]->email ?? '' }}">{{ $PTteachers[$i + 1]->email ?? '' }}</a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
