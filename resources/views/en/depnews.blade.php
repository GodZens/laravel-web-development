@extends('en.layouts.layout')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/depnews.css') }}">
@endsection
@section('content')
<div class="container ">
    <div class="row justify-content-between">
        @include('en.sidebar.depnews')
        <div class="col-12 col-lg-10">
            <h1><b class="public-title">{{$name}}</b></h1>
            <!-- 分頁 -->
            <div class="list-wrapper">
                <div class="list-item mb-4">
                    <table class="table table-borderless fs-25">
                        <thead>
                            <tr>
                                <th scope="col">date</th>
                                <th scope="col">title</th>
                            </tr>
                        </thead>
                        @foreach ( $DAS as $DA)
                        <tbody>
                            <tr>
                                <td style="width:20%">{{substr($DA->date,0,10)}}</td>
                                <td style="width:80%"><a href="{{ route('en_depnews_content',['id' => $DA->id]) }}">{{$DA->etitle}}</td></a>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
            <div id="pagination-container"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
@endsection
