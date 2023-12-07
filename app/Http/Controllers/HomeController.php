<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function accueil():string {
        return view('accueil');
    }
    public function apropos():string {
        return view('apropos');
    }
    public function contact():string {
        return view('contact');
    }
}
