<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class JavaScriptExecutionController extends Controller
{
    public function execute(Request $request)
    {
        // Valider les données entrantes
        $validated = $request->validate([
            'code' => 'required|string',
            'data' => 'nullable|array',
        ]);

        // Récupérer le code et les données
        $jsCode = $validated['code'];
        $data = json_encode($validated['data'] ?? []);

        // Construire un fichier temporaire pour exécuter le JS
        $tempFile = tempnam(sys_get_temp_dir(), 'js');
        $jsScript = <<<JS
const input = $data;
$jsCode
JS;

        file_put_contents($tempFile, $jsScript);

        // Exécuter le code avec Node.js
        $process = new Process(['node', $tempFile]);
        $process->run();

        // Supprimer le fichier temporaire
        unlink($tempFile);

        // Vérifier les erreurs d'exécution
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Retourner la sortie
        return response()->json([
            'output' => $process->getOutput(),
        ]);
    }
}
