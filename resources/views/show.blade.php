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
    <div class="text-center" style="margin-top: 2rem">
        @if($action == 'delete')
            <h3>Suppression d'une tâche</h3>
        @else
            <h3>Affichage d'une tâche</h3>
        @endif
        <hr>
    </div>

    <div>
        <p><strong>Nom :</strong>{{ $sport->nom}}</p>
    </div>
    <div>
        <p><strong>Description :</strong>{{ $sport->description}}</p>
    </div>


    <form action="{{route('edit',$sport['id'])}}" method="get"><button type="submit">Modification</button></form>
    <button><a href="{{route('show',['id' => $sport['id'], 'action' => 'delete'])}}">Delete</a></button>

    @if($action == 'delete')
        <form action="{{route('destroy',$sport)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="text-center">
                <button type="submit" name="delete" value="valide">Valide</button>
                <button type="submit" name="delete" value="annule">Annule</button>
            </div>
        </form>
    @else
        <div>
            <a href="{{route('liste')}}">Retour à la liste</a>
        </div>
    @endif
    </body>

</x-layout>
</html>
