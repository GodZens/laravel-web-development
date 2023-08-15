@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/Backstage/student/st_future_employment/fe_modification.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        <div class="row">
            <div class="col-12">
                <h1>未來就業修改</h1>

                <hr>
                @foreach ($future_ids as $future_id)
                    <form action="{{ route('fe_modification', ['id' => $future_id->fe_id]) }}" method="POST">
                        @csrf

                        <label for="system" class="d-block m-0"><b>學制</b></label>
                        <select name="system">
                            <option value="碩士班" {{ $future_id->type == '碩士班' ? 'selected' : '' }}>碩士班</option>
                            <option value="四技" {{ $future_id->type == '四技' ? 'selected' : '' }}>四技</option>
                            <option value="二技" {{ $future_id->type == '二技' ? 'selected' : '' }}>二技</option>
                        </select>

                        <label for="graduate" class="d-block mt-2 mb-0"><b>畢業學年度</b></label>
                        <select name="graduate">
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}" {{ $practical_topics_year->year == $future_id->year ? 'selected' : '' }}>{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>

                        <label for="service_unit" class="d-block mt-3"><b>服務單位</b></label>
                        <input type="text" name="service_unit" value={{ $future_id->unit }}>

                        <span class="d-block"><b>單位部門及職稱</b></span>
                        <select name="class" id="class-selector">
                            @foreach ($categorys as $category)
                                <option value={{ $category->id }}
                                    {{ $category->class == $future_id->class ? 'selected' : '' }}>
                                    {{ $category->class }}
                                </option>
                            @endforeach
                        </select>

                        <select name="department" id="department-selector" style="display: none;">
                            @foreach ($jobtitles as $jobtitle)
                                <option class="department-option" value="{{ $jobtitle->de_id }}" id="{{ $jobtitle->id }}"
                                    style="display: none; ">
                                    {{ $jobtitle->department }}</option>
                            @endforeach
                        </select>

                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('future_employment') }}"><button type="button"
                                    class="cancelbtn signupbtn">返回</button></a>
                        </div>
                    </form>
                @endforeach
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
                console.log($(this).attr('id'));
                if ($(this).attr('id') == selectedClassId) {
                    $(this).prop('selected', true);
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
