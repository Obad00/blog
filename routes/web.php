<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article',[ArticleController::class, 'liste_article']);
Route::get('/supprimer-article/{id}',[ArticleController::class, 'supprimer_article']);
Route::get('/modifier-article/{id}',[ArticleController::class, 'modifier_article']);
Route::post('/modifier-article/{id}',[ArticleController::class, 'modifier_article_traitement']);
Route::get('/ajouter',[ArticleController::class, 'ajouter_article']);
Route::post('/ajouter/traitement',[ArticleController::class, 'ajouter_article_traitement']);