@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/outstanding.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mt-5">
        <div class="row">
            <div class="col-12 ">
                <h1>畢業系友傑出表現</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{route('add_outstanding_view')}}" class="btn-size btn btn-outline-danger ml-3">新增傑出校友</a>
                </div>
                <hr>

                <div class="col-12 m-auto  mb-5">
                    <table class="table table-hover text-center border">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">校友姓名</th>
                                <th scope="col">校友英文姓名 </th>
                                <th scope="col">傑出榮譽</th>
                                <th scope="col">英文傑出榮譽</th>
                                <th scope="col">類別 </th>
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                            </tr>
                        </thead>
                        <tbody class=" m-auto">
                            @foreach ($outstandings as $outstanding)
                                <form action='{{ route('delete_outstanding') }}' method='POST'>
                                    @csrf
                                    <tr>
                                        <td>{{ $outstanding->name }}</td>
                                        <td>{{ $outstanding->ename }}</td>
                                        <td>{{ $outstanding->description }}</td>
                                        <td>{{ $outstanding->edescription }}</td>
                                        <td>{{ $outstanding->mode }}</td>
                                        <td><a
                                                href="{{ route('re_outstanding_view', ['id' => $outstanding->id]) }}">修改</a>
                                        </td>
                                        <td><button type="submit" name="id" value="{{ $outstanding->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $outstanding->id }}刪除</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{ route('ka_billboard') }}"><button type="button" class="cancelbtn">返回</button></a>
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
