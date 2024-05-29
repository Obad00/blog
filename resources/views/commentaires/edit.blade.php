
    <div class="container">
        <h1>Modifier le commentaire</h1>

        <form action="{{ route('commentaires.update', $commentaire->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="contenu">Commentaire:</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3" required>{{ $commentaire->contenu }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
