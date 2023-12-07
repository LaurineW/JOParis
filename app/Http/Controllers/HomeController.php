<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function accueil():string {
        return "<h2>Accueil !!</h2>";
    }
    public function apropos():string {
        return "<h2>A propos </h2>";
    }
    public function contact():string {
        return "<h2>Contact </h2>";
    }
}
