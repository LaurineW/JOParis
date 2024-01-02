<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function accueil() {
        return view('accueil');
    }
    public function apropos() {
        return view('apropos');
    }

    public function liste(Request $request) {
        $search = $request->input('search');

        $cat = $request->input('cat', 'All');
        if ($cat != 'All') {
            $sports = Sport::where('nb_disciplines', $cat)->get();
        } else {
            $sports = Sport::all();
        }
        if (isset($search)){
            $sports = Sport::where('nom','like','%'.$search.'%')->get();
        }
        $nb_discipline= Sport::distinct('nb_disciplines')->pluck('nb_disciplines');
        return view('liste', ['sports' => $sports, 'cat' => $cat, 'nb_discipline' => $nb_discipline, 'search' => $search]);
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
    public function show(Request $request, String $id)
    {
        $action = $request->query('action', 'show');
        $sport = Sport::find($id);
        return view('show', ['sport' => $sport, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $sport = Sport::find($id);
        return view('edit', ['sport' => $sport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $user = Auth::user();
        if ($user->cant('update', $sport)) {
            return redirect()->route('show', ['tach' => $tache->id, 'action' => 'show'])->with('status', 'Impossible de modifier la tâche');
        }
        $sport = Sport::find($id);

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'annee_ajout' => 'required',
                'nb_disciplines' => 'required',
                'nb_epreuves' => 'required',
                'date_debut' => 'required',
                'date_fin' => 'required',
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
    public function destroy(Request $request,string $id)
    {
        if ($request->delete == 'valide') {
            $sport = Sport::find($id);
            $sport->delete();
        }
        return redirect()->route('liste');
    }

}
