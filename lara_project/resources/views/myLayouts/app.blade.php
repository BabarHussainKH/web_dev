<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>


    @include('myLayouts.header')  
  
    <div> 
        @yield('title')
    </div>

    <main class="container py-4">
        @yield('content')
    </main>


    @include('myLayouts.footer')

</body>

</html>