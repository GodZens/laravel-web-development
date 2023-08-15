<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>輪播圖</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/carousel/carousel.css') }}">
</head>

<body>

    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12 ">
                <h1>首頁輪播圖</h1>
                <!-- <p>Please fill in this form to create an account.</p> -->
                <hr>

                <div class="col-8 m-auto  mb-5">
                    <form action="{{ route('delete_carousel') }}" method="POST">
                        @csrf
                        <table class="table table-hover text-center border">
                            <thead class="thead-dark ">
                                <tr>
                                    <th scope="col">順序</th>
                                    <th scope="col" width="60%">檔名</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="m-auto">
                                @foreach ($carousels as $carousel)
                                    <tr>
                                        <th scope="row">{{ $carousel->weight }}</th>
                                        <td>{{ $carousel->name }}</td>
                                        <td><button type="submit" name="id" value="{{ $carousel->id }}"
                                                class="btn btn-primary btn-sm m-0">{{ $carousel->id }}刪除</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="clearfix mt-5">
                    <a href="{{route('add_carousel_view')}}"><button type="button" class="signupbtn">新增</button></a>
                    <a href="{{ route('index') }}"><button type="button" class="cancelbtn">返回</button></a>
                </div>

            </div>
        </div>

    </div>
    @if (Session::has('success'))
        <div id="alert" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/a02478fc6d.js') }}" crossorigin="anonymous"></script>
    <script>
        // 顯示警告框
        document.getElementById("alert").style.display = "block";

        // 設定一段時間後隱藏警告框
        setTimeout(function() {
            document.getElementById("alert").style.display = "none";
        }, 2000); // 2000 毫秒為 2 秒
    </script>
</body>

</html>
