<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles',[ArticleController::class, 'liste_article']);
Route::get('/supprimer-articles/{id}',[ArticleController::class, 'supprimer_article']);
Route::get('/modifier-articles/{id}',[ArticleController::class, 'modifier_article']);
Route::post('/modifier-articles/{id}',[ArticleController::class, 'modifier_article_traitement']);
Route::get('/ajouter',[ArticleController::class, 'ajouter_article']);
Route::post('/ajouter/traitement',[ArticleController::class, 'ajouter_article_traitement']);
Route::get('/articles/details/{id}', [ArticleController::class, 'details'])->name('articles.details');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');




Route::get('/articles/{article}/commentaires', [CommentaireController::class, 'update'])->name('articles.commentaires');
Route::post('articles/details/commentaires/store', [CommentaireController::class, 'store'])->name('articles.commentaires.store');
Route::get('/commentaires/{commentaire}/edit', [CommentaireController::class, 'edit'])->name('commentaires.edit');
Route::put('/commentaires/{commentaire}', [CommentaireController::class, 'update'])->name('commentaires.update');
Route::delete('/commentaires/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');