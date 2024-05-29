

<h1>Commentaires</h1>
{{-- <a href="{{ route('commentaires.create', ['article' => $article->id]) }}" class="btn btn-primary">Ajouter un commentaire</a> --}}
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Contenu</th>
            <th>Date</th>
            <th>Action</th>
        </tr>   
    </thead>
    <tbody>
        @foreach($commentaires as $commentaire)
        <tr>
            {{-- <td>{{ $article->nom }}</td> --}}
            <td>{{ $commentaire->id }}</td>
            <td>{{ substr($commentaire->contenu, 0, 50) }}...</td>
            <td>{{ $commentaire->created_at }}</td>
            <td>
                <a href="{{ route('commentaires.show', $commentaire->id) }}" class="btn btn-info">Détails</a>
                <a href="{{ route('commentaires.edit', $commentaire->id) }}" class="btn btn-warning">Modifier</a>
                <form method="POST" action="{{ route('commentaires.destroy', $commentaire->id) }}">
                    @csrf
                
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
