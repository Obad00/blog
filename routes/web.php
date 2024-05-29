<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles',[ArticleController::class, 'liste_article']);
Route::get('/supprimer-article/{id}',[ArticleController::class, 'supprimer_article']);
Route::get('/modifier-article/{id}',[ArticleController::class, 'modifier_article']);
Route::post('/modifier-article/{id}',[ArticleController::class, 'modifier_article_traitement']);
Route::get('/ajouter',[ArticleController::class, 'ajouter_article']);
Route::post('/ajouter/traitement',[ArticleController::class, 'ajouter_article_traitement']);
Route::get('/articles/details/{id}', [ArticleController::class, 'details']);




// Route pour afficher la liste des commentaires d'un article spécifique
Route::get('/articles/{article}/commentaires', [CommentaireController::class, 'index'])->name('articles.commentaires');
Route::get('/commentaires/create/{article}', [CommentaireController::class, 'create'])->name('commentaires.create');
Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::resource('commentaires', CommentaireController::class);
Route::get('/commentaires/{commentaire}/edit', [CommentaireController::class, 'edit'])->name('commentaires.edit');
Route::put('/commentaires/{commentaire}', [CommentaireController::class, 'update'])->name('commentaires.update');
Route::delete('/commentaires/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');