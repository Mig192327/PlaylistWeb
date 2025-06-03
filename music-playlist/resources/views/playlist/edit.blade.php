<x-app-layout>
    <h2>Editar Música</h2>

    <form action="{{ route('playlist.update', $music) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $music->title }}" required><br>
        <input type="text" name="artist" value="{{ $music->artist }}" required><br>
        <input type="url" name="url" value="{{ $music->url }}"><br>
        <button type="submit">Atualizar</button>
    </form>
</x-app-layout>
