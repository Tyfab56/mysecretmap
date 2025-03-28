<div class="max-w-5xl mx-auto">
    <div class="contest-box">
        <div style="display: flex; flex-direction: column; gap: 1rem;" class="responsive-columns">
            <div class="w-full md:w-1/3 p-4">
                <div style="height: 100%; display: flex; align-items: center;">
                    <img src="{{ asset('frontend/assets/images/comores4pics.webp') }}" alt="Aperçu guide Comores"
                        style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                </div>
            </div>
            <div class="w-full md:w-2/3 p-4">
                <h1 style="font-size: 1.75rem; font-weight: bold; margin-bottom: 0.5rem; color: orange;">🎉 Jeu concours
                    Comores jusqu'au 30 mai</h1>
                <h2 style="font-size: 1.125rem; margin-bottom: 1rem; color: orange;">📚 50 guides dans la collection
                    Charly sur l'Islande à gagner</h2>

                <p class="mb-2">Répondez à ces questions :</p>
                <form method="POST" action="{{ route('comores-contest.submit') }}">
                    @csrf
                    <div style="display: none;">
                        <label>Leave this empty</label>
                        <input type="text" name="website" value="">
                    </div>
                    <input type="hidden" name="submitted_at" value="{{ now()->timestamp }}">
                    <p class="italic mb-4">Quels guides des Comores devons nous créer ?.</p>
                    <div class="flex flex-col gap-2 mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="guidecomores_answer" value="1" class="mr-2">
                            Un guide des spots des Comores
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="histoirecomores_answer" value="1" class="mr-2">
                            Un guide sur l'Histoire des Comores

                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="culturalcomores_answer" value="1" class="mr-2">
                            Un guide culturel sur les Comores
                        </label>
                    </div>

                    <p class="italic mb-4">Votre choix nous permettra de prioriser notre développement.</p>

                    <div class="mb-4">
                        <label for="email" class="block mb-1 font-semibold">Votre email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 rounded text-black" placeholder="exemple@domaine.com">
                    </div>

                    <button type="submit"
                        class="bg-slate-600 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">
                        Voter
                    </button>

                    <p class="mt-4">Revenez sur cette page pour connaître le résultat ou restez informé sur
                        l’opération :
                    </p>
                    <label class="flex items-center mt-2">
                        <input type="checkbox" name="optin" value="1" class="mr-2">
                        Oui, je veux rester informé
                    </label>

                    <p class="mt-4">
                        📜 <a href="/reglement-concours" class="text-blue-500 underline">Voir le règlement du
                            concours</a>
                    </p>
                </form>
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
        .responsive-columns {
            flex-direction: row;
        }
    }
</style>
