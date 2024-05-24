extends()

<div>
    <h2>Latest news arround the world</h2>

    @if ($newsPosts)
    <p>Posts Available</p>
    @endif

    @foreach ($newsPosts as $post )
    <li><a href="{{ route('news.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li><br>
    @endforeach
    

</div>