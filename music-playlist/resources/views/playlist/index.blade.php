<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Playlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
     
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
      
        tbody tr:hover {
            background-color: #eef2ff;
        }
       
        .action-icon {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin-right: 4px;
            stroke-width: 2.2;
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-purple-700 via-indigo-800 to-blue-900 min-h-screen flex flex-col items-center py-10 px-4">

    <div class="w-full max-w-6xl bg-white bg-opacity-90 backdrop-blur-md rounded-3xl shadow-2xl p-8">
        <h1 class="text-4xl font-extrabold mb-8 text-indigo-700 text-center select-none tracking-wide drop-shadow-lg">
            🎶 Minha Playlist
        </h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-6 rounded-lg shadow-md border border-green-300 fade-in">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded-lg shadow-md border border-red-300 fade-in">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('playlist.create') }}" 
           class="inline-flex items-center mb-6 px-5 py-3 bg-indigo-600 text-white rounded-xl font-semibold shadow-lg hover:bg-indigo-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Adicionar Música
        </a>

        @if(count($musics) > 0)
            <div class="overflow-x-auto rounded-lg border border-indigo-300">
                <table class="min-w-full divide-y divide-indigo-200">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-indigo-700 font-semibold tracking-wide">Nome da Música</th>
                            <th class="px-6 py-3 text-left text-indigo-700 font-semibold tracking-wide">Artista</th>
                            <th class="px-6 py-3 text-left text-indigo-700 font-semibold tracking-wide">Gravadora</th>
                            <th class="px-6 py-3 text-center text-indigo-700 font-semibold tracking-wide">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-indigo-200">
                        @foreach($musics as $music)
                            <tr class="hover:bg-indigo-50 cursor-pointer">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $music['nm_musica'] ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $music['artista'] ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $music['gravadora'] ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center space-x-3">
                                    <a href="{{ route('playlist.editar', $music['id']) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 flex items-center justify-center gap-1 font-semibold" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="action-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l6 6L4 20l1-7 4-2z" />
                                        </svg>
                                        Editar
                                    </a>

                                    <form action="{{ route('playlist.destroy', $music['id']) }}" method="POST" class="inline" onsubmit="return confirm('Confirmar exclusão?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 flex items-center justify-center gap-1 font-semibold" title="Excluir">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="action-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                            </svg>
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-indigo-100 text-center text-lg mt-10 select-none">Nenhuma música encontrada na playlist.</p>
        @endif
    </div>

</body>
</html>
