
    <div class="container">
        <h1>Ajouter un commentaire pour l'article: {{ $article->nom }}</h1>

        <form action="{{ route('commentaires.store') }}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">

            <div class="form-group">
                <label for="comment">Commentaire:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
