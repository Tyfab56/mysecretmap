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
            'lang' => 'required|string|size:2'
        ]);

        // Extract country and language from the request
        $country = $request->input('country');
        $lang = $request->input('lang');

        // Fetch 10 random anecdotes for the given country and language
        $anecdotes = Anecdote::where('pays_id', $country)
            ->with(['translations' => function ($query) use ($lang) {
                $query->where('lang', $lang);
            }])
            ->inRandomOrder()
            ->limit(10)
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
