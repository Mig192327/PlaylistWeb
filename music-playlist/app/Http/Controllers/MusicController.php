<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::all();
        return view('playlist.index', compact('musics'));
    }

    public function create()
    {
        return view('playlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'url' => 'nullable|url',
        ]);

        Music::create($request->only('title', 'artist', 'url'));

        return redirect()->route('playlist.index')->with('success', 'Música adicionada!');
    }

    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('playlist.edit', compact('music'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'url' => 'nullable|url',
        ]);

        $music = Music::findOrFail($id);
        $music->update($request->only('title', 'artist', 'url'));

        return redirect()->route('playlist.index')->with('success', 'Música atualizada!');
    }

    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        $music->delete();

        return redirect()->route('playlist.index')->with('success', 'Música removida!');
    }
}
