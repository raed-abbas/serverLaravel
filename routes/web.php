<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecettesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Home controller
Route::get('/', [HomeController::class, 'index']);

// Recettes controller
// Route::get('/recettes', [RecettesController::class, 'showRecettes']);
// Obtenir une recette
// Route::get('/recettes/{id}', [RecettesController::class, 'show']);


// Home controller
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/addContact', [ContactController::class, 'addContact'])->name('contact.send');

// Recetttes routes
// Les routes pour les recettes
Route::get('/admin/recettes', [RecettesController::class, 'index']);
Route::post('/admin/recettes/store', [RecettesController::class, 'store']);
// mettre à jour
Route::get('/admin/recettes/{id}/edit', [RecettesController::class, 'edit']);
Route::put('/admin/recettes/{recette}/update', [RecettesController::class, 'update']);
// ******
Route::delete('/admin/recettes/{id}/delete', [RecettesController::class, 'destroy']);
// ******