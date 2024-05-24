@extends('layouts.app')

@section('content')

<div>Exam - show</div>
<hr>

@if (@isset($exam))
    <h1>{{$exam->title}}</h1>
    <p>Exam Code {{$exam->id}}</p>

    <p>{{$exam->description}}</p>


@endif

@endsection