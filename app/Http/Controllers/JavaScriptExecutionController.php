<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class JavaScriptExecutionController extends Controller
{
    public function execute(Request $request)
    {
        // Valider les paramètres envoyés via la requête GET
        $validated = $request->validate([
            'code' => 'required|string', // Code JavaScript
            'data' => 'nullable|string', // Données au format JSON sous forme de string
        ]);

        $jsCode = $validated['code'];
        $data = $validated['data'] ?? '{}'; // Assurez-vous que les données sont une chaîne JSON valide

        // Générer un fichier temporaire avec le code JS
        $tempFile = tempnam(sys_get_temp_dir(), 'js');
        $jsScript = <<<JS
    const input = $data;
    $jsCode
    JS;
        file_put_contents($tempFile, $jsScript);

        // Exécuter le code avec Node.js
        $process = new \Symfony\Component\Process\Process(['node', $tempFile]);
        $process->run();

        // Supprimer le fichier temporaire
        unlink($tempFile);

        if (!$process->isSuccessful()) {
            return response()->json(['error' => $process->getErrorOutput()], 500);
        }

        // Retourner la sortie du JS
        return response()->json([
            'output' => $process->getOutput(),
        ]);
    }
}
