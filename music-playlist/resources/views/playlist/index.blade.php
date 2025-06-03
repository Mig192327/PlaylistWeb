<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #121212;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            user-select: none;
        }

        nav.sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100vh;
            background-color: #040404;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            gap: 32px;
            box-shadow: 2px 0 8px rgba(0,0,0,0.7);
            z-index: 105;
        }

        nav.sidebar .logo {
            font-size: 1.8rem;
            font-weight: 900;
            letter-spacing: 2px;
            color: #1db954;
            user-select: text;
        }

        nav.sidebar a {
            color: #b3b3b3;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav.sidebar a:hover,
        nav.sidebar a.active {
            background-color: #1db954;
            color: #fff;
        }

        main.content {
            margin-left: 220px;
            padding: 30px 40px 60px;
            min-height: 100vh;
            background: linear-gradient(180deg, #121212 0%, #181818 100%);
        }

        header.page-header {
            position: sticky;
            top: 0;
            background-color: #121212;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid #282828;
            z-index: 103;
            user-select: none;
        }

        header.page-header h1 {
            font-size: 2.5rem;
            font-weight: 900;
            color: #1db954;
            margin: 0;
            letter-spacing: 2px;
        }

        header.page-header a.btn-add {
            background-color: #1db954;
            padding: 14px 26px;
            font-weight: 700;
            border-radius: 50px;
            color: #121212;
            text-decoration: none;
            box-shadow: 0 8px 20px rgb(29 185 84 / 0.5);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
header.page-header a.btn-add:hover {
    background-color: #17a44d;
    box-shadow: 0 10px 28px rgb(23 164 77 / 0.7);
    text-shadow: 0 0 6px rgba(255, 255, 255, 0.4); /* brilho branco sutil */
}


        header.page-header a.btn-add svg {
            width: 20px;
            height: 20px;
            fill: #121212;
        }

        .playlist-grid {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 100px;
        }

        .music-card {
            width: 400px;
            background-color: #181818;
            border-radius: 12px;
            padding: 20px 22px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 15px rgb(0 0 0 / 0.7);
            transition: background-color 0.3s ease, transform 0.25s ease;
        }

        .music-card:hover {
            background-color: #282828;
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgb(29 185 84 / 0.7);
        }

        .music-info {
            flex-grow: 1;
            margin-bottom: 18px;
        }

        .music-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: #1db954;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .music-artist {
            font-size: 1rem;
            color: #b3b3b3;
            margin-top: 6px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .music-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .music-actions form {
            display: inline;
            margin: 0;
        }

        .btn-listen, .btn-edit, .btn-delete {
            border-radius: 50px;
            padding: 10px 14px;
            font-weight: 700;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            user-select: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            color: #121212;
            white-space: nowrap;
        }

        .btn-listen {
            background-color: #1db954;
            box-shadow: 0 4px 12px rgb(29 185 84 / 0.8);
        }

        .btn-listen:hover {
            background-color: #17a44d;
            box-shadow: 0 6px 20px rgb(23 164 77 / 1);
        }

        .btn-edit {
            background-color: #535353;
            color: #fff;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.5);
        }

        .btn-edit:hover {
            background-color: #777;
        }

        .btn-delete {
            background-color: #e03e3e;
            box-shadow: 0 4px 12px rgb(224 62 62 / 0.8);
        }

        .btn-delete:hover {
            background-color: #b53030;
            box-shadow: 0 6px 20px rgb(181 48 48 / 1);
        }

        .btn-listen svg, .btn-edit svg, .btn-delete svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        @media (max-width: 768px) {
            nav.sidebar {
                width: 70px;
                padding: 30px 10px;
            }

            nav.sidebar .logo,
            nav.sidebar a {
                display: none;
            }

            main.content {
                margin-left: 70px;
                padding: 20px 15px 40px;
            }

            header.page-header h1 {
                font-size: 2rem;
            }

            .playlist-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 18px;
            }
        }

        @media (max-width: 480px) {
            main.content {
                margin-left: 0;
                padding: 15px 15px 30px;
            }

            header.page-header {
                flex-direction: column;
                gap: 14px;
                align-items: flex-start;
            }

            header.page-header a.btn-add {
                width: 100%;
                justify-content: center;
            }

            .playlist-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <nav class="sidebar">
        <div class="logo">PLAYLIST</div>
        <a href="{{ route('playlist.index') }}" class="active">Home</a>
        <a href="{{ route('playlist.create') }}">Adicionar Música</a>
    </nav>

    <main class="content">
        <header class="page-header">
            <h1>Minha Playlist</h1>
            <a href="{{ route('playlist.create') }}" class="btn-add">
                <svg viewBox="0 0 24 24">
                    <path d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Adicionar Música
            </a>
        </header>

        <section class="playlist-grid">
            @foreach($musics as $music)
                <article class="music-card">
                    <div class="music-info">
                        <div class="music-title">{{ $music->title }}</div>
                        <div class="music-artist">{{ $music->artist }}</div>
                    </div>

                    <div class="music-actions">
                        @if ($music->url)
                            <a href="{{ $music->url }}" target="_blank" class="btn-listen">
                                <svg viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                Ouvir
                            </a>
                        @endif

                        <a href="{{ route('playlist.edit', $music) }}" class="btn-edit">
                            <svg viewBox="0 0 24 24">
                                <path d="M3 17.25V21h3.75l11.06-11.06-3.75-3.75L3 17.25zM21.41 6.34a1.25 1.25 0 0 0 0-1.77l-2-2a1.25 1.25 0 0 0-1.77 0l-1.83 1.83 3.75 3.75 1.85-1.81z"/>
                            </svg>
                            Editar
                        </a>

                        <form action="{{ route('playlist.destroy', $music) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta música?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                </svg>
                                Excluir
                            </button>
                        </form>
                    </div>
                </article>
            @endforeach
        </section>
    </main>
</x-app-layout>
