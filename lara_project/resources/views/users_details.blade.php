<div>Users Details</div>

@if ($user)
<img src="{{$user->avatarUrl}}" alt="" width = 90  height = 90>

<p>{{$user->name}}</p>

<a href="{{ url()->previous() }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Back
</a>


    <div>{{dd($user)}}</div>
@else
    <p>B</p>
@endif

