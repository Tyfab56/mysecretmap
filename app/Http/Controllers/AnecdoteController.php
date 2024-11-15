<?php

namespace App\Http\Controllers;

use App\Models\Anecdote;

use Illuminate\Http\Request;

class AnecdoteController extends Controller
{
    public function getRandomAnecdotes(Request $request)
    {
        // Validate the incoming request parameters
        $request->validate([
            'country' => 'required|string|size:2',
            'lang' => 'required|string|size:2',
            'nb' => 'nullable|integer|min:1' // Add validation for optional 'nb' parameter
        ]);

        // Extract parameters from the request
        $country = $request->input('country');
        $lang = $request->input('lang');
        $nb = $request->input('nb', 10); // Default to 10 if 'nb' is not provided

        // Fetch random anecdotes for the given country and language
        $anecdotes = Anecdote::where('pays_id', $country)
            ->with(['translations' => function ($query) use ($lang) {
                $query->where('lang', $lang);
            }])
            ->inRandomOrder()
            ->limit($nb)
            ->get();

        // Format the response to include only translated content
        $formattedAnecdotes = $anecdotes->map(function ($anecdote) {
            $translation = $anecdote->translations->first();
            return [
                'id' => $anecdote->id,
                'title' => $translation ? $translation->title : null,
                'content' => $translation ? $translation->content : null,
                'image_url' => $anecdote->image_url
            ];
        });

        // Return the response as JSON
        return response()->json($formattedAnecdotes);
    }
}
