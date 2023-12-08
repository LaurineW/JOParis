<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <link href="{{Vite::asset('resources/css/app.css')}}" rel=stylesheet>

</head>
<body>
<h3>Coucou</h3>

<img src="{{ Vite::asset('resources/images/image1.jpg') }}" alt="image">

</body>
</html>
