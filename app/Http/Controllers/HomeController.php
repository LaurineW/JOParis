<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        $sport->user_id = Auth::id();


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

        $sport = Sport::find($id);
        //$user = Auth::user();
        //if ($user->cant('update', $sport)) {
        //    return redirect()->route('show', ['sport' => $sport->id, 'action' => 'show'])->with('status', 'Impossible de modifier le sport');
        //}
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

        return redirect()->route('show',$sport);
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
    public function upload(Request $request, $id) {
        $sport = Sport::findOrFail($id);
        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $file = $request->file('document');
        } else {
            $msg = "Aucun fichier téléchargé";
            return redirect()->route('show', [$sport->id])
                ->with('type', 'primary')
                ->with('msg', 'Smartphone non modifié ('. $msg . ')');
        }
        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($sport->url_media)) {
            Log::info("Image supprimée : ". $sport->url_media);
            Storage::delete($sport->url_media);
        }
        $sport->url_media = 'images/'.$nom;
        $sport->save();
        //$file->store('docs');
        return redirect()->route('show', [$sport->id])
            ->with('type', 'primary')
            ->with('msg', 'Sport modifié avec succès');
    }

}
