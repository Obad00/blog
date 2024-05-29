<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index($article_id)
    {
        $commentaires = Commentaire::all();
        // dd($commentaires); 
        return view('commentaires.index', compact('commentaires'));
    }
    

    public function create($article_Id)
    {
        $article = Article::findOrFail($article_Id);
        return view('commentaires.create', compact('article'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'contenu' => 'required|string',
        ]);

        Commentaire::create([
            'article_id' => $validated['article_id'],
            'contenu' => $validated['contenu'],
        ]);

        return redirect()->route('articles.commentaires', $validated['article_id'])->with('success', 'Commentaire ajouté avec succès!');
    }

   

    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'contenu' => 'required|string',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update([
            'contenu' => $validated['contenu'],
        ]);

        return redirect()->route('articles.commentaires', $commentaire->article_id)->with('success', 'Commentaire mis à jour avec succès!');
    }

    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('articles.commentaires', $commentaire->article_id)->with('success', 'Commentaire supprimé avec succès!');
    }

}   