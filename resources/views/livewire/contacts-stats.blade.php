<div class="p-4 bg-white rounded shadow">
    <div class="flex space-x-4 mb-4">
        <div>
            <label>De :</label>
            <input type="date" wire:model="dateFrom" class="form-input">
        </div>
        <div>
            <label>À :</label>
            <input type="date" wire:model="dateTo" class="form-input">
        </div>
        <div>
            <label>Commune :</label>
            <select wire:model="commune" class="form-select">
                <option value="">Toutes</option>
                @foreach($communes as $c)
                <option value="{{ $c }}">{{ $c }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <table class="table-auto w-full mb-4">
        <thead>
            <tr>
                <th class="px-2 py-1">Commune</th>
                <th class="px-2 py-1">Année</th>
                <th class="px-2 py-1">Mois</th>
                <th class="px-2 py-1">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stats as $row)
            <tr>
                <td class="border px-2 py-1">{{ $row['commune_contact'] }}</td>
                <td class="border px-2 py-1">{{ $row['annee'] }}</td>
                <td class="border px-2 py-1">{{ ucfirst($row['mois_libelle']) }}</td>
                <td class="border px-2 py-1">{{ $row['total'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-2">Aucune donnée</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Ici viendra le graphique --}}
    <canvas id="statsChart"></canvas>
</div>