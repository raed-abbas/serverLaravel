<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecettesController extends Controller
{
    // Obtenir toutes les recettes depuis la base de données
    function index()
    {
        $recipes = Recipe::orderBy('created_at', 'DESC')->get();
        return view('recettes', ['recettes' => $recipes]);
    }
    // ******************************************************
    // Ajouter une recette dans la base de données
    function sotre(Request $request)
    {
        return ('Ajouter une recette');
        $newRecette = new Recipe;
        $newRecette->author_id = $request-> author_id;
        $newRecette->title = $request-> title;
        $newRecette->content = $request-> content;
        $newRecette->ingredients = $request-> ingredients;
        $newRecette->url = $request-> url;
        $newRecette->tags = $request-> tags;
        $newRecette->date = $request-> date;
        $newRecette->status = $request-> status;
        $newRecette->save();

        return $newRecette;
    }
    // ******************************************************

    // Mettre à jour ajouter une recette dans la base de données
    function edit($id)
    {
        $recette = Recipe::find($id);
        // printf($recette);
        return view('recettes.edit', ['recette' => $recette]);
    }
     // Mettre à jour ajouter une recette dans la base de données
     function update(Recipe $recette)
     {
        //  $recette = Recipe::find($id);
        //  return view('recettes.edit', ['recette' => $recette]);
         // return view('edit', ['recette' => $recette]);
     }
    // ******************************************************

    // supprimer une recette dans la base de données
    function destroy()
    {
        return ('All recettes');
    }
    // ******************************************************

    // Afficher toutes les recettes
    function showRecettes()
    {
        $recipes = Recipe::all();
        return view('recettes', ['recettes'=>$recipes]);
    }

    /** Afficher une recette donnée après avoir cliqué sur le lien dans
     * la page d'accueil 
     **/
    function show($recette_id)
    {     
        $recipe = Recipe::find($recette_id);
        $name_author = $recipe ->author->name;
        return view('recette', array(
            'recipe' =>$recipe,
            'name'=>$name_author
        ));
        
    }
    
}
