<div class="bg-blue-900 text-white p-6 rounded-md shadow-md">
    <div class="flex flex-wrap md:flex-nowrap">
        <div class="w-full md:w-1/3 p-4">
            <!-- Vidéo ou visuel ici -->
            <div class="aspect-video bg-gray-200 rounded shadow">
                <!-- Exemple : <iframe src="..." class="w-full h-full"></iframe> -->
            </div>
        </div>
        <div class="w-full md:w-2/3 p-4">
            <h1 class="text-2xl font-bold mb-2">🎉 Jeu concours Comores jusqu'au 30 mai</h1>
            <h2 class="text-lg mb-4">📚 50 guides dans la collection Charly sur l'Islande à gagner</h2>

            <p class="mb-2">Répondez à ces questions :</p>
            <form method="POST" action="{{ route('comores-contest.submit') }}">
                @csrf
                <div style="display: none;">
                    <label>Leave this empty</label>
                    <input type="text" name="website" value="">
                </div>
                <input type="hidden" name="submitted_at" value="{{ now()->timestamp }}">
                <p class="italic mb-4">Quels guide des comores devons nous créer ?.</p>
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

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Voter
                </button>

                <p class="mt-4">Revenez sur cette page pour connaître le résultat ou restez informé sur l’opération :
                </p>
                <label class="flex items-center mt-2">
                    <input type="checkbox" name="optin" value="1" class="mr-2">
                    Oui, je veux rester informé
                </label>

                <p class="mt-4">
                    📜 <a href="/reglement-concours" class="text-blue-500 underline">Voir le règlement du concours</a>
                </p>
            </form>
        </div>
    </div>
</div>
