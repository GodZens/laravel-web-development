@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/st_exchange/add_country.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>新增國家</b></h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <form action='{{ route('add_country') }}' method="POST">
                    @csrf
                    <div class="col-12 ml-auto mr-auto mt-4">
                        <span class="d-block mr-3"><b>目前有的國家</b></span>
                        <select name="country">
                            <option value="0">請選擇</option>
                            @foreach ($countrys as $country)
                                <option value="{{ $country->country }}">{{ $country->country }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 ml-auto mr-auto mt-4">
                        <span class="mr-3"><b>新增國家</b></span>
                        <input type="text" name="new_country">
                    </div>

                    <div class="clearfix mt-3">
                        <button type="submit" class="signupbtn">送出</button>
                        <a href="{{ route('report') }}"><button type="button" class="cancelbtn">返回</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('error') }}
        </div>
    @endif
@endsection
@section('javascript')
    <script>
        // 顯示警告框
        document.getElementById("alert").style.display = "block";

        // 設定一段時間後隱藏警告框
        setTimeout(function() {
            document.getElementById("alert").style.display = "none";
        }, 2000); // 2000 毫秒為 2 秒
    </script>
@endsection
