@csrf
<div class="row g-2">
    <div class="col-md-4 mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom', $programme->nom ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="bailleur_id" class="form-label">Bailleur</label>
        <select name="bailleur_id" id="bailleur_id" class="form-control">
            @foreach ($bailleurs as $bailleur)
                <option value="{{ $bailleur->id }}"
                    {{ old('bailleur_id', $programme->bailleur_id ?? '') == $bailleur->id ? 'selected' : '' }}>
                    {{ $bailleur->nom }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <label for="annee" class="form-label">Année prog.</label>
        <input type="text" name="date_programme" class="form-control" value="{{ old('date_programme', $programme->date_programme ?? '') }}">
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $programme->description ?? '') }}</textarea>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Enregistrer</button>
