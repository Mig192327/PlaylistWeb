<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Music;


class MusicController extends Controller
{
    private $apiBase = 'https://webapptech.site/apiplaylist/api/playlist';

    public function index()
    {
        $response = Http::get($this->apiBase);

        $musics = [];

        if ($response->successful()) {
            $musics = $response->json();
        } else {
            // Opcional: log ou flash message para erro ao buscar
            session()->flash('error', 'Erro ao buscar músicas na API.');
        }

        return view('playlist.index', compact('musics'));
    }

    public function create()
    {
        return view('playlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_musica' => 'required|string',
            'artista' => 'required|string',
            'gravadora' => 'required|string',
        ]);

        $payload = $request->only('nm_musica', 'artista', 'gravadora');

        // Enviando JSON com headers apropriados
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post($this->apiBase, $payload);

        if ($response->successful()) {
            return redirect()->route('playlist.index')->with('success', 'Música adicionada com sucesso!');
        }

        // Em caso de erro, mostrar mensagem com status e corpo da resposta
        $errorMessage = "Erro ao adicionar música. Código: {$response->status()}. Mensagem: {$response->body()}";

        return back()->withErrors($errorMessage)->withInput();
    }

public function edit($id)
{
  

      $response = Http::get("$this->apiBase/$id");

        // Verifique se a requisição falhou
        if ($response->failed()) {
            return redirect()->route('fornecedores.index')->with('error', 'Erro ao buscar fornecedor para edição.');
        }

    $musica = $response->json()['data'] ?? null;

        // Verifique se o fornecedor foi encontrado
        if (!$musica) {
            return redirect()->route('fornecedores.index')->with('error', 'Fornecedor não encontrado.');
        }

        return view('playlist.edit', compact('musica'));
}
    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_musica' => 'required|string',
            'artista' => 'required|string',
            'gravadora' => 'required|string',
        ]);

        $payload = $request->only('nm_musica', 'artista', 'gravadora');

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->put("{$this->apiBase}/{$id}", $payload);

        if ($response->successful()) {
            return redirect()->route('playlist.index')->with('success', 'Música atualizada com sucesso!');
        }

        $errorMessage = "Erro ao atualizar música. Código: {$response->status()}. Mensagem: {$response->body()}";

        return back()->withErrors($errorMessage)->withInput();
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiBase}/{$id}");

        if ($response->successful()) {
            return redirect()->route('playlist.index')->with('success', 'Música removida com sucesso!');
        }

        return back()->withErrors('Erro ao remover música.');
    }
}
