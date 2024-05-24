@extends('layouts.app')

@section('content')
    <div>Exam - show</div>
    <hr>
<style>
    .btn-custom {
    width: 150px; /* Set a fixed width */
    height: 50px; /* Set a fixed height */
    font-size: 16px; /* Optional: Set a font size */
}

</style>
    @if (@isset($exam))
        <img src="{{ asset('storage/' . $exam->image) }}">
        <br>
        <br>
        <h1>{{ $exam->title }}</h1>
        <p>Exam Code {{ $exam->id }}</p>

        <p>{{ $exam->description }}</p>
        <button class="btn btn-lg btn-success btn-custom"  onclick="window.location.href='{{ route('exam.edit', ['id' => $exam->id]) }}'">Edit</button>
        {{-- <button class="btn btn-lg btn-danger btn-custom"  onclick="window.location.href='{{ route('exam.delete', ['id' => $exam->id]) }}'">Delete</button> --}}


        <button class="btn btn-lg btn-danger" onclick="deleteCard(1)">Delete</button>

       
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
    <form id="delete-form" action="{{ route('exam.delete', ['id' => $exam->id ]) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

        <script>
            function deleteCard(id) {
                if (confirm('Are you sure you want to delete this card?')) {
                    document.getElementById('delete-form').submit();
                }
            }
        </script>

    @endif
@endsection
