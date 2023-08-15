@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_future_employment/addcategory.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1><b>新增類別</b></h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">類別 </th>

                                <th scope="col">刪除</th>

                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($categorys as $category)
                                <form action="{{ route('deletecategory') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->class }}</td>
                                        <td><button type="submit" name="id" value="{{ $category->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $category->id }}刪除</button></td>
                                    </tr>
                                </form>
                                @php
                                    $count = $loop->count;
                                @endphp
                            @endforeach
                            <form action="{{ route('addcategory') }}" method="POST">
                                @csrf
                                <td>{{ $count + 1 }}</td>
                                <td><input type="text" name="class" id="class" /></td>
                                <td><button type="submit" class="btn btn-primary btn-sm m-0">新增</button>
                                <td>
                            </form>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix mt-5">
                    <a href="{{ route('future_employment') }}"><button type="button"
                            class="cancelbtn signupbtn">返回</button>
                </div>
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
