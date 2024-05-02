<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
            'redirect_url' => 'required|url',
            'active' => 'sometimes|boolean'
        ]);

        $banner = Banner::create($request->all());
        return redirect()->route('admin.banners.index')->with('success', 'Banner ajouté avec succès.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
            'redirect_url' => 'required|url',
            'active' => 'sometimes|boolean'
        ]);

        $banner->update($request->all());
        return redirect()->route('admin.banners.index')->with('success', 'Banner mis à jour avec succès.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner supprimé avec succès.');
    }
}

