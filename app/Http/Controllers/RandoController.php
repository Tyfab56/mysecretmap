<?php

namespace App\Http\Controllers;

use App\Models\RandoSpot;
use Illuminate\Http\Request;

class RandoController extends Controller
{
    public function listRandos(Request $request)
{
    $query = RandoSpot::query();

    if ($request->input('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $randos = $query->paginate(10); // Modifiez le nombre selon le nombre d'items que vous souhaitez par page

    return view('admin.randos.listrandos', compact('randos'));
}

    public function create()
    {
        return view('admin.randos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // Include other fields as necessary
        ]);

        RandoSpot::create($validatedData);
        return redirect()->route('admin.randos.listrandos')->with('success', 'Randonnée ajoutée avec succès.');
    }

    public function edit($id)
    {
        $rando = RandoSpot::findOrFail($id);
        return view('admin.randos.edit', compact('rando'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // Include other fields as necessary
        ]);

        RandoSpot::whereId($id)->update($validatedData);
        return redirect()->route('admin.randos.listrandos')->with('success', 'Randonnée mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $rando = RandoSpot::findOrFail($id);
        $rando->delete();

        return redirect()->route('admin.randos.listrandos')->with('success', 'Randonnée supprimée avec succès.');
    }
}
