@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/foreign.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.foreign')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            Student Award Record</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_foreign', ['year' => date('Y') - 1911]) }}" class="color-gray">Foreign Billboard</a></li>
                        <span>></span>
                        <li>Student Award Record</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('en_foreign') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='en_foreign?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}</option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="20%">contestant</th>
                                <th scope="col" width="20%">Awards</th>
                                <th scope="col" width="40%">competition name</th>
                                <th scope="col" width="20%">instructor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentcompetitions as $studentcompetition)
                                <tr>
                                    <td style="width:20%" scope="row">
                                        @foreach ($students as $student)
                                            @if ($student->sid == $studentcompetition->id)
                                                {{ $student->ename }}<br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="width:20%" scope="row">{{ $studentcompetition->eranking }}</td>
                                    <td style="width:40%">{{ $studentcompetition->eprojectname }}</td>
                                    <td style="width:20%">{{ $studentcompetition->et_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
