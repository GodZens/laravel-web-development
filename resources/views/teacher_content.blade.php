@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teacher_content.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @foreach ($teachers as $teacher)
                <!-- 老師介紹 -->
                <div class="container p-5">
                    <div class="row justify-content-center">
                        <h2 class="w-100 text-center fs-25">
                            <strong class="col-12">
                                國　立　雲　林　科　技　大　學　應　用　外　語　所
                            </strong>
                            <br>
                            <strong class="col-12">
                                National Yunlin University of Science and Technology
                            </strong>
                            <br>
                            <strong class="col-12">
                                Department of Applied Foreign Languages
                            </strong>
                            <br>
                            <strong class="col-12">
                                {{ $teacher->name }} ({{ $teacher->position }})
                            </strong>
                        </h2>
                        <div class="col-12">
                            <hr class="teacher-hr-first">
                            <h3 class="fs-20 mt-3 mb-3">
                                <strong>一般資訊</strong>
                            </h3>
                            <ul class="teacher_grade">
                                <li>
                                    <strong>學歷:</strong>
                                    {{ $teacher->education }}
                                </li>
                                <li>
                                    <strong>研究室:</strong>
                                    {{ $teacher->Researchroom }}
                                </li>
                                <li>
                                    <strong>分機號碼：</strong>
                                    {{ $teacher->extension }}
                                </li>
                                <li>
                                    <strong>研究興趣：</strong>
                                    {{ $teacher->professionalspecialty }}
                                </li>
                                <li>
                                    <strong>E-Mail：</strong>
                                    <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <hr class="teacher-hr">
                            <h3 class="fs-20 mt-3 mb-3">
                                <strong>經歷</strong>
                            </h3>
                            <ul class="teacher_grade">
                                @foreach ($texperiences as $texperience)
                                    <li>
                                        {{ $texperience->description }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12">
                            <hr class="teacher-hr">
                            <h3 class="fs-20 mt-3 mb-3">
                                <strong>研究著作</strong>
                            </h3>
                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>期刊論文</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($thesispapers as $thesispaper)
                                    <li>
                                        {{ $thesispaper->description }}
                                    </li>
                                @endforeach
                            </ul>
                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>研討會論文</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($conpapers as $conpaper)
                                    <li>
                                        {{ $conpaper->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>研討會發表</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($conpublications as $conpublication)
                                    <li>
                                        {{ $conpublication->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>技術報告</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($techpapers as $techpaper)
                                    <li>
                                        {{ $techpaper->description }}
                                    </li>
                                @endforeach
                            </ul>


                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>專利</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($techpatents as $techpatent)
                                    <li>
                                        {{ $techpatent->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>專書</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($books as $book)
                                    <li>
                                        {{ $book->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>其他著作</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($otherbooks as $otherbook)
                                    <li>
                                        {{ $otherbook->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>榮譽</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($honors as $honor)
                                    <li>
                                        {{ $honor->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>社會服務</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($socialservices as $socialservice)
                                    <li>
                                        {{ $socialservice->description }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 老師介紹 -->
            @endforeach
        </div>
    </div>
@endsection
@section('javascript')
@endsection
