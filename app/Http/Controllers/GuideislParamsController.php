<?php

namespace App\Http\Controllers;

use App\Models\GuideislParam;
use Illuminate\Http\JsonResponse;

class GuideislParamsController extends Controller
{
    public function getAllParams(): JsonResponse
    {
        // Récupérer tous les paramètres depuis la base de données
        $params = GuideislParam::all();

        // Formatter les paramètres sous forme de tableau clé-valeur
        $formattedParams = $params->pluck('value', 'key');

        // Retourner la réponse en JSON
        return response()->json($formattedParams);
    }
}
