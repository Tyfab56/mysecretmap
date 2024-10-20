<?php

namespace App\Http\Controllers;

use App\Models\Spots;  // Assurez-vous d'importer le modèle correct
use Illuminate\Http\JsonResponse;

class GuideislParamsController extends Controller
{
    public function getGuideISParams(): JsonResponse
    {
        // Vous devez obtenir le code pays (par exemple depuis une requête)
        $countryCode = 'IS';

        // Recherchez la dernière date de mise à jour
        $lastUpdateDate = Spots::where('pays_id', $countryCode)
            ->where('audioguide', 1)
            ->max('updated_at');

        // Retournez la date de mise à jour dans une réponse JSON
        return response()->json([
            'map_update_date' => $lastUpdateDate
        ]);
    }
}
