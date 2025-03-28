<?php
// app/Http/Controllers/ComoresContestController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComoresContestEntry;

class ComoresContestController extends Controller
{
    public function submit(Request $request)
    {
     

        if ($request->filled('website')) {
            return redirect()->back()->withErrors(['bot' => 'Tentative de bot détectée.']);
        }

        $now = now()->timestamp;
        $submittedAt = intval($request->input('submitted_at', 0));

        if ($now - $submittedAt < 5) {
            return redirect()->back()->withErrors(['bot' => 'Formulaire soumis trop rapidement.']);
        }

        $validated = $request->validate([
            'email' => 'required|email|unique:comores_contest_entries,email',
            'optin' => 'nullable|accepted',
        ], [
            'email.unique' => 'Cet email a déjà été utilisé pour participer.',
        ]);

        ComoresContestEntry::create([
            'email' => $validated['email'],
            'optin' => $request->has('optin'),
            'guidecomores_answer' => $request->has('guidecomores_answer'),
            'histoirecomores_answer' => $request->has('histoirecomores_answer'),
            'culturalcomores_answer' => $request->has('culturalcomores_answer'),
        ]);

        return redirect('/frontend/comores/thankyou');
    }
}
