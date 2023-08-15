@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/partner_link.css') }}">
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
                                Partner</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_partner_link') }}" class="color-gray"> Industry-University Link</a></li><span>></span>
                        <li>Partner</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="50%" class="text-center">manufacturers</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($firmplans as $firmplan)
                                <tr>
                                    @if ($firmplan->efirm != '')
                                        <th scope="row">{{ $firmplan->efirm }}</th>
                                    @endif
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
