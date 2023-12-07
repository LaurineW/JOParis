<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function accueil():string {
        return "<h2>Bienvenue</h2>";
    }
}
