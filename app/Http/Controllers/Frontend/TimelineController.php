<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timelines;
use Illuminate\Support\Facades\Storage;

class TimelineController extends Controller
{
    public function index()
    {
        $timeline = Timelines::orderBy('date')->get();
        dd($timelime);
        return view('admin.timeline', compact('timeline'));
    }

    public function create()
    {
        return view('admin.timeline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $imagePath = $request->file('image')->store('public/timeline');
        $imageUrl = Storage::url($imagePath);

        $timeline = new Timeline([
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'description' => $request->get('description'),
            'image_url' => $imageUrl
        ]);
        $timeline->save();

        return redirect('/admin/timeline')->with('success', 'Événement ajouté à la timeline.');
    }

    public function edit($id)
    {
        $timeline = Timeline::find($id);
        return view('admin.timeline.edit', compact('timeline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $timeline = Timeline::find($id);

        if ($request->hasFile('image')) {
            Storage::delete(str_replace('/storage', 'public', $timeline->image_url));
            $imagePath = $request->file('image')->store('public/timeline');
            $imageUrl = Storage::url($imagePath);
            $timeline->image_url = $imageUrl;
        }

        $timeline->title = $request->get('title');
        $timeline->date = $request->get('date');
        $timeline->description = $request->get('description');
        $timeline->save();

        return redirect('/admin/timeline')->with('success', 'Événement de la timeline mis à jour.');
    }

    public function destroy($id)
    {
        $timeline = Timeline::find($id);
        Storage::delete(str_replace('/storage', 'public', $timeline->image_url));
        $timeline->delete();

        return redirect('/admin/timeline')->with('success', 'Événement de la timeline supprimé.');
    }
}