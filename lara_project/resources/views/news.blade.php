<div>
    <h2>Latest news arround the world</h2>

    @if (count($posts) > 0)
    <p>Posts Available</p>
    @endif

    @foreach ($posts as $post )
        <li>$post->title</li>
    @endforeach
    
    @endfor

</div>