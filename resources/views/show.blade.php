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
    <div class="show">
        <div class="text-center" style="margin-top: 2rem">
            @if($action == 'delete')
                <h3>Suppression d'un sport</h3>
            @else
                <h3>Affichage d'un sport</h3>
            @endif
            <hr>
        </div>

        <div>
            <p><strong>Nom :</strong>{{ $sport->nom}}</p>
        </div>
        <div>
            <p><strong>Description :</strong>{{ $sport->description}}</p>
        </div>
        <div>
            <p><strong>Année d'ajout : </strong>{{ $sport->annee_ajout}}</p>
        </div>
        <div>
            <p><strong>Nombre de disciplines : </strong>{{ $sport->nb_disciplines}}</p>
        </div>
        <div>
            <p><strong>Nombre d'épreuves : </strong>{{ $sport->nb_epreuves}}</p>
        </div>
        <div>
            <p><strong>Date de début : </strong>{{ $sport->date_debut}}</p>
        </div>
        <div>
            <p><strong>Date de fin : </strong>{{ $sport->date_fin}}</p>
        </div>
        <p><strong>Image :</strong><img class='showImg' src="{{Storage::url($sport->url_media)}}" alt="image"></p>
        @if($sport->user_id == Auth::id())
            @can('upload',$sport)
                <form action="{{route('upload',$sport)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="doc">Image : </label>
                    <input type="file" name="document" id="doc">
                </div>
                <input type="submit" value="Télécharger" name="submit">
                </form>
            @endcan
            @endif
        <div class="button-align">
            <form action="{{route('edit',$sport['id'])}}" method="get"><button type="submit">Modification</button></form>
        </div>
        <div class="button-align">
            <a href="{{route('show',['id' => $sport['id'], 'action' => 'delete'])}}"><button>Delete</button></a>
        </div>
        @if($action == 'delete')
            <form action="{{route('destroy',$sport)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="button-align">
                    <button type="submit" name="delete" value="valide">Valide</button>
                    <button type="submit" name="delete" value="annule">Annule</button>
                </div>
                <div class="retour">
                    <a href="{{route('liste')}}">Retour à la liste &#10148;</a>
                </div>
            </form>
        @else
            <div class="retour">
                <a href="{{route('liste')}}">Retour à la liste &#10148;</a>
            </div>
        @endif
    </div>
    </body>

</x-layout>
</html>
