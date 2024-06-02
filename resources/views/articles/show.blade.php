{{-- 

    <div class="container">
        <h1>{{ $article->nom }}</h1>
        <p>{{ $article->description }}</p>

        <a href="{{ route('commentaires.create', $article->id) }}" class="btn btn-primary">Ajouter un commentaire</a>

        <h2>Commentaires</h2>
        @if($article->commentaires->isEmpty())
            <p>Aucun commentaire pour cet article.</p>
        @else
            @foreach($article->commentaires as $commentaire)
                <div class="card my-3">
                    <div class="card-body">
                        <p>{{ $commentaire->contenu }}</p>
                        <small>Posté le {{ $commentaire->created_at->format('d/m/Y') }}</small>
                        <td>
                            <a href="{{ route('commentaires.edit', $commentaire->id) }}" class="btn btn-warning">Modifier</a>
                            <form method="POST" action="{{ route('commentaires.destroy', $commentaire->id) }}">
                                @csrf
                            
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
 --}}
