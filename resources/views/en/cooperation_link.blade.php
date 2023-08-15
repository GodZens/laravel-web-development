@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cooperation_link.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.partner')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 shared-title"><b class="shared-disc">
                            Industry-University Cooperation</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_partner_link') }}" class="color-gray"> Industry-University Link</a></li><span>></span>
                        <li>Industry-University Cooperation</li>

                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('en_cooperation_link') }}' method='POST'>
                        <select onchange="location.href='en_cooperation_link?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ( $options_year as $option_year)
                            <option value="{{$option_year->year}}">{{$option_year->year}}</option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="25%" class="text-center">during execution</th>
                                <th scope="col" width="30%" class="text-center">Partner</th>
                                <th scope="col" width="25%" class="text-center">plan name</th>
                                <th scope="col" width="20%" class="text-center">program host</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $cooperations as $cooperation)
                            <tr>
                                <th scope="row">{{$cooperation->date}}</th>
                                <td>{{$cooperation->efirm}}</td>
                                <td>{{$cooperation->eprojectname}}</td>
                                <td class="text-center">{{$cooperation->eleader}}</td>
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
