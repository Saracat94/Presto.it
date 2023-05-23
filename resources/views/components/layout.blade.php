<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>{{$title ?? 'Presto.it' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700;800&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="stylesheet" href="">


</head>
<body class="bg-tot">
    <x-navbar/>

    <div class="min-vh-100">
        {{$slot}}
    </div>

    <x-footer/>
    
    @livewireScripts
  
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>