<div>Exam - show</div>
<hr>

@if (@isset($exam))
    <h1>{{$exam->title}}</h1>
    <span>Exam Code {{$exam->id}}</span>
@endif