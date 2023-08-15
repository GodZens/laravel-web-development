@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/retiredteacher.css') }}">
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
                            Retirees</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('en_home')}}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{route('en_teacher')}}" class="color-gray"> Faculty</a></li><span>></span>
                        <li>Retirees</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="10%">teacher name</th>
                                <th scope="col" width="30%">teaching content</th>
                                <th scope="col" width="25%">academic qualifications</th>
                                <th scope="col" width="30%">contact method</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $reteachers as $reteacher)
                            <tr>
                                <th scope="row" width="15%">{{$reteacher->ename}}</th>
                                <td width="30">{{$reteacher->eability}}</td>
                                <td width="30">{{$reteacher->eeducation}}</td>
                                <td width="30"><a href="mailto:{{$reteacher->email}}">{{$reteacher->email}}</a></td>
                            </tr>
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
