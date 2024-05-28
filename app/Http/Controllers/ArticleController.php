<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function liste_article(){
        $articles = Article::all();
        return view('article.liste', compact('articles'));
    }
    
    public function ajouter_article(){
        return view('article.ajouter');
    }

    public function ajouter_article_traitement(Request $request)
    {
        //Validation des données ajoutées. 
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'a_la_une' => 'required|boolean', // Corrigé
            'auteur' => 'required',
            'date_de_creation' => 'required|date',
        ]);

        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->a_la_une = $request->a_la_une; // Ajouté
        $article->auteur = $request->auteur;
        $article->categorie = $request->categorie;
        $article->date_de_creation = Carbon::now();  
        $article->save();

        return redirect('/ajouter')->with('status', 'L\'article a bien été ajouté avec succès.');
    }

    public function modifier_article($id){
        $article = Article::find($id);
        return view('article.modifier', compact('article')); // Singularisé
    }

    public function modifier_article_traitement(Request $request, $id){
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);
    
        // Recherche de l'article à modifier par son ID
        $article = Article::find($id);
    
        // Mise à jour des données de l'article avec les données du formulaire
        $article->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);
    
        // Redirection vers la liste des articles avec un message de succès
        return redirect('/article')->with('status', 'L\'article a bien été modifié avec succès.');
    }
    
    

    public function supprimer_article($id){
        $article = Article::find($id);
        $article->delete();
        return redirect('/article')->with('status', 'L\'article a bien été supprimé avec succès.');
    }
}
