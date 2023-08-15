@extends('Backstage.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Backstage/keyaffair/ka_billboard/re_student_award.css') }}">
@endsection
@section('content')
    <div style="border:1px solid #ccc" class="form_container container mb-5">
        @foreach ($studentcompetitions as $studentcompetition)
            <div class="row">
                <div class="col-12">
                    <h1>修改得獎紀錄</h1>

                    <hr>
                    <form action="{{ route('re_student_award', ['id' => $studentcompetition->id]) }}" method="POST"
                        class="col-12">
                        @csrf
                        <label for="Academic " class="d-block mt-2 mb-0"><b>學年度</b></label>
                        <select name="Academic">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}"
                                    {{ $ka_billboard_year->year == $studentcompetition->year ? 'selected' : '' }}>
                                    {{ $ka_billboard_year->year }}
                                </option>
                            @endforeach
                        </select>


                        <label for="semester " class="d-block mt-2 mb-0"><b>學年度</b></label>
                        <select name="semester">
                            <option value="0">請選擇</option>
                            <option value="1" {{ $studentcompetition->sem == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $studentcompetition->sem == 2 ? 'selected' : '' }}>2</option>
                        </select>



                        <label for="contestant" class="d-block mt-3"><b>參賽者(中文)</b></label>
                        <input type="text" name="contestant" value="{{ $studentcompetition->s_name }}" required>

                        <label for="contestant-eng" class="d-block mt-3"><b>參賽者(英文)</b></label>
                        <input type="text" name="contestant-eng" value="{{ $studentcompetition->s_ename }}">

                        <label for="Awards" class="d-block mt-3"><b>得獎名次(中文)</b></label>
                        <input type="text" name="Awards" value="{{ $studentcompetition->ranking }}" required>

                        <label for="Awards-eng" class="d-block mt-3"><b>得獎名次(英文)</b></label>
                        <input type="text" name="Awards-eng"value="{{ $studentcompetition->eranking }}">

                        <label for="competition" class="d-block mt-3"><b>競賽名稱(中文)</b></label>
                        <input type="text" name="competition" value="{{ $studentcompetition->projectname }}" required>

                        <label for="competition-eng" class="d-block mt-3"><b>競賽名稱(英文)</b></label>
                        <input type="text" name="competition-eng" value="{{ $studentcompetition->eprojectname }}">


                        <label for="work" class="d-block mt-3"><b>作品名稱(中文)</b></label>
                        <input type="text" name="work" value="{{ $studentcompetition->workname }}" required>

                        <label for="work-eng" class="d-block mt-3"><b>作品名稱(英文)</b></label>
                        <input type="text" name="work-eng" value="{{ $studentcompetition->eworkname }}">

                        <label for="teacher" class="d-block mb-3 "><b>指導老師(中文)</b></label>
                        <input type="text" name="teacher" value="{{ $studentcompetition->t_name }}" required>
                        <label for="teacher-eng" class="d-block mb-3 "><b>指導老師(英文)</b></label>
                        <input type="text" name="teacher-eng" value="{{ $studentcompetition->t_ename }}">


                        <div class="clearfix  mt-3">
                            <button type="submit" class="signupbtn">修改</button>
                            <a href="{{ route('student_award') }}"><button type="button" class="cancelbtn">返回</button></a>
                        </div>
                    </form>
                </div>
            </div>
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
@endsection
