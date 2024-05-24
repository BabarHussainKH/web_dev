<!-- resources/views/exams/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>List of Exams</h1>
    <br>
    @if (count($exams))
        <div class="row">
            @foreach ($exams as $key => $exam)
                @if ($key % 3 == 0 && $key != 0)
        </div>
        <div class="row">
    @endif
    <div class="card col-sm-2 text-center " style="margin: 5px" onclick="window.location.href = '{{ route('exam.edit', ['id' =>$exam->id]) }}'">
        <div class="card-body">
            <div><img src="{{ asset('storage/' . $exam->image) }}" class="exam" alt="{{ $exam->title }}"></div>
            <br>
            <h5 class="card-title">{{ $exam->title }}</h5>
        </div>
    </div>
    @endforeach
    </div>
@else
    <div class="alert alert-danger">No Exams available at the moment.</div>
    @endif
@endsection
