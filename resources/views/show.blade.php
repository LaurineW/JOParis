<!DOCTYPE html>
<html lang="en">
<x-layout>
    <head>
        <meta charset="UTF-8">
        <title>Page d'accueil</title>
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
        <link href="{{Vite::asset('resources/css/app.css')}}" rel=stylesheet>

    </head>
    <body>


    <div>
        <p><strong>Nom :</strong>{{ $sport->nom}}</p>
    </div>
    <div>
        <p><strong>Description :</strong>{{ $sport->description}}</p>
    </div>

    <form action="{{route('edit',['nom'=> $sport['nom']])}}" method="get"><button type="submit">Modification</button></form>
    </body>

</x-layout>
</html>
