<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // création de méthode index
    function index() {
        $recipes = Recipe::orderBy('date', 'desc')->take(3)->get();
        return view('welcome', ['recettes'=>$recipes]);
    }
}
