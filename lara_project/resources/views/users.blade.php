
@extends('myLayouts.app')

@section('title')
<h2>Users List</h2>
@endsection

@section('content')
@if (isset($usersPost) && count($usersPost) > 0)
        @foreach ($usersPost as $user)
            <a href="{{Route('users.detail', ["id" => $user->id])}}">{{$user->name}}</a><br>
        @endforeach
    @endif

@endsection

