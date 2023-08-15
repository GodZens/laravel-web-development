@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/foreignseries.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-12 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            External series</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_foreignseries') }}" class="color-gray">External series</a></li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('en_foreignseries') }}' method='POST'>
                        @csrf
                        <select id="title" name="title" onchange="location.href='en_foreignseries?title='+this.value+'&page=1'">
                            <option value="0">please choose</option>
                            @foreach ($titles as $titlename)
                                <option value="{{ $titlename->en_title }}"
                                    {{ $titlename->en_title == $title ? 'selected' : '' }}>{{ $titlename->en_title }}</option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12  mt-3">
                    @foreach ($imgs as $img)
                        <img src="{{ asset('download/'.$img->img) }}"><br>
                    @endforeach
                </div>
                <div class="col-12  mt-3">
                    @foreach ($daflnewsimgs as $daflnewsimg)
                        <a href="#" onclick="location.href='en_foreignseries?title='+document.getElementById('title').value+'&page='+{{ $daflnewsimg->page }}">{{ $daflnewsimg->page }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- 側邊選單+教育目標 -->
@endsection
@section('javascript')
    <script>
        // 碰到該物件自動觸發click事件
        $('.dropdown').hover(function() {
            $('.dropdown-toggle').trigger('click');
        });
    </script>
@endsection
