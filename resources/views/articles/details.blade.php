{{-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        
    </style>
</head>
<body>

<div class="container">
    <h1>Ensemble des articles de notre site</h1>
    <br>
    <a href="/ajouter" class="btn btn-primary">Ajouter un article</a>
    <hr>

    <div class="article-container">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card" style="width: 18rem; margin-bottom: 20px;">
                    @if ($article->image)
                    <img src="{{ $article->image }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->nom }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text">{{ $article->auteur }}</p>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="a_la_une{{ $article->id }}" id="a_la_une{{ $article->id }}" value="1" {{ $article->a_la_une == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="a_la_une{{ $article->id }}">À la une</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="a_la_une{{ $article->id }}" id="pas_a_la_une{{ $article->id }}" value="0" {{ $article->a_la_une == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="pas_a_la_une{{ $article->id }}">Pas à la une</label>
                        </div>

                        <p class="card-text">{{ $article->categorie }}</p>
                        <p class="card-text">{{ $article->created_at }}</p>

                        <div class="mt-3">
                            <a href="{{ route('articles.commentaires', ['article' => $article->id]) }}" class="btn btn-info">Voir détails</a>
                            <br>
                            <br>
                            <a href="{{ route('commentaires.create', ['article' => $article->id]) }}" class="btn btn-secondary">Ajouter un commentaire</a>
                        </div>
                        <hr>

                        <a href="{{ url('/modifier-article', $article->id) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ url('/supprimer-article', $article->id) }}" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <br>
    <a href="/articles" class="btn btn-primary">Retour aux articles</a>
<hr>
@if ($article->image)
<img src="{{ $article->image }}" alt="Article image" class="img-fluid">
@endif
    <h1>{{ $article->nom }}</h1>
    <p>{{ $article->description }}</p>
    <p>{{ $article->auteur }}</p>
   
    <p>{{ $article->categorie }}</p>
    <p>Crée le {{ $article->created_at }}</p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="a_la_une{{ $article->id }}" id="a_la_une{{ $article->id }}" value="1" {{ $article->a_la_une == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="a_la_une{{ $article->id }}">À la une</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="a_la_une{{ $article->id }}" id="pas_a_la_une{{ $article->id }}" value="0" {{ $article->a_la_une == 0 ? 'checked' : '' }}>
        <label class="form-check-label" for="pas_a_la_une{{ $article->id }}">Pas à la une</label>
    </div>
    <br>
    <div class="mt-3">
        <a href="/articles/{{$article->id}}" class="btn btn-info">Voir les commentaires</a>
        <br>
        <br>
        <a href="{{ route('commentaires.create', ['article' => $article->id]) }}" class="btn btn-secondary">Ajouter un commentaire</a>
    </div>
    <hr>

    <a href="{{ url('/modifier-article', $article->id) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ url('/supprimer-article', $article->id) }}" class="btn btn-danger">Supprimer</a>

    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
