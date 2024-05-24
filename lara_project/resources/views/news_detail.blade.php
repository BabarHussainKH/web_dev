<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>News Here</div>
    @if ($news)
        <p>{{$news->title}}</p>
        <div>
            <p>{{$news->content}}</p>
        </div>
    @else
        <p>New not Available</p>

    @endif

    {{dd($news)}}


</body>

</html>