<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Música - Playlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animação título */
        @keyframes pulse-title {
            0%, 100% { color: #6366f1; }
            50% { color: #8b5cf6; }
        }
        h1 {
            animation: pulse-title 3s infinite;
        }

        /* Input icons */
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a5b4fc;
        }

        /* Espaço para input com ícone */
        .input-with-icon input {
            padding-left: 2.5rem;
        }

        /* Animação lista erros */
        .error-list li {
            animation: fadeIn 0.3s ease forwards;
            opacity: 0;
            transform: translateX(-10px);
        }
        .error-list li:nth-child(1) { animation-delay: 0.1s; }
        .error-list li:nth-child(2) { animation-delay: 0.2s; }
        .error-list li:nth-child(3) { animation-delay: 0.3s; }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-purple-700 via-indigo-800 to-blue-900 min-h-screen flex flex-col items-center justify-center px-4">

    <div class="w-full max-w-md bg-white bg-opacity-90 backdrop-blur-md rounded-3xl shadow-2xl p-8">
        <h1 class="text-4xl font-extrabold mb-8 text-center select-none tracking-wide drop-shadow-lg">
            🎵 Editar Música na Playlist
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded-lg shadow-md border border-red-300">
                <ul class="list-disc list-inside error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('playlist.update', $musica['id']) }}" method="POST" class="space-y-6" novalidate>
            @csrf
            @method('PUT')

            <div class="relative input-with-icon">
                <label for="nm_musica" class="block mb-2 font-semibold text-indigo-700">Nome da Música</label>
                <svg xmlns="http://www.w3.org/2000/svg" class="input-icon w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-2v13" />
                    <circle cx="6" cy="18" r="3" stroke="currentColor" stroke-width="2" fill="none" />
                </svg>
                <input type="text" name="nm_musica" id="nm_musica"
                    value="{{ old('nm_musica',  $musica['nm_musica']) }}" required
                    placeholder="Digite o nome da música"
                    class="w-full border border-indigo-300 rounded-xl px-10 py-3 text-gray-700 placeholder-indigo-300
                    focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 transition" />
            </div>

            <div class="relative input-with-icon">
                <label for="artista" class="block mb-2 font-semibold text-indigo-700">Artista</label>
                <svg xmlns="http://www.w3.org/2000/svg" class="input-icon w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1119.88 6.196 9 9 0 015.121 17.804zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <input type="text" name="artista" id="artista"
                    value="{{ old('artista', $musica['artista']) }}" required
                    placeholder="Digite o nome do artista"
                    class="w-full border border-indigo-300 rounded-xl px-10 py-3 text-gray-700 placeholder-indigo-300
                    focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 transition" />
            </div>

            <div class="relative input-with-icon">
                <label for="gravadora" class="block mb-2 font-semibold text-indigo-700">Gravadora</label>
                <svg xmlns="http://www.w3.org/2000/svg" class="input-icon w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0h6m-6 0v1a2 2 0 002 2h2a2 2 0 002-2v-1m-6 0h6" />
                </svg>
                <input type="text" name="gravadora" id="gravadora"
                    value="{{ old('gravadora', $musica['gravadora']) }}" required
                    placeholder="Digite a gravadora"
                    class="w-full border border-indigo-300 rounded-xl px-10 py-3 text-gray-700 placeholder-indigo-300
                    focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 transition" />
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('playlist.index') }}"
                   class="bg-gray-300 text-gray-800 px-4 py-2 rounded-xl hover:bg-gray-400 transition font-semibold">
                    Cancelar
                </a>

                <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-xl hover:bg-indigo-700 transition font-semibold shadow-lg
                        active:scale-95 transform duration-200 focus:outline-none focus:ring-4 focus:ring-indigo-400">
                    Atualizar Música
                </button>
            </div>
        </form>
    </div>

</body>
</html>
