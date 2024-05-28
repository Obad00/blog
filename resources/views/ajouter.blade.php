<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD_ONE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1>AJOUTER UN ARTICLE</h1>
            <hr>

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <ul>
                @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>

            <form action="/ajouter/traitement" method="post" class="form-group">
                @csrf
                <div class="mb-3">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="Nom" name="nom">
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="Description" name="description">
                </div>

                <div class="mb-3">
                    <label for="Auteur" class="form-label">Auteur</label>
                    <input type="text" class="form-control" id="Auteur" name="auteur">
                </div>

                <div class="mb-3">
                    <label for="a_la_une" class="form-label">À la une</label>
                    <input type="radio" id="a_la_une" name="a_la_une" value="1">
                    <label for="pas_a_la_une">Pas à la une</label>
                    <input type="radio" id="pas_a_la_une" name="a_la_une" value="0">    
                </div>

                <div class="mb-3">
                    <label for="Categorie" class="form-label">Catégorie</label>
                    <input type="text" class="form-control" id="Categorie" name="categorie">
                </div>

                <div class="mb-3">
                    <label for="Date_de_creation" class="form-label">Date de création</label>
                    <input type="date" class="form-control" id="Date_de_creation" name="date_de_creation">
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Ajouter un article</button>
                <br>
                <br>
                <a href="/article" class="btn btn-danger">Revenir à la liste des articles</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
