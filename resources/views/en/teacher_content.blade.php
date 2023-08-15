@extends('en.layouts.layout')
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
                                Institute of Applied Foreign Languages, National Yunlin University of Science and Technology
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
                                {{ $teacher->ename }} ({{ $teacher->eposition }})
                            </strong>
                        </h2>
                        <div class="col-12">
                            <hr class="teacher-hr-first">
                            <h3 class="fs-20 mt-3 mb-3">
                                <strong>general information</strong>
                            </h3>
                            <ul class="teacher_grade">
                                <li>
                                    <strong>Education:</strong>
                                    {{ $teacher->eeducation }}
                                </li>
                                <li>
                                    <strong>Research Office:</strong>
                                    {{ $teacher->Researchroom }}
                                </li>
                                <li>
                                    <strong>Extension Number:</strong>
                                    {{ $teacher->extension }}
                                </li>
                                <li>
                                    <strong>Research interests:</strong>
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
                                <strong>experience</strong>
                            </h3>
                            <ul class="teacher_grade">
                                @foreach ($texperiences as $texperience)
                                    <li>
                                        {{ $texperience->edescription }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12">
                            <hr class="teacher-hr">
                            <h3 class="fs-20 mt-3 mb-3">
                                <strong>research works</strong>
                            </h3>
                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>Papers</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($thesispapers as $thesispaper)
                                    <li>
                                        {{ $thesispaper->description }}
                                    </li>
                                @endforeach
                            </ul>
                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>seminar paper</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($conpapers as $conpaper)
                                    <li>
                                        {{ $conpaper->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>Seminar published</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($conpublications as $conpublication)
                                    <li>
                                        {{ $conpublication->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>Technical Reports</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($techpapers as $techpaper)
                                    <li>
                                        {{ $techpaper->description }}
                                    </li>
                                @endforeach
                            </ul>


                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>patent</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($techpatents as $techpatent)
                                    <li>
                                        {{ $techpatent->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>book</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($books as $book)
                                    <li>
                                        {{ $book->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>other works</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($otherbooks as $otherbook)
                                    <li>
                                        {{ $otherbook->description }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>honor</strong>
                            </h4>
                            <ul class="teacher_grade">
                                @foreach ($honors as $honor)
                                    <li>
                                        {{ $honor->edescription }}
                                    </li>
                                @endforeach
                            </ul>

                            <h4 class="fs-15 mt-3 mb-3">
                                <strong>social service</strong>
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
