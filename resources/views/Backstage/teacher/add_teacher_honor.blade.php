@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/teacher/add_teacher_honor.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($T_profiles as $T_profile)
            <form action="{{ route('add_teacher_honor',['name' => $T_profile->name]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>新增教師榮譽事項</h1>
                        <!-- <p>Please fill in this form to create an account.</p> -->
                        <hr>

                        <label for="name" class="d-block mb-0 "><b>{{ $T_profile->name }}</b></label>
                        {{-- 新增教師經歷 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_texper"
                            id="add_texper" value="新增教師經歷" />
                        <div id="add_texper_all">
                            <label for="texper" class="d-block mt-3"><b>教師經歷(中文)</b></label>
                            <input type="text" name="texper[]" >
                            <label for="etexper"><b>教師經歷(英文)</b></label>
                            <input type="text" name="etexper[]" >
                            <label for="start" class="d-block"><b>起始日</b></label>
                            <input type="date" class="datepicker hasDatepicker" id="start[]" name="start[]"
                                placeholder="請選擇日期">
                            <label for="end" class="d-block mt-2"><b>結束日</b></label>
                            <input type="date" class="datepicker hasDatepicker" id="end[]" name="end[]"
                                placeholder="請選擇日期">
                        </div>
                        {{-- 新增期刊論文 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_thesis"
                            id="add_thesis" value="新增期刊論文" />
                        <div id="add_thesis_all">
                            <label for="thesis_year" class="d-block mt-3"><b>期刊論文年份</b></label>
                            <input type="text" name="thesis_year[]" >
                            <label for="thesis" class="d-block mt-3"><b>論文名稱</b></label>
                            <input type="text" name="thesis[]" >
                        </div>
                        {{-- 新增研討會論文 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_conpaper"
                            id="add_conpaper" value="新增研討會論文" />
                        <div id="add_conpaper_all">
                            <label for="conpaper_year" class="d-block mt-3"><b>研討會論文年份</b></label>
                            <input type="text" name="conpaper_year[]" >
                            <label for="conpaper" class="d-block mt-3"><b>論文名稱</b></label>
                            <input type="text" name="conpaper[]" >
                        </div>
                        {{-- 新增研討會發表 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_conpublic"
                            id="add_conpublic" value="新增研討會發表" />
                        <div id="add_conpublic_all">
                            <label for="conpublic_year" class="d-block mt-3"><b>研討會發表年份</b></label>
                            <input type="text" name="conpublic_year[]" >
                            <label for="conpublic" class="d-block mt-3"><b>論文名稱</b></label>
                            <input type="text" name="conpublic[]" >
                        </div>
                        {{-- 新增技術報告 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_techpaper"
                            id="add_techpaper" value="新增技術報告" />
                        <div id="add_techpaper_all">
                            <label for="techpaper_year" class="d-block mt-3"><b>技術報告年份</b></label>
                            <input type="text" name="techpaper_year[]" >
                            <label for="techpaper" class="d-block mt-3"><b>技術報告</b></label>
                            <input type="text" name="techpaper[]" >
                        </div>
                        {{-- 專利 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_techpatent"
                            id="add_techpatent" value="新增專利" />
                        <div id="add_techpatent_all">
                            <label for="techpatent_year" class="d-block mt-3"><b>專利年份</b></label>
                            <input type="text" name="techpatent_year[]" >
                            <label for="techpatent" class="d-block mt-3"><b>專利</b></label>
                            <input type="text" name="techpatent[]" >
                        </div>
                        {{-- 專書 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_book"
                            id="add_book" value="新增專書" />
                        <div id="add_book_all">
                            <label for="book_year" class="d-block mt-3"><b>專書年份</b></label>
                            <input type="text" name="book_year[]" >
                            <label for="book" class="d-block mt-3"><b>專書</b></label>
                            <input type="text" name="book[]" >
                        </div>
                        {{-- 其他著作 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_otherbook"
                            id="add_otherbook" value="新增其他著作" />
                        <div id="add_otherbook_all">
                            <label for="otherbook_year" class="d-block mt-3"><b>其他著作年份</b></label>
                            <input type="text" name="otherbook_year[]" >
                            <label for="otherbook" class="d-block mt-3"><b>其他著作</b></label>
                            <input type="text" name="otherbook[]" >
                        </div>
                        {{-- 榮譽 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_honor"
                            id="add_honor" value="新增榮譽" />
                        <div id="add_honor_all">
                            <label for="honor_year" class="d-block mt-3"><b>榮譽年份</b></label>
                            <input type="text" name="honor_year[]" >
                            <label for="honor" class="d-block mt-3"><b>榮譽(中文)</b></label>
                            <input type="text" name="honor[]" >
                            <label for="ehonor" class="d-block mt-3"><b>榮譽(英文)</b></label>
                            <input type="text" name="ehonor[]" >
                        </div>
                        {{-- 社會服務 --}}
                        <input type="button" class="d-block mt-3 btn-size btn btn-outline-primary" name="add_social"
                            id="add_social" value="新增社會服務" />
                        <div id="add_social_all">
                            <label for="social_year" class="d-block mt-3"><b>社會服務年份</b></label>
                            <input type="text" name="social_year[]" >
                            <label for="social" class="d-block mt-3"><b>社會服務(中文)</b></label>
                            <input type="text" name="social[]" >
                            <label for="esocial" class="d-block mt-3"><b>社會服務(英文)</b></label>
                            <input type="text" name="esocial[]" >
                        </div>

                        <div class="clearfix mt-5">
                            <button type="submit" class="signupbtn">新增</button>
                            <a href="{{ route('back_teacher') }}"><button
                                    type="button" class="cancelbtn">返回</button></a>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
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
        $(document).ready(function() {
            // {{-- 新增教師經歷 --}}
            $('#add_texper').click(function() {
                $('<label for="texper" class="d-block mt-3"><b>教師經歷(中文)</b></label><input type="text" name="texper[]" required><label for="etexper"><b>教師經歷(英文)</b></label><input type="text" name="etexper[]" required>\
                                            <label for="start" class="d-block"><b>起始日</b></label><input type="date" class="datepicker hasDatepicker" id="start" name="start"placeholder="請選擇日期"><label for="end" class="d-block mt-2"><b>結束日</b></label>\
                                            <input type="date" class="datepicker hasDatepicker" id="end" name="end"placeholder="請選擇日期">')
                    .appendTo(
                        '#add_texper_all');
            });
            // {{-- 新增期刊論文 --}}
            $('#add_thesis').click(function() {
                $('<label for="thesis_year" class="d-block mt-3"><b>期刊論文年份</b></label><input type="text" name="thesis_year[]" required>\
                                <label for="thesis" class="d-block mt-3"><b>論文名稱</b></label><input type="text" name="thesis[]" required>')
                    .appendTo('#add_thesis_all');
            });
            // {{-- 新增研討會論文 --}}
            $('#add_conpaper').click(function() {
                $('<label for="conpaper_year" class="d-block mt-3"><b>研討會論文年份</b></label><input type="text" name="conpaper_year[]" required>\
                                <label for="conpaper" class="d-block mt-3"><b>論文名稱</b></label><input type="text" name="conpaper[]" required>')
                    .appendTo('#add_conpaper_all');
            });
            // {{-- 新增研討會發表 --}}
            $('#add_conpublic').click(function() {
                $('<label for="conpublic_year" class="d-block mt-3"><b>研討會發表年份</b></label><input type="text" name="conpublic_year[]" required>\
                                <label for="conpublic" class="d-block mt-3"><b>論文名稱</b></label><input type="text" name="conpublic[]" required>')
                    .appendTo('#add_conpublic_all');
            });
            // {{-- 新增技術報告 --}}
            $('#add_techpaper').click(function() {
                $('<label for="techpaper_year" class="d-block mt-3"><b>技術報告年份</b></label><input type="text" name="techpaper_year[]" required>\
                                <label for="techpaper" class="d-block mt-3"><b>技術報告</b></label><input type="text" name="techpaper[]" required>')
                    .appendTo('#add_techpaper_all');
            });
            // {{-- 專利 --}}
            $('#add_techpatent').click(function() {
                $('<label for="techpatent_year" class="d-block mt-3"><b>專利年份</b></label><input type="text" name="techpatent_year[]" required>\
                        <label for="techpatent" class="d-block mt-3"><b>專利</b></label><input type="text" name="techpatent[]" required>')
                    .appendTo('#add_techpatent_all');
            });
            // {{-- 專書 --}}
            $('#add_book').click(function() {
                $('<label for="book_year" class="d-block mt-3"><b>專書年份</b></label><input type="text" name="book_year[]" required>\
                        <label for="book" class="d-block mt-3"><b>專書</b></label><input type="text" name="book[]" required>')
                    .appendTo('#add_book_all');
            });
            // {{-- 其他著作 --}}
            $('#add_otherbook').click(function() {
                $('<label for="otherbook_year" class="d-block mt-3"><b>其他著作年份</b></label><input type="text" name="otherbook_year[]" required>\
                        <label for="otherbook" class="d-block mt-3"><b>其他著作</b></label><input type="text" name="otherbook[]" required>')
                    .appendTo('#add_otherbook_all');
            });
            // {{-- 榮譽 --}}
            $('#add_honor').click(function() {
                $('<label for="honor_year" class="d-block mt-3"><b>榮譽年份</b></label><input type="text" name="honor_year[]" required>\
                        <label for="honor" class="d-block mt-3"><b>榮譽(中文)</b></label><input type="text" name="honor[]" required>\
                        <label for="ehonor" class="d-block mt-3"><b>榮譽(英文)</b></label><input type="text" name="ehonor[]" required>')
                    .appendTo('#add_honor_all');
            });
            // {{-- 社會服務 --}}
            $('#add_social').click(function() {
                $('<label for="social_year" class="d-block mt-3"><b>社會服務年份</b></label><input type="text" name="social_year[]" required>\
                        <label for="social" class="d-block mt-3"><b>社會服務(中文)</b></label><input type="text" name="social[]" required>\
                        <label for="esocial" class="d-block mt-3"><b>社會服務(英文)</b></label><input type="text" name="esocial[]" required>')
                    .appendTo('#add_social_all');
            });
        });
    </script>
@endsection
