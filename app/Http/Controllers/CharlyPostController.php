<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CharlyPost; 
use App\Models\CharlyPostTranslation;

class CharlyPostController extends Controller
{
    public function index($pays_id)
    {
        $posts = CharlyPost::where('pays_id', $pays_id)
                        ->orderBy('rank', 'desc') // ou 'created_at' ou autre colonne selon votre choix
                        ->paginate(10);
    
        return view('frontend.charlypost', compact('posts'));
    }
    

    public function listspots()
{
    // Récupérez les posts de Charly, par exemple, les 10 derniers posts
    $posts = CharlyPost::orderBy('created_at', 'desc')->paginate(10);

    return view('backend.charly-posts.listspots', compact('posts'));
}
public function show($id)
{
    $charlyPost = CharlyPost::find($id);

    if (!$charlyPost) {
        // Gérer le cas où le post n'est pas trouvé (par exemple, rediriger avec un message d'erreur)
        return redirect()->route('charly-posts.listspots')->with('error', 'Post not found.');
    }

    return view('charly-posts.show', ['charlyPost' => $charlyPost]);
}

public function edit($id)
{
    $post = CharlyPost::find($id);
    if (!$post) {
        return redirect()->route('charly-posts.index')->with('error', 'Post not found');
    }

    return view('backend.charly-posts.edit', compact('post'));
}



    public function create()
    {
        $languages = ['en' => 'English', 'fr' => 'Français']; // Vous pouvez récupérer cette liste d'une autre manière si vous le souhaitez
        return view('admin.charly_posts.create', compact('languages'));
    }

    public function store(Request $request)
{
    $charlyPost = new CharlyPost;

    $locale = $request->input('locale');
    $charlyPost->setTranslation('title', $locale, $request->input('title'));
    $charlyPost->setTranslation('description', $locale, $request->input('description'));
    $charlyPost->setTranslation('video_link', $locale, $request->input('video_link'));

    $charlyPost->save();

    return redirect()->route('some-route')->with('success', 'Post created successfully.');
}
}
