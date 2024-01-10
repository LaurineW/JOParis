<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller {
    public function index( $search = null)
    {

        if (!isset($search)) {
            $sports = Sport::all();
        } else {
            $sports = Sport::where('nom', 'LIKE', '%'.$search.'%')->get();
        }


        return view('sports.index', ['sports' => $sports, 'search' => $search]);
    }


}
