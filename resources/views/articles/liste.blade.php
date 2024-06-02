<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <style>
        .cuadro_intro_hover {
            padding: 0px;
            position: relative;
            overflow: hidden;
            height: 200px;
        }
        .cuadro_intro_hover:hover .caption {
            opacity: 1;
            transform: translateY(-150px);
            -webkit-transform: translateY(-150px);
            -moz-transform: translateY(-150px);
            -ms-transform: translateY(-150px);
            -o-transform: translateY(-150px);
        }
        .cuadro_intro_hover img {
            z-index: 4;
            width: 100%;
            height: auto;
        }
        .cuadro_intro_hover .caption {
            position: absolute;
            top: 150px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            width: 100%;
        }
        .cuadro_intro_hover .blur {
            background-color: rgba(0,0,0,0.7);
            height: 300px;
            z-index: 5;
            position: absolute;
            width: 100%;
        }
        .cuadro_intro_hover .caption-text {
            z-index: 10;
            color: #fff;
            position: absolute;
            height: 300px;
            text-align: center;
            top: -20px;
            width: 100%;
        }

        .categories-container {
            display: flex;
            align-items: center; /* Aligne les éléments verticalement */
        }

        .categories-container h3 {
            margin: 0;
            margin-right: 10px; /* Espacement entre le titre et la catégorie */
        }

        .category {
            display: flex;
            align-items: center; /* Aligne les éléments verticalement dans la catégorie */
        }

        .category i {
            margin-right: 5px; /* Espacement entre l'icône et le texte */
        }

        .categories-container span {
            display: inline-flex;
            align-items: center;
        }
        
        .footer-text {
            text-align: center; /* Centre le texte */
        }
    </style>




</head>
<body>

<div class="container">
    <h1>Ensemble des articles</h1>
    <br>
    <a href="/ajouter" class="btn btn-primary">Ajouter un article</a>
    <hr>

    <div class="article-container">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="cuadro_intro_hover" style="background-color:#cccccc;">
                    <p class="centered-image">
                        @if ($article->image)
                        <img src="{{ $article->image }}" class="img-fluid" alt="{{ $article->nom }}">
                        @endif
                    </p>
                    
                    <div class="caption">
                        <div class="blur"></div>
                        <div class="caption-text">
                            <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">
                                {{ substr($article->nom, 0, 25) }}
                            </h3>
                            <p>{{ substr($article->description, 0, 50) }}</p>
                            <a class="btn btn-default" href="/articles/details/{{$article->id}}">
                                <span class="glyphicon glyphicon-plus"> INFO</span>
                            </a>
                        </div>
                    </div>
                </div>
<br>      

<div id="fb-root">
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
</div>

<br>

                <div class="categories-container">
                    <h3>Categorie:</h3>
                    <div class="category">
                        <i class="fa fa-file"></i>
                        <span>{{ $article->categorie }}</span>
                    </div>
                </div>

               
            </div>
            @endforeach
        </div>
    </div>
</div>


<hr>
<p class="footer-text">Copyright © Your Website | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>


<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
