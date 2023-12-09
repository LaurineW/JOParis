<html>

<head>
    <title>Liste des sports</title>

</head>
<body>
<h2>La liste des sports : {{ count($sports) }}</h2>

@if(!empty($sports))
    <ul>
        @foreach($sports as $sport)
            <li><strong>{{ $sport['nom'] }}</strong> : {{ $sport['description'] }} - {{ $sport['annee_ajout'] }} - {{ $sport['nb_epreuves'] }} - {{ $sport['nb_disciplines'] }}
                {{$sport['date_debut']->format("D M Y")}} : {{$sport['date_fin']->format("D M Y")}}
            </li>
        @endforeach
    </ul>
@else
    <h3>aucun Sport !</h3>
@endif




</body>

</html>
