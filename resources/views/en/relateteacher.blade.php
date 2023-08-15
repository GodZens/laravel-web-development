@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/relateteacher.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.teacher')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            Related teachers</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('en_home')}}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{route('en_teacher')}}" class="color-gray"> Faculty</a></li><span>></span>
                        <li>Related teachers</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="15%">Teacher name</th>
                                <th scope="col" width="35%">Teacher profile</th>
                                <th scope="col" width="15%">Teacher name</th>
                                <th scope="col" width="35%">Teacher profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < $REcount; $i += 2)
                                <tr>
                                    <td scope="row" width="15%" class="bg-gray">{{ $REteachers[$i]->ename ?? ''}}
                                    </td>
                                    <td width="35%" class="bg-gray">
                                        <span class="d-block">{{ $REteachers[$i]->eposition ?? ''}}</span>
                                        <span class="d-block">{{ $REteachers[$i]->eability ?? ''}}</span>
                                        <span class="d-block">{{ $REteachers[$i]->eeducation ?? ''}}</span>
                                        <a href="{{ $REteachers[$i]->email }}">{{ $REteachers[$i]->email ?? ''}}</a>
                                    </td>
                                    <td scope="row" width="15%">{{ $REteachers[$i + 1]->ename ?? '' }}
                                    </td>
                                    <td width="35%">
                                        <span class="d-block">{{ $REteachers[$i + 1]->eposition ?? '' }}</span>
                                        <span class="d-block">{{ $REteachers[$i + 1]->eability ?? '' }}</span>
                                        <span class="d-block">{{ $REteachers[$i + 1]->eeducation ?? '' }}</span>
                                        <a
                                            href="{{ $REteachers[$i + 1]->email ?? '' }}">{{ $REteachers[$i + 1]->email ?? '' }}</a>
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
