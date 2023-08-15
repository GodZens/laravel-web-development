@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adstaff.css') }}">
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
                                行政人員</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{route('teacher')}}" class="color-gray"> 系所師資</a></li><span>></span>
                        <li>行政人員</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <tbody>
                            @foreach ($adstaffs as $adstaff)
                                @if ($adstaff->name == '系辦公室')
                                    <tr>
                                        <td  width="100%">
                                            <span class="d-block">
                                                {{ $adstaff->name . ' / ' . $adstaff->position }}</span>
                                            <span class="d-block">分機： {{ $adstaff->extension }}</span>
                                            <span class="d-block">E-mail：<a href="mailto:{{ $adstaff->email }}">
                                                    {{ $adstaff->email }}</a></span>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td width="100">
                                            <span class="d-block">{{ $adstaff->name . ' / ' . $adstaff->position }}</span>
                                            <span class="d-block">分機：{{ $adstaff->extension }}</span>
                                            <span class="d-block mb-2">E-mail：<a
                                                    href="mailto:{{ $adstaff->email }}">{{ $adstaff->email }}</a></span>
                                            <ul>
                                                @foreach ($positions as $position)
                                                    @if ($position->name == $adstaff->name)
                                                        <li class="shared-disc">{{ $position->description }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
