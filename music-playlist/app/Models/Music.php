<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics'; // 👈 isso está certo
    protected $fillable = ['nm_musica', 'artista', 'gravadora'];
}
