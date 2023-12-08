<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function accueil() {
        return view('accueil');
    }
    public function apropos() {
        return view('apropos');
    }
    public function contact() {
        return view('contact');
    }
}
