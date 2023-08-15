@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/equipment.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.depintroduct')
            <div class="col-12 col-lg-10  p-4">
                <div class="row">
                    <div class="col-12">
                        <h1><b class="equipment_title">Space equipment</b></h1>
                        <span class="dottedline d-block mb-3"></span>
                    </div>
                    <div class="col-12">
                        <table class="equipment_table w-100" border="1px">
                            <tbody>
                                <tr>
                                    <td><strong><span>professional classroom</span></strong></td>
                                    <td><strong><span>classroom equipment</span></strong></td>
                                    <td><strong><span>Function</span></strong></td>
                                </tr>
                                @foreach ( $eduequipments as $eduequipment)
                                <tr>
                                    <td class="text-center" width="50%">
                                        <span class="d-block">{{$eduequipment->classname_en}}</span>
                                        <img class="w-100 classroom_pic" src="{{ asset('img/eduequipment/'.$eduequipment->img) }}" alt="教室">
                                    </td>
                                    <td class="text-center" width="17%">
                                        <ul>
                                            <li>{{$eduequipment->equipment_en}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>{{$eduequipment->function_en}}</li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- 設備 -->
        </div>
    </div>
@endsection
@section('javascript')
@endsection
