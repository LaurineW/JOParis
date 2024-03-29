<!doctype html>
<html lang=fr>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>



<body>
<x-header></x-header>
<main>
    {{$slot}}
</main>




</body>
<footer>
    <x-footer></x-footer>
</footer>

</html>
