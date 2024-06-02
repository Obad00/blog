<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .article-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .comments-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .comment {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 600px; /* Ajustez la largeur selon vos besoins */
        }

        .comment-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 600px; /* Ajustez la largeur selon vos besoins */
        }

        .comment-form .form-group {
            width: 100%;
            margin-bottom: 20px;
        }

        .comment-form .form-group label {
            margin-bottom: 5px;
        }

        .comment-form .form-group input[type="text"],
        .comment-form .form-group textarea {
            width: 100%;
        }

        .comment-form .form-group textarea {
            resize: vertical; /* Permettre le redimensionnement vertical */
        }

        .comment-form button {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <br>
    <a href="/articles" class="btn btn-primary">Retour aux articles</a>
    <hr>
    @if ($article->image)
        <img src="{{ $article->image }}" alt="Article image" class="article-image">
    @endif
    <h1>{{ $article->nom }}</h1>
    <p>{{ $article->description }}</p>
    <p>{{ $article->auteur }}</p>
    <p>{{ $article->categorie }}</p>
    <p>Crée le {{ $article->created_at }}</p>

    @if ($article->a_la_une == 1)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="a_la_une{{ $article->id }}" id="a_la_une{{ $article->id }}" value="1" checked>
            <label class="form-check-label" for="a_la_une{{ $article->id }}">À la une</label>
        </div>
    @else
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="a_la_une{{ $article->id }}" id="pas_a_la_une{{ $article->id }}" value="0" checked>
            <label class="form-check-label" for="pas_a_la_une{{ $article->id }}">Pas à la une</label>
        </div>
    @endif

    <br>
    <hr>

    <a href="{{ url('/modifier-articles', $article->id) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ url('/supprimer-articles', $article->id) }}" class="btn btn-danger">Supprimer</a>
    <br>
    <br>

   <div class="d-flex">
    <div class="comments-container">
        <h2>Commentaires</h2>
        @if($article->commentaires->isEmpty())
            <p>Aucun commentaire pour cet article.</p>
        @else
            @foreach($article->commentaires as $commentaire)
                <div class="comment card">
                    <div class="card-body">
                        <p>{{ $commentaire->contenu }}</p>
                        <small>Posté le {{ $commentaire->created_at->format('d/m/Y') }}</small>
                        <hr>
                        <div class="d-flex gap-2">
                            <a href="{{ route('commentaires.edit', $commentaire->id) }}" class="btn btn-warning">Modifier</a>
                            
                            <form method="POST" action="{{ route('commentaires.destroy', $commentaire->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="comment-form">
        <form action="commentaires/store" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu du commentaire</label>
            <textarea class="form-control" id="contenu" name="contenu" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
    </form>
   </div>
 
</div>

<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
