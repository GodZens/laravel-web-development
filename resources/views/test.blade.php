@extends('layouts.layout')

@section('content')
@foreach ( $tests as $test)
    <a>{{$test->id}}<a>
    <a>{{$test->title}}<a>
    <a>{{$test->en_title}}<a>
@endforeach
{{-- <h1> Progress bar {{ $test }}</h1> --}}
{{-- <img width="400" src="{{ $test }}"> --}}
@endsection
