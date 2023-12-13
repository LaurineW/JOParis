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
    <h2>La liste des sports : {{ count($sports) }}</h2>
    <a href="{{route('create')}}"><button>Creation</button></a>

    <!--<img src="{{ Vite::asset('resources/images/image1.jpg') }}" alt="image">-->

    <form action="{{ route('sports.index') }}" method="get">
        <label for="search">Rechercher un sport :</label>
        <input type="text" id="search" name="search" value="{{ $search }}">
        <button type="submit">Rechercher</button>
    </form>

    <h4>Filtrage par discipline</h4>
    <form action="{{route('liste')}}" method="get">
        <select name="cat">
            <option value="All" @if($cat == 'All') selected @endif>-- Toutes catégories --</option>
            @foreach($nb_discipline as $nb_disciplines)
                <option value="{{$nb_disciplines}}" @if($cat == $nb_disciplines) selected @endif>{{$nb_disciplines}}</option>
            @endforeach
        </select>
        <input type="submit" value="OK">
    </form>

    <table>
    <tr>
        <td>Nom</td>
        <td>Description</td>
        <td>Année ajout</td>
        <td>Nombre de disciplines</td>
        <td>Nombres d'épreuves</td>
        <td>Date de début</td>
        <td>Date de fin</td>
    </tr>
    @if(!empty($sports))
            @foreach($sports as $sport)
                <tr>
                    <td><a href="{{route('show', ['nom'=> $sport['nom']])}}">{{$sport['nom']}}</a></td>
                    <td>{{$sport['description']}}</td>
                    <td>{{$sport['annee_ajout']}}</td>
                    <td>{{$sport['nb_disciplines']}}</td>
                    <td>{{$sport['nb_epreuves']}}</td>
                    <td>{{$sport['date_debut']}}</td>
                    <td>{{$sport['date_fin']}}</td>
                </tr>
            @endforeach
    </table>
    @else
        <h3>aucun Sport !</h3>
    @endif
    <script>
        function submitForm(form){
            console.log('form', form.elements["sport"].value);
            if(form.elements["sport"].value === ""){
                return false;
            }
            document.location.href="/sports/"+form.elements["sport"].value;
        }
    </script>

    </body>
</x-layout>
</html>
