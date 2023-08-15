@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/depmethod.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.depintroduct')
            <div class="col-12 col-lg-10 p-0">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                            Department method</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('en_home')}}" class="color-gray">front page</a></li><span>></span>
                        <li><a href="{{route('en_depintroduct')}}" class="color-gray">Department Profile</a></li><span>></span>
                        <li>Department method</li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="download_subtitle fs-18"><i class="fa-solid fa-circle-arrow-right mr-2"></i>file</h3>
                    <table class="table table-striped download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="70%">file name</th>
                                <th scope="col" width="30%">file link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" width="70%">National Yunlin University of Science and Technology Department of Applied Foreign Languages Promotion Education Master Credit Credit Regulations-1100915</th>
                                <td>
                                    <a href="#"><img src="../學生專區/doc.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/pdf.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/odt.png" alt=""></a>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row" width="70%">Graduate School of Applied Foreign Languages can take foreign courses-1110623</th>
                                <td>
                                    <a href="#"><img src="../學生專區/doc.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/pdf.png" alt=""></a>
                                    <a href="#"><img src="../學生專區/odt.png" alt=""></a>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row" width="70%">Reward points for full-time teachers of the Department of Applied Foreign Languages, National Yunlin University of Science and Technology-1110623</th>
                                <td>
                                    <a href="#"><img src="{{ asset('img/doc.png') }}" alt="doc"></a>
                                    <a href="#"><img src="{{ asset('img/pdf.png') }}" alt="pdf"></a>
                                    <a href="#"><img src="{{ asset('img/odt.png') }}" alt="odt"></a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
