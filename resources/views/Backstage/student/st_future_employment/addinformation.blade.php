@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/student/st_future_employment/addinformation.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>新增畢業系友出路</h1>
                <hr>
                <form action="{{ route('addinformation') }}" method="POST">
                    @csrf
                    <label for="system" class="d-block m-0"><b>學制</b></label>
                    <select name="system">
                        <option value="0">請選擇</option>
                        <option value="碩士班">碩士班</option>
                        <option value="四技">四技</option>
                        <option value="二技">二技</option>
                    </select>

                    <label for="graduate" class="d-block mt-2 mb-0"><b>畢業學年度</b></label>
                    <select name="year">
                        <option value="0">請選擇</option>
                        @foreach ($practical_topics_years as $practical_topics_year)
                            <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                            </option>
                        @endforeach
                    </select>

                    <label for="service_unit" class="d-block mt-3"><b>服務單位</b></label>
                    <input type="text" name="service_unit">


                    <span class="d-block"><b>單位部門及職稱</b></span>

                    <select name="class" id="class-selector">
                        <option value="">請選擇</option>
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->class }}</option>
                        @endforeach
                    </select>

                    <select name="department" id="department-selector" style="display: none;">
                        <option value="">請選擇</option>
                        @foreach ($jobtitles as $jobtitle)
                            <option class="department-option" value="{{ $jobtitle->id }}" style="display: none;">
                                {{ $jobtitle->department }}</option>
                        @endforeach
                    </select>

                    <div class="clearfix  mt-3">
                        <button type="submit" class="signupbtn">新增</button>
                        <a href="{{ route('future_employment') }}"><button type="button"
                            class="cancelbtn signupbtn">返回</button></a>
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

    <script>
        // 获取第二个 select 元素中的所有选项
        const departmentOptions = $('#department-selector .department-option');

        // 监听第一个 select 元素的 change 事件
        $('#class-selector').change(function() {
            const selectedClassId = $(this).val();
            console.log(selectedClassId);
            // 隐藏所有选项
            departmentOptions.hide();

            // 显示与所选班级相对应的选项
            departmentOptions.each(function() {
                if ($(this).val() == selectedClassId) {
                    $(this).show();
                }
            });

            // 如果有符合条件的选项，则显示第二个 select 元素，否则隐藏它
            if ($('#department-selector option:selected').length > 0) {
                $('#department-selector').show();
            } else {
                $('#department-selector').hide();
            }
        });
    </script>
@endsection
