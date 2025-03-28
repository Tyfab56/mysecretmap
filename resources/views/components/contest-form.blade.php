<div class="max-w-5xl mx-auto">
    <div class="contest-box">
        <div style="display: flex; flex-direction: row; width: 100%; gap: 1rem;" class="responsive-columns">
            <div class="w-full md:w-1/3 p-4">
                <div style="height: 100%; display: flex; align-items: center;">
                    <img src="{{ asset('frontend/assets/images/comores4pics.webp') }}" alt="Aperçu guide Comores"
                        style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                </div>
            </div>
            <div class="w-full md:w-2/3 p-4">
                <h1 style="font-size: 1.75rem; font-weight: bold; margin-bottom: 0.5rem; color: orange;">🎉 Jeu concours
                    Comores jusqu'au 30 mai</h1>
                <h2 style="font-size: 1.125rem; margin-bottom: 1rem; color: orange;">📚 50 guides numériques, dans la
                    collection
                    Charly sur l'Islande à gagner (29 euros)</h2>

                <p class="mb-2">Aidez nous en répondans à cette question :</p>
                <form method="POST" action="{{ route('comores-contest.submit') }}">
                    @csrf
                    <div style="display: none;">
                        <label>Leave this empty</label>
                        <input type="text" name="website" value="">
                    </div>
                    <input type="hidden" name="submitted_at" value="{{ now()->timestamp }}">
                    <p class="italic mb-4">Quels guides des Comores devons nous créer ?.</p>
                    <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 16px;">
                        <label style="display: flex; align-items: center;">
                            <input type="hidden" name="guidecomores_answer" value="0">

                            <input type="checkbox" name="guidecomores_answer" value="1" style="margin-right: 8px;">
                            Un guide des spots des Comores
                        </label>
                        <label style="display: flex; align-items: center;">
                            <input type="hidden" name="guidhistoirecomores_answer" value="0">
                            <input type="checkbox" name="histoirecomores_answer" value="1"
                                style="margin-right: 8px;">
                            Un guide sur l'Histoire des Comores

                        </label>
                        <label style="display: flex; align-items: center;">
                            <input type="hidden" name="culturalcomores_answer" value="0">
                            <input type="checkbox" name="culturalcomores_answer" value="1"
                                style="margin-right: 8px;">
                            Un guide culturel sur les Comores
                        </label>
                    </div>

                    <p class="italic mb-4">Votre choix nous permettra de prioriser notre développement.</p>

                    <div class="mb-4" style="margin-bottom: 16px;">
                        <label for="email" class="block mb-1 font-semibold">Votre email</label>
                        <input type="email" id="email" name="email" required
                            style="width: 100%; padding: 8px 16px; border-radius: 4px; color: black;"
                            placeholder="exemple@domaine.com">
                    </div>

                    <button type="submit"
                        style="background-color: #4b5563; color: white; font-weight: bold; padding: 8px 16px; border-radius: 4px; cursor: pointer;">
                        Voter
                    </button>

                    <p style="margin-top: 16px;">Revenez sur cette page pour connaître le résultat ou restez informé sur
                        l’opération :
                    </p>
                    <label style="display: flex; align-items: center; margin-top: 8px;">
                        <input type="hidden" name="optin" value="0">
                        <input type="checkbox" name="optin" value="1" style="margin-right: 8px;">
                        Oui, je veux rester informé
                    </label>

                    <p style="margin-top: 16px;">
                        📜 <a href="/reglement-concours" style="color: #3b82f6; text-decoration: underline;">Voir le
                            règlement du
                            concours</a>
                    </p>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .contest-box {
        background-color: #39485c;
        color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.6s ease-out both;
    }

    @media (min-width: 768px) {
        /* Removed the override of flex-direction: row */
    }
</style>
