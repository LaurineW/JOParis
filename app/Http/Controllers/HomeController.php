<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function accueil() {
        return view('accueil');
    }
    public function apropos() {
        return view('apropos');
    }
    public function liste(Request $request) {
        $search = $request->input('search');

        $sports = Sport::when($search, function ($query) use ($search) {
            return $query->where('nom', 'like', '%' . $search . '%');
        })->get();
        return view('liste', ['sports' => $sports, 'search' => $search]);

    }
    public function contact() {
        return view('contact');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom'=> 'required',
                'description'=> 'required',
                'annee_ajout'=> 'required',
                'nb_disciplines'=> 'required',
                'nb_epreuves'=> 'required',
                'date_debut'=> 'required',
                'date_fin'=> 'required',
            ]
        );

        // A partir d'ici le code est exécuté uniquement si les données sont validaées
        // par la méthode validate()
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $sport = new Sport();

        $sport->nom = $request->nom;
        $sport->description = $request->description;
        $sport->annee_ajout = $request->annee_ajout;
        $sport->nb_disciplines = $request->nb_disciplines;
        $sport->nb_epreuves = $request->nb_epreuves;
        $sport->date_debut = $request->date_debut;
        $sport->date_fin = $request->date_fin;


        // insertion de l'enregistrement dans la base de données
        $sport->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect()->route('liste');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $nom = $request->input('nom');
        $sport = Sport::where('nom', 'like', '%' . $nom . '%')->get()[0];
        return view('show', ['sport' => $sport]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nom)
    {
        $sport = Sport::find($nom);
        return view('edit', ['sports' => $sport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nom) {
    $sport = Sport::find($nom);

    $this->validate(
        $request,
        [
            'nom'=> 'required',
            'description'=> 'required',
            'annee_ajout'=> 'required',
            'nb_disciplines'=> 'required',
            'nb_epreuves'=> 'required',
            'date_debut'=> 'required',
            'date_fin'=> 'required',
        ]
    );
        $sport->nom = $request->nom;
        $sport->description = $request->description;
        $sport->annee_ajout = $request->annee_ajout;
        $sport->nb_disciplines = $request->nb_disciplines;
        $sport->nb_epreuves = $request->nb_epreuves;
        $sport->date_debut = $request->date_debut;
        $sport->date_fin = $request->date_fin;

    $sport->save();

    return redirect()->route('liste');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
