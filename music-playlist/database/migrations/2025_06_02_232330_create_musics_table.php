<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->string('url')->nullable(); // URL da música
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('musics');
    }
};
