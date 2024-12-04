@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Gestion des Circuits</h1>
    <button onclick="generateJson()" class="btn btn-primary">Générer JSON</button>
    <div id="files-list" class="mt-4"></div>
</div>

<script>
    async function generateJson() {
        try {
            const response = await fetch("{{ route('circuits.generate-json') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            const result = await response.json();
            if (result.status === 'success') {
                const filesList = document.getElementById('files-list');
                filesList.innerHTML = `
                    <p>Fichiers générés avec succès :</p>
                    <ul>
                        @foreach (['fr', 'en', 'de'] as $lang)
                        <li>
                            <a href="{{ asset('storage/assets/circuits_' . $lang . '.json') }}" download="circuits_{{ $lang }}.json">
                                Télécharger circuits_{{ $lang }}.json
                            </a>
                        </li>
                        @endforeach
                    </ul>
                `;
            }
        } catch (error) {
            console.error('Erreur lors de la génération des fichiers JSON:', error);
        }
    }
</script>
@endsection