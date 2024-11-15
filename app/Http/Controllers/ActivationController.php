<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales;

class ActivationController extends Controller
{
    public function activateCode(Request $request)
    {
        // Valider la requête entrante pour vérifier qu'un code est bien fourni
        $request->validate([
            'code' => 'required|string'
        ]);

        // Récupérer le code d'activation depuis les paramètres de la requête GET
        $code = $request->query('code');

        // Recherche du code d'activation dans la table `shopifysales`
        $shopifysale = Shopifysales::where('id', $code)->first();

        // Vérifier si le code existe et si le nombre d'installations est inférieur à la limite de 3
        if ($shopifysale && $shopifysale->installation < 3) {
            // Incrémenter le nombre d'installations
            $shopifysale->installation += 1;
            $shopifysale->save();

            return response()->json([
                'success' => true,
                'message' => 'Code activé avec succès.',
                'remaining_installations' => 3 - $shopifysale->installation
            ], 200);
        } elseif ($shopifysale) {
            // Le code a déjà atteint le nombre maximum d'activations
            return response()->json([
                'success' => false,
                'message' => 'Le code a déjà été utilisé le nombre maximum de fois.'
            ], 200);
        } else {
            // Le code n'a pas été trouvé
            return response()->json([
                'success' => false,
                'message' => 'Code d\'activation invalide.'
            ], 200);
        }
    }
}
