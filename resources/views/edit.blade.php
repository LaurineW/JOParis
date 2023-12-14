{{--
messages d'erreurs dans la saisie du formulaire.
--}}

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
formulaire de saisie d'une tâche
la fonction 'route' utilise un nom de route.
'@csrf' ajoute un champ caché qui permet de vérifier
que le formulaire vient du serveur.
'@method('PUT') précise à Laravel que la requête doit être traitée
avec une commande PUT du protocole HTTP.
--}}

<form action="{{route('update',$sport->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Modification d'une tâche</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        <label for="nom"><strong>Nom du sport </strong></label>
        <input type="text" name="nom" id="nom"
               value="{{ $sport->nom }}">
    </div>
    <div>
        <label for="description"><strong>Description du sport</strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ $sport->description }}</textarea>
    </div>
    <div>
        <label for="annee_ajout"><strong>Année d'ajout</strong></label>
        <input type="number" name="annee_ajout" id="annee_ajout" min="0" max="2500" placeholder="aaaa" value="{{ $sport->annee_ajout }}">
    </div>
    <div>
        <label for="nb_disciplines"><strong>Nombres de discipline</strong></label>
        <input type="number" name="nb_disciplines" id="nb_disciplines"
               value="{{ $sport->nb_disciplines }}">
    </div>
    <div>
        <label for="nb_epreuves"><strong>Nombres d'épreuves</strong></label>
        <input type="number" name="nb_epreuves" id="nb_epreuves"
               value="{{ $sport->nb_epreuves }}">
    </div>
    <div>
        <label for="date_debut"><strong>Date de début</strong></label>
        <input type="date" name="date_debut" id="date_debut"
               value="{{ $sport->date_debut->format('D M Y') }}">
    </div>
    <div>
        <label for="date_fin"><strong>Date de fin</strong></label>
        <input type="date" name="date_fin" id="date_fin"
               value="{{ $sport->date_fin->format('D M Y') }}">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
