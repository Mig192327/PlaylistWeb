<x-app-layout>
    <h2>Adicionar Música</h2>

    <form action="{{ route('playlist.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Título" required><br>
        <input type="text" name="artist" placeholder="Artista" required><br>
        <input type="url" name="url" placeholder="Link da música (opcional)"><br>
        <button type="submit">Salvar</button>
    </form>
</x-app-layout>
