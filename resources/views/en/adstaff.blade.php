@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adstaff.css') }}">
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
                            administration staff</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('en_home')}}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{route('en_teacher')}}" class="color-gray"> Faculty</a></li><span>></span>
                        <li>administration staff</li>
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
                                                {{ $adstaff->ename . ' / ' . $adstaff->eposition }}</span>
                                            <span class="d-block">extension: {{ $adstaff->extension }}</span>
                                            <span class="d-block">E-mail：<a href="mailto:{{ $adstaff->email }}">
                                                    {{ $adstaff->email }}</a></span>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td width="100">
                                            <span class="d-block">{{ $adstaff->ename . ' / ' . $adstaff->eposition }}</span>
                                            <span class="d-block">extension:{{ $adstaff->extension }}</span>
                                            <span class="d-block mb-2">E-mail：<a
                                                    href="mailto:{{ $adstaff->email }}">{{ $adstaff->email }}</a></span>
                                            <ul>
                                                @foreach ($positions as $position)
                                                    @if ($position->name == $adstaff->name)
                                                        <li class="shared-disc">{{ $position->edescription }}</li>
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
